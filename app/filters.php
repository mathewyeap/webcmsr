<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function($route, $request, $role = null)
{
	if (Auth::guest())
	{
		return Redirect::guest('login')->withInput()
			->withError('You must be logged in to access this page.');
	}

	if ( ! isset($role)) return;

	$courseId = $route->parameter('course');

	if ( ! Permission::hasMinRole($role, $courseId))
	{
		return Redirect::home()
			->withError('You do not have permission to access that page');
	}
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
		throw new Illuminate\Session\TokenMismatchException;
});

Route::filter('course.link.parameter', function($route, $request, $value = null)
{
	$courseId = $route->parameter('course');
	if (is_null($courseId)) return;

	$linkId = $route->parameter('link');
	if ( ! is_null($linkId))
	{
		$link = Link::with(['tool'])->find($linkId);
		if (is_null($link) || $link->course_id != $courseId)
			throw new InvalidLinkException;

		if ( ! Permission::hasMinRole($link->auth))
			throw new AuthException;

		$courseId = $link->course_id;

		$route->setParameter('link', $link);

		View::share('_link', $link);
	}


	$relations = [
		'semester', 'aliases',
		'parentLinks.tool', 'parentLinks.subLinks.tool'
	];

	$course = Course::with($relations)->find($courseId);
	if (is_null($course))
		throw new InvalidCourseException;

	$route->setParameter('course', $course);

	View::share('_course', $course);
	View::share('_semester', $course->semester);
	View::share('_colourScheme', $course->getColourScheme());
	View::share('_aliases', $course->aliases);
	View::share('_parentLinks', $course->parentLinks);		
});

Route::filter('user.personal', function($route, $request, $value = null) 
{
	$user = $route->parameter('user');

	if ( ! Permission::hasMinRole(Permission::ROLE_SYSTEM_ADMIN) && 
		($user->id != Auth::user()->id))
	{
		return Redirect::home()
			->withError("That page is private to another user.");
	}
});

Route::filter('can.create.course', function($route, $request, $value = null) 
{
	if ( ! Permission::canCreateCourse())
	{
		return Redirect::home()
			->withError("You do not have permission to create a course.");
	}
});