@extends('layouts.main')

@section('title') WebCMS Password Reminder @stop
@section('heading') Forgot Your WebCMS Password? @stop

@section('content')

<div class="row">
	<div class="col-sm-6">
		<p>
			WebCMS stores a password for each valid user.
		</p>
		<p>
			You either don't have a password at the moment, or else you've forgotten what it was.
		</p>
		<p>
			If you enter your WebCMS email into the box on the right and press the button, WebCMS will send a link to your email address which will allow you to set your password.
		</p>
		<p>
			If you do remember your password and what you really want to do is to change it, {{ HTML::linkAction('UserController@getChangePassword', 'try here') }}.
		</p>
	</div>
	<div class="col-sm-6">
		{{ BootForm::openHorizontal(4, 7)->action(URL::action('UserController@postForgotPassword')) }}
			{{ BootForm::text('Email:', 'email') }}
			{{ BootForm::submit('<i class="glyphicon glyphicon-send"></i> Email Reminder', 'btn-success') }}
		{{ BootForm::close() }}
	</div>
</div>

@stop
