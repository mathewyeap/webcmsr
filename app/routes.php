<?php

use Illuminate\Filesystem\FileNotFoundException;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

App::missing(function($exception)
{
    return Response::view('error.404', [], 404);
});

App::error(function (FileNotFoundException $exception)
{
	return View::make('error.404')->withError('The file could not be found.');
});

App::error(function (InvalidCourseException $exception)
{
	return View::make('error.404')
		->withError('A CID was supplied which is not a valid WebCMS course ID.');
});

App::error(function (InvalidLinkException $exception)
{
	return View::make('error.404')
		->withError('The link does not exist for this course.');
});

App::error(function (AuthException $exception)
{
	return View::make('error.404')
		->withError('You are not authorised to view this page.');
});


Route::get('/', ['as' => 'home', 'uses' => 'UserController@getHome']);

Route::get('/login', ['as' => 'login', 'uses' => 'SessionController@create']);
Route::resource('session', 'SessionController', ['except' => ['edit']]);

Route::pattern('course', '[0-9]+');
Route::pattern('link', '[0-9]+');
Route::pattern('notice', '[0-9]+');
Route::pattern('user', '[0-9]+');
Route::pattern('upload', '[0-9]+');

Route::model('user', 'User');
Route::model('upload', 'Upload');
Route::model('notice', 'Message');

Route::group(['prefix' => 'course/{course}'], function($course)
{
	Route::get('confirm-delete', 'CourseController@getConfirmDelete');
	Route::get('preferences', 'CourseController@getPreferences');
	Route::get('menu-preferences', 'CourseController@getMenuPreferences');

	Route::get('link/{link}/confirm-delete', 'LinkController@getConfirmDelete');
	Route::put('link/{link}/move', 'LinkController@putMove');

	Route::get('link/{link}/notice/{notice}/confirm-delete', 'NoticeController@getConfirmDelete');

	Route::get('upload/{upload}/download', 'UploadController@getDownload');

	Route::get('student', 'StudentController@index');
});

Route::get('user/home', ['uses' => 'UserController@getHome']);
Route::get('user/search', ['uses' => 'UserController@getSearch']);

Route::get('user/change-password', ['uses' => 'UserController@getChangePassword']);
Route::post('user/change-password', ['uses' => 'UserController@postChangePassword']);
Route::get('user/forgot-password', ['uses' => 'UserController@getForgotPassword']);
Route::post('user/forgot-password', ['uses' => 'UserController@postForgotPassword']);
Route::get('password/reset/{token}', ['uses' => 'UserController@getResetPassword']);
Route::post('user/reset-password', ['uses' => 'UserController@postResetPassword']);

Route::resource('course', 'CourseController');
Route::resource('user', 'UserController');
Route::resource('semester', 'SemesterController');

Route::resource('course.link', 'LinkController');
Route::resource('course.link.notice', 'NoticeController');
Route::resource('course.upload', 'UploadController');

Route::controller('info', 'InfoController');
Route::controller('admin', 'AdminController');
