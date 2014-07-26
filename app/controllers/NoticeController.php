<?php

class NoticeController extends BaseController {

	public function __construct()
	{
		parent::__construct();
		$this->beforeFilter('auth:CA', ['except' => ['index']]);
	}

	public function index(Course $course, Link $link)
	{
		$notices = $link->notices()->orderBy('created_at', 'desc')->get();
		$notices->load('creator');

		Message::table();

		return View::make('notice.index', compact('notices'));	
	}

	public function create(Course $course, Link $link)
	{
		return View::make('notice.createEdit');
	}

	public function edit(Course $course, Link $link, Message $eNotice)
	{
		return View::make('notice.createEdit', compact('eNotice'));
	}

	public function store(Course $course, Link $link)
	{
		$notice = new Message;
		$notice->fill(Input::all());
		$notice->course_id = $course->id;
		$notice->noticeboard_id = $link->id;
		
		if ( ! $notice->save()) return Redirect::back()->withErrors($notice->errors());

		return Redirect::route('course.link.notice.index', [$course->id, $link->id])
			->withSuccess('Notice succesfully created.');
	}

	public function update(Course $course, Link $link, Message $notice)
	{
		$notice->fill(Input::all());

		if ( ! $notice->save()) return Redirect::back()->withError($notice->errors()->all());

		return Redirect::route('course.link.notice.index', [$course->id, $link->id])
			->withSuccess('Notice succesfully updated.');
	}

	public function destroy(Course $course, Link $link, Message $notice)
	{
		$notice->erase();

		return Redirect::route('course.link.notice.index', [$course->id, $link->id])
			->withSuccess('Notice successfully deleted.');
	}

	public function getConfirmDelete(Course $course, Link $link, Message $notice)
	{

		return View::make('notice.confirmDelete', compact('notice'));
	}
}
