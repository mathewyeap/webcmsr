@extends('layouts.base')

@section('title') WebCMS - Login Page @stop

@section('header')
<div class="row">
	<div class="col-xs-6">
		{{ HTML::image(asset('img/logo.jpg'), 'WebCMS Logo') }}
	</div>
	<div class="col-xs-6 text-right">
		<small>
			A <span class="text-danger"><b>Web</b></span>-based
			<span class="text-danger"><b>C</b></span>ourse
			<span class="text-danger"><b>M</b></span>anagement
			<span class="text-danger"><b>S</b></span>ystem developed in<br>
			{{ HTML::link('http://www.cse.unsw.edu.au/',
				'School of Computer Science and Engineering') }}<br>
			{{ HTML::link('http://www.unsw.edu.au/', 'The University of New South Wales') }}
		</small>
	</div>
</div>
<hr>
@stop

@section('content')
<div class="row">
	<div class="col-sm-6">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title">Login</h3>
			</div>
			<div class="panel-body">
				{{ BootForm::open()->action(URL::route('session.store')) }}
					{{ BootForm::text('Username:', 'username') }}
					{{ BootForm::password('Password:', 'password') }}
					{{ BootForm::submit('Login')->addClass('btn-success pull-right') }}
				{{ BootForm::close() }}
			</div>
		</div>
	</div>

	<div class="col-sm-6">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title">Your WebCMS account</h3>
			</div>
			<div class="panel-body">
				Your WebCMS account has the same username as your CSE account (if you have a CSE account). The WebCMS password is stored separately to your CSE password and should <i>not</i> be the same as your CSE password.
			</div>
			<ul>
				<li>{{ HTML::linkAction('UserController@getForgotPassword', 'No WebCMS password?') }}</li>
				<li>{{ HTML::linkAction('UserController@getForgotPassword', 'Forgotten your WebCMS password?') }}</li>
				<li>{{ HTML::linkAction('UserController@getChangePassword', 'Want to change your WebCMS password?') }}</li>
			</ul>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Learn more about WebCMS</h3>
			</div>
			<div class="panel-body">
				<div class="text-center">
					{{ HTML::linkAction('InfoController@getAbout', 'What is WebCMS?') }} ...
					{{ HTML::linkAction('InfoController@getFaq', 'FAQ') }} ...
					{{ HTML::linkAction('InfoController@getLecturerTools', 'Lecturer tools') }} ...
					{{ HTML::linkAction('InfoController@getStudentTools', 'Student tools') }} ...
					{{ HTML::linkAction('InfoController@getContact', 'Contacts') }} ...
				</div>
			</div>
		</div>
	</div>
</div>
@stop

