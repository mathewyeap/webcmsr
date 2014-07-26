<?php

use McCool\LaravelAutoPresenter\BasePresenter;

class SemesterPresenter extends BasePresenter {

	public function __construct(Semester $semester)
	{
		$this->resource = $semester;
	}

	public function breakString()
	{
		if (is_null($this->break_start)) return '';
	
		return date('M d', strtotime($this->break_start)).' .. '.date('M d', strtotime($this->break_end));
	}
}
