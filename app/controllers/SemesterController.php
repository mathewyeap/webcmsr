<?php

class SemesterController extends BaseController {

	public function __construct()
	{
		parent::__construct();
		$this->beforeFilter('auth:'.Permission::ROLE_SYSTEM_ADMIN);
	}

	public function index()
	{
		$pagination = Semester::querySemesters(Input::get('semester'), Input::get('year'))
			->paginate(Config::get('webcms.paginationSize'));

		$semesterSelectData = [
			'' => '[Any]',
			's1' => 'S1 - Semester 1',
			's2' => 'S2 - Semester 2',
			'x1' => 'X1 - Summer Term',
			'x2' => 'X2 - Winter Term'
		];
		
		$yearSelectData = Semester::yearSelectData();

		return View::make('semester.index',
			compact('pagination', 'semesterSelectData', 'yearSelectData'));
	}


	public function create()
	{
		return View::make('semester.create');
	}

	public function store()
	{
		$semester = new Semester;
		$semester->fill(Input::all());
		if ( ! $semester->save())
		{
			return Redirect::route('semester.create')->withInput()
				->withErrors($semester->errors());
		}

		return Redirect::route('semester.index')->withSuccess('Semester successfully created.');
	}

}
