<?php

class Link extends BaseModel {
	protected $fillable = ['course_id', 'name', 'url', 'type', 'parent_id', 'link_order', 'tool_id', 'expand', 'auth'];
	protected $guarded = ['id'];
	public $timestamps = false;

	const TYPE_TOOL = 'tool';
	const TYPE_EXTERNAL = 'external';
	const TYPE_HEADER = 'header';

	// Presenter
	public $presenter = '\LinkPresenter';

	// Ardent
	public static $rules = [
		'course_id' => 'required',
		'name' => 'required',
		'url' => 'url',
	];

	public static $relationsData = [
		'parent' => [ self::BELONGS_TO, 'Link'],
		'course' => [ self::BELONGS_TO, 'Course'],
		'tool' => [ self::BELONGS_TO, 'Tool'],
	];

	public function subLinks()
	{
		return $this->hasMany('Link', 'parent_id', 'id')->orderBy('link_order');
	}


	public static function parentLinkSelectData($courseId)
	{
		return ['' => '[None]'] +
			self::where('course_id', $courseId)
			->whereNull('parent_id')
			->orderBy('link_order')
			->lists('name', 'id');
	}

	protected function beforeValidate()
	{
		if ( ! isset($this->link_order))
			$this->link_order = self::nextLinkOrder($this->course_id, $this->parent_id);

		if (isset($this->auth) && $this->auth === Permission::ROLE_PUBLIC)
			$this->auth = null;
	}

	public function type()
	{
		if (isset ($linkType)) return $linkType;

		if (isset($this->tool_id)) return $this->linkType = self::TYPE_TOOL;
		else if (isset($this->url)) return $this->linkType = self::TYPE_EXTERNAL;
		else return $this->linkType = self::TYPE_HEADER;
	}

	public function erase()
	{
		DB::transaction(function()
		{
			foreach ($this->notices as $notice) $notice->erase();

			if ($this->course->home_id == $this->id)
			{
				$this->course->home_id = null;
				$this->course->save();
			}

			$this->delete();			
		});
	}

	public function move($newOrder, $newParent)
	{
		if ( ! isset($newOrder)) return;

		DB::transaction(function() use ($newOrder, $newParent)
		{
			$linkRefresh = Link::where('id', $this->id)->first();
			$this->course_id = $linkRefresh->course_id;
			$this->parent_id = $linkRefresh->parent_id;
			$this->link_order = $linkRefresh->link_order;

			if ( ! isset($newParent) || $this->parent_id == $newParent)
				self::moveWithSameParent($newOrder);
			else
				self::moveWithNewParent($newOrder, $newParent);
		});
	}

	protected function moveWithSameParent($newOrder)
	{
		if ($newOrder == $this->link_order) return;
		
		if ($newOrder < $this->link_order)
		{
			$numLinksMoved = Link::where('course_id', '=', $this->course_id)
				->where('parent_id', '=', $this->parent_id)
				->where('link_order', '<', $this->link_order)
				->where('link_order', '>=', $newOrder)
				->increment('link_order');

			$this->link_order -= $numLinksMoved;
			$this->save();
		} else
		{
			$numLinksMoved = Link::where('course_id', '=', $this->course_id)
				->where('parent_id', '=', $this->parent_id)
				->where('link_order', '>', $this->link_order)
				->where('link_order', '<=', $newOrder)
				->decrement('link_order');

			$this->link_order += $numLinksMoved;
			$this->save();
		}
	}

	protected function moveWithNewParent($newOrder, $newParent)
	{
		$newParent = is_numeric($newParent) ? $newParent : NULL;
	
		Link::where('course_id', '=', $this->course_id)
			->where('parent_id', '=', $this->parent_id)
			->where('link_order', '>', $this->link_order)
			->decrement('link_order');

		Link::where('course_id', '=', $this->course_id)
			->where('parent_id', '=', $newParent)
			->where('link_order', '>=', $newOrder)
			->increment('link_order');

		$this->link_order = $newOrder;
		$this->parent_id = $newParent;
		$this->save();
	}

	public static function nextLinkOrder($courseId, $parentId = null)
	{
		return Link::where('course_id', $courseId)
			->where('parent_id', $parentId)
			->max('link_order') + 1;
	}



	public function defaultToolUrl()
	{
		switch ($this->tool->name)
		{
			case 'Noticeboard':
				return URL::route('course.link.notice.index', [$this->course_id, $this->id]);
			default:
				return false;
		}
	}


	// Noticeboard link

	public function notices()
	{
		return $this->hasMany('Message', 'noticeboard_id', 'id');
	}

}
