<?php

class AdminController extends BaseController {

	public function __construct()
	{
		parent::__construct();
		$this->beforeFilter('auth:SA');
	}

	public function getSuperLogin() 
	{
		return View::make('admin.superLogin');
	}

	public function postSuperLogin()
	{
		$userId = Input::get('user_id');
		if ( ! ctype_digit($userId) || is_null($user = User::find($userId)))
		{
			return Redirect::back()->withInput()->withError('Invalid user ID.');
		}

		Auth::login($user);

		return Redirect::home()
			->withSuccess("Successfully logged in as $user->given_name $user->family_name");
	}
}
