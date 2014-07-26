<?php

class SessionController extends BaseController {

	public function __construct()
	{
		parent::__construct();

		$this->beforeFilter(function()
		{
			if (Auth::check()) return Redirect::home();		
		},['except' => ['destroy']]);
	}

	public function create()
	{
		return View::make('session.create');
	}

	public function store()
	{
		$input = Input::all();

		$rules = ['username' => 'required', 'password' => 'required'];
		$validator = Validator::make($input, $rules);
		if ($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$attempt = Auth::attempt([
			'username' => $input['username'],
			'password' => $input['password'],
		]);

		if ( ! $attempt)
		{
			return Redirect::back()->withInput()->withError('Invalid username or password.');
		}

		return Redirect::intended(H::previousUrl(URL::route('home')))
			->withSuccess('Successfully logged in.');
	}

	public function destroy()
	{
		Auth::logout();

		return Redirect::to(H::previousUrl(URL::route('login')));
	}
}
