<?php

use Illuminate\Support\Collection;

class UserController extends BaseController {

	public function __construct()
	{
		parent::__construct();
		$this->beforeFilter('auth', ['only' => ['edit', 'update', 'getHome', 'getChangePassword']]);
		$this->beforeFilter('user.personal', ['only' => ['edit', 'update']]);
	}


	public function index()
	{
		$pagination = User::orderBy('id')->paginate();
		return View::make('user.index', compact('pagination'));
	}

	public function create()
	{
		return View::make('user.createEdit');
	}

	public function edit($eUser)
	{
		return View::make('user.createEdit', compact('eUser'));
	}
	
	public function store()
	{
		$user = new User;
		$redirect = self::storeUpdate($user);
		if ( ! empty($redirect)) return $redirect;

		return Redirect::route('user.edit', [$user->id])
			->withSuccess('User successfully created.');
	}

	public function update($user)
	{
		if (Input::has('old_password')) return self::updatePassword($user);

		$redirect = self::storeUpdate($user);
		if ( ! empty($redirect)) return $redirect;
		
		return Redirect::route('user.edit', [$user->id])
			->withSuccess('User successfully updated.');		
	}

	public function getHome()
	{
		$enrolledCourses = Auth::user()->enrolledCourses;

		$currentSemesterId = Semester::currentSemester()->id;
		$futureSemesterIds = Semester::futureSemesters()->lists('id');

		$currentCourses = new Collection;
		$pastCourses = new Collection;
		
		$enrolledCourses->filter(function($course) use ($currentSemesterId, $futureSemesterIds, $currentCourses, $pastCourses)
		{
			if ($course->semester_id == $currentSemesterId)
			{
				$currentCourses->push($course);
			}
			else if (in_array($course->semester_id, $futureSemesterIds))
			{

			}
			else
			{
				$pastCourses->push($course); 
			}
		});

		return View::make('user.home', compact('currentCourses', 'pastCourses'));
	}

	public function getSearch()
	{
		$term = Input::get('term');

		$users = User::where('given_name', 'ilike', "%$term%")
			->orWhere('family_name', 'ilike', "%$term%")
			->take(30)->get();
		
		$results = [];
		foreach ($users as $user) {
			$object = new StdClass();
			$object->label = "$user->username - $user->family_name, $user->given_name";
			$object->value = $user->id;

			$results[] = $object;
		}

		return Response::json($results);
	}

	public function getChangePassword()
	{
		$user = Auth::user();
		return View::make('user.changePassword', compact('user'));
	}

	public function getForgotPassword()
	{
		return View::make('user.forgotPassword');
	}

	protected static function updatePassword($user)
	{
		$input = Input::all();
		$rules = [
			'old_password' => 'required',
			'new_password' => 'required|confirmed|different:old_password',
		];
		$validator = Validator::make($input, $rules);
		if ($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}
		
		if ( ! Hash::check($input['old_password'], $user->password))
		{
			return Redirect::back()->withInput()
				->withError('The old password you entered was incorrect.');
		}

		$user->password = $input['new_password'];
		$user->save();

		return Redirect::back()
			->withSuccess('Password successfully changed.');
	}

	protected static function storeUpdate($user)
	{
		$user->fill(Input::all());
		if ( ! $user->save())
		{
			$redirectUrl = H::previousUrl(URL::route('user.create'));
			return Redirect::to($redirectUrl)->withInput()
				->withErrors($user->errors());
		}
	}











	/**
	 * Handle a POST request to remind a user of their password.
	 *
	 * @return Response
	 */
	public function postForgotPassword()
	{
		$rules = ['email' => 'required|email'];
		$validator = Validator::make(Input::only('email'), $rules);
		if ($validator->fails()) return Redirect::back()->withInput()->withErrors($validator);

		if ( ! PasswordReminder::canSendReminderEmail(Input::get('email')))
		{
			return Redirect::back()->withInput()
				->withError('A reminder email has already been sent for this email address.');
		}

		switch ($response = Password::remind(Input::only('email'), function($message)
		{
			$message->subject('WebCMS Password Reminder');
		}))
		{
			case Password::REMINDER_SENT:
				return Redirect::back()->withSuccess(Lang::get($response));

			default:
				return Redirect::back()->withError(Lang::get($response));
		}
	}

	/**
	 * Display the password reset view for the given token.
	 *
	 * @param  string  $token
	 * @return Response
	 */
	public function getResetPassword($token = null)
	{
		if (is_null($token)) App::abort(404);

		return View::make('user.resetPassword')->with('token', $token);
	}

	/**
	 * Handle a POST request to reset a user's password.
	 *
	 * @return Response
	 */
	public function postResetPassword()
	{
		$credentials = Input::only(
			'password', 'password_confirmation', 'token'
		);

		$response = Password::reset($credentials, function($user, $password)
		{
			$user->password = $password;
			$user->save();
		});

		switch ($response)
		{
			case Password::INVALID_PASSWORD:
			case Password::INVALID_TOKEN:
			case Password::INVALID_USER:
				return Redirect::back()->with('error', Lang::get($response));

			case Password::PASSWORD_RESET:
				return Redirect::route('login')->with('success', 'Successfully reset password');
		}
	}

}
