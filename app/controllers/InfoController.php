<?php

class InfoController extends BaseController {

	public function getAbout()
	{
		return View::make('info.about');
	}
	
	public function getFaq()
	{
		return View::make('info.faq');
	}
	
	public function getContact()
	{
		return View::make('info.contact');
	}
	
	public function getLecturerTools()
	{
		return View::make('info.lecturerTools');
	}

	public function getStudentTools()
	{
		return View::make('info.studentTools');
	}

	public function getHelp()
	{
		return View::make('info.help');
	}
}
