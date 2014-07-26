<?php

class UploadController extends BaseController {

	public function __construct()
	{
		parent::__construct();
		$this->beforeFilter('auth:'.Permission::ROLE_COURSE_ADMIN, ['except' => ['show', 'getDownload']]);
	}

	public function index(Course $course)
	{
		$pagination = Upload::where('course_id', $course->id)
			->paginate(Config::get('webcms.paginationSize'));

		return View::make('upload.index', compact('pagination'));
	}


	public function show(Course $course, Upload $upload)
	{
		$headers = ['Content-Type' => $upload->mime_type];
		$fileContents = File::get($upload->path());

		return Response::stream(function() use ($fileContents) {
			echo $fileContents;
		}, 200, $headers);
	}

	public function destroy(Course $course, Upload $upload)
	{
		$upload->erase();
		return Redirect::route('course.upload.index', [$course->id]);
	}

	public function getDownload($courseId, $upload)
	{
		$headers = ['Content-Type' => $upload->mime_type];
		return Response::download($upload->path(), $upload->display_name, $headers);
	}
}
