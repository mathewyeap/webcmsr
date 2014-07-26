@extends('layouts.main')

@section('title') Reset WebCMS Password @stop
@section('heading') Reset Your WebCMS Password @stop

@section('content')
{{ BootForm::open()->action(URL::action('UserController@postResetPassword')) }}
	{{ BootForm::hidden('token')->value($token) }}
	{{ BootForm::email('Email:', 'email') }}
    {{ BootForm::password('Password:', 'password') }}
    {{ BootForm::password('Re-enter Password:', 'password_confirmation') }}
    {{ BootForm::submit('Reset Password', 'btn-success') }}
{{ BootForm::close() }}
@stop