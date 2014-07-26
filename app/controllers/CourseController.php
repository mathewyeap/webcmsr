<?php

class CourseController extends BaseController {

	public function __construct()
	{
		parent::__construct();
		
		$this->beforeFilter('auth:'.Permission::ROLE_SYSTEM_ADMIN,
			['except' => ['index', 'show', 'getPreferences', 'getMenuPreferences']]);
		
		$this->beforeFilter('auth:'.Permission::ROLE_COURSE_ADMIN,
			['only' => ['getPreferences', 'getMenuPreferences']]);

		$this->beforeFilter('can.create.course', ['only' => ['create', 'store']]);
	}

	public function index()
	{
		list($semester, $ownerPatt, $coursePatt) = [
			Input::get('semester', '[Current]'), Input::get('owner_patt'), Input::get('course_patt')];

		$pagination = Course::queryCourses($semester, $ownerPatt, $coursePatt)
			->paginate(Config::get('webcms.paginationSize'));

		$semesterSelectData = Semester::semesterSelectData();

		return View::make('course.index', compact('pagination', 'semesterSelectData'));
	}

	public function create()
	{
		return $this->createEdit();
	}

	public function edit(Course $eCourse)
	{
		return $this->createEdit($eCourse);
	}

	public function show(Course $course)
	{
		if (is_null($course->home)) return View::make('course.show');

		return Redirect::route('course.link.show', [$course->id, $course->home]);
	}

	public function store()
	{
		$course = new Course;
		$redirect = self::storeUpdate($course);
		if ($redirect !== true) return $redirect;
		
		return Redirect::route('course.show', $course->id)
			->with('success', 'Course successfully created.');
	}

	public function update(Course $course)
	{
		$redirect = self::storeUpdate($course);
		if ($redirect !== true) return $redirect;
		
		return Redirect::route('course.edit', $course->id)->withInput()
			->with('success', "Course successfully updated.");
	}

	public function destroy(Course $course)
	{
		$course->erase();
		return Redirect::back()
			->with('success', 'Course successfully deleted.');
	}

	public function getConfirmDelete(Course $course)
	{
		return View::make('course.confirmDelete', compact('course'));
	}

	public function getPreferences()
	{
		return View::make('course.edit');
	}

	public function getMenuPreferences()
	{
		return View::make('course.menuPreferences');
	}



	private static function createEdit(Course $eCourse = null)
	{
		$futureSemesterSelectData = Semester::futureSemesterSelectData();
		return View::make('course.createEdit', compact('eCourse', 'futureSemesterSelectData'));		
	}

	private static function storeUpdate(Course &$course)
	{
		$course->fill(Input::all());

		if ( ! $course->validate() || ! $course->save())
		{
			return Redirect::back()->withInput()->with('errors', $course->errors());
		}
		
		return true;
	}

}
