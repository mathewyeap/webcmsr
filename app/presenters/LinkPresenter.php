<?php

use McCool\LaravelAutoPresenter\BasePresenter;

class LinkPresenter extends BasePresenter {

	public function __construct(Link $link)
	{
		$this->resource = $link;
	}

	public function typeIcon()
	{
		$toolType = $this->type();

		if ($toolType === Link::TYPE_TOOL)
			return '<i class="glyphicon glyphicon-wrench"></i> ';
		else if ($toolType === Link::TYPE_EXTERNAL)
			return '<i class="glyphicon glyphicon-link"></i> ';
		else
			return '<i class="glyphicon glyphicon-header"></i> 	';
	}

	public function htmlLink()
	{
		switch ($this->type())
		{
			case Link::TYPE_TOOL:
				if (($href = $this->defaultToolUrl()) === false)
					$href = URL::route('course.link.show', [$this->course_id, $this->id]);
				break;
			case Link::TYPE_EXTERNAL:
				$href = URL::route('course.link.show', [$this->course_id, $this->id]);
				break;
		}

		$html = isset($href) ?  '<a href="'.$href.'">' : '<span>';
		
		if (isset($this->parent_id))
		{
			$html .= '|–';
		} else
		{
			$html .= '<b>';
			if ( ! $this->subLinks->isEmpty()) $html .= '+';
			else $html .= '&bull;';
		}

		$html .= ' '.e($this->name);

		if ( ! isset($this->parent_id)) $html .= '</b>';

		$html .= isset($href) ? '</a>' : '</span>';

		return $html;
	}
}
