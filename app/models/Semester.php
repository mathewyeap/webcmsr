<?php

class Semester extends BaseModel {
	public $fillable = [
		'full_name', 'show_name', 'start_date', 'end_date', 'break_start', 'break_end',
		'eff_start', 'eff_end'];

	public $presenter = '\SemesterPresenter';

	public static $rules = [
		'full_name' => 'required',
		'show_name' => 'required|unique:semesters',
		'start_date' => 'required',
		'end_date' => 'required',
	];

	public static function toShowName($semester, $year)
	{
		$yearStr = is_null($year) ? '%' : substr($year, -2);
		$semesterStr = is_null($semester) ? '%' : strtolower($semester);
		
		return $yearStr.$semesterStr;
	}

	public static function semesters()
	{
		return self::orderBy('end_date', 'desc')->orderBy('start_date', 'desc');
	}

	public static function futureSemesters()
	{
		return self::where('eff_start', '>', self::today())
			->orderBy('eff_start', 'asc');
	}

	public static function currentSemester()
	{
		return self::where('eff_start', '<=', self::today())
			->where('eff_end', '>=', self::today())
			->orderBy('eff_start', 'desc')
			->first();
	}

	public static function futureSemesterSelectData()
	{
		return self::futureSemesters()->lists('full_name', 'id');
	}

	public static function yearSelectData()
	{
		$thisYear = date('Y');
		$yearSelectData[''] = '[Any]';
		foreach (range(2008, $thisYear + 2) as $year)
			$yearSelectData[$year] = $year;

		return $yearSelectData;
	}

	public static function semesterSelectData()
	{
		return ['[Current]' => 'Current session', '[Any]' => 'Any session'] + 
			self::semesters()->lists('full_name', 'id');
	}

	public static function querySemesters($semester, $year)
	{
		if ( ! isset($semester) || $semester === '') $semester = null;
		if ( ! isset($year) || $year === '') $year = null;

		return Semester::where('show_name', 'like', self::toShowName($semester, $year))
			->orderBy('end_date', 'desc')->orderBy('start_date', 'desc');
	}

}
