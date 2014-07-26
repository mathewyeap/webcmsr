<?php

class LinkController extends BaseController {

	public function __construct()
	{
		parent::__construct();
		$this->beforeFilter('auth:CA', ['except' => 'show']);
	}

	public function show(Course $course, Link $link)
	{
		switch ($link->type())
		{
			case Link::TYPE_EXTERNAL:
				return View::make('link.external', compact('link'));
			case LINK::TYPE_TOOL:
				if (($url = $link->defaultToolUrl()) === false)
				{	
					return View::make('course.show')
						->withError('The ['.$link->tool->name.'] tool is under construction.');
				} else
				{
						return Redirect::to($url);
				}
		}
	}

	public function create(Course $course)
	{
		$linkType = Input::get('link_type');
		self::createEdit($course->id);
		return View::make('link.createEdit', compact('linkType'));
	}

	public function edit(Course $course, Link $link)
	{
		$linkType = $link->type();
		self::createEdit($course->id);
		return View::make('link.createEdit', compact('link', 'linkType'));
	}

	public function store(Course $course)
	{
		$redirect = self::storeUpdate($course->id, new Link);
		if ( ! is_null($redirect)) return $redirect;

		return Redirect::action('CourseController@getMenuPreferences', $course->id)
			->with('success', 'Link successfully created.');
	}

	public function update(Course $course, Link $link)
	{
		$redirect = self::storeUpdate($course->id, $link);
		if ( ! is_null($redirect)) return $redirect;

		return Redirect::action('CourseController@getMenuPreferences', $course->id)
			->with('success', 'Link successfully updated.');
	}

	public function destroy(Course $course, Link $link)
	{
		$link->erase();
	
		return Redirect::action('CourseController@getMenuPreferences', $course->id)
			->withSuccess('Link successfully deleted.');
	}

	public function getConfirmDelete(Course $course, Link $link)
	{
		return View::make('link.confirmDelete');
	}

	public function putMove(Course $course, Link $link)
	{
		$newOrder = Input::get('order');
		$newParent = Input::get('parent');

		if ($newOrder < 0)
			App::abort(400);

		$link->move($newOrder, $newParent);
	}




	protected static function storeUpdate($courseId, Link $link)
	{
		$input = ['course_id' => $courseId] + Input::all();
		$link->fill($input);

		if ( ! $link->save())
		{
			return Redirect::action('CourseController@getMenuPreferences', $courseId)
				->withInput()->withError($link->errors()->all());
		}
	}

	protected static function createEdit($courseId)
	{
		View::share('parentLinkSelectData', Link::parentLinkSelectData($courseId));
		View::share('authSelectData', Permission::getAuthSelectData());
		View::share('courseId', $courseId);
		View::share('_allTools', Tool::tools()->get());
	}
}
