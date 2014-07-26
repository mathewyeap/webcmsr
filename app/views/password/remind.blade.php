@extends('layouts.general')

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
			If you enter your UNSW ID (student number or staff number) into the box on the right and press the button, WebCMS will generate a new password and send it to your UNSW email address. You can use either your student number (or staff number) OR your CSE login name as your WebCMS username.
		</p>
		<p>
			If you do remember your password and what you really want to do is to change it, {{ HTML::linkAction('UserController@getChangePassword', 'try here') }}.
		</p>
	</div>
	<div class="col-sm-6">
		{{ BootForm::openHorizontal(4, 7)->action(URL::action('RemindersController@postRemind')) }}
			{{ BootForm::text('Email:', 'email') }}
			{{ BootForm::submit('Email Reminder', 'btn-success') }}
		{{ BootForm::close() }}
	</div>
</div>

@stop
