@extends('layouts.main')

@section('title') WebCMS Password Update @stop
@section('heading') Change Your WebCMS Password @stop

@section('content')

<div class="row">
	<div class="col-sm-6">
		<p>
			WebCMS stores a password for each valid user.
		</p>
		<p>
			You can change your password by supplying your username, Your old password (for authorisation), and the new password twice (for checking). Your user name is the same as your CSE login.
		</p>
		<p>
			If your old password is correct, and you type the same new password twice, WebCMS will update your password.

			If you have forgotten your current password, you can get WebCMS to {{ HTML::linkAction('UserController@getForgotPassword', 'generate a new one') }}.
		</p>
	</div>
	<div class="col-sm-6">
		{{ BootForm::openHorizontal(4, 7)->put()->action(URL::route('user.update', $user->id)) }}
			{{ BootForm::text('Username:', 'username')->value($user->username)->disable() }}
			{{ BootForm::password('Old Password:', 'old_password')->required() }}
			{{ BootForm::password('New Password:', 'new_password')->required() }}
			{{ BootForm::password('Re-enter New Password:', 'new_password_confirmation')->required() }}
			{{ BootForm::submit('Change my password', 'btn-success') }}
		{{ BootForm::close() }}
	</div>
</div>

@stop