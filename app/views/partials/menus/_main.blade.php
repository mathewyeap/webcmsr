@extends('partials.menus._base')

@section('menu-header')
	<h1 class="text-center">WebCMS</h1>
@stop

@section('menu-content')

@if (Auth::check())
	<li><a href="{{ URL::action('UserController@getHome') }}"><i class="glyphicon glyphicon-home"></i> Home</a></li>
@endif

<li class="mm-opened">
	<span><i class="glyphicon glyphicon-info-sign"></i> Information</span>
	<ul class="List">
		<li><a href="{{ action('InfoController@getAbout') }}">About WebCMS</a></li>
		<li><a href="{{ action('InfoController@getFaq') }}">FAQ</a></li>
		<li><a href="{{ action('InfoController@getContact') }}">Contact</a></li>
	</ul>
</li>
<li class="mm-opened">
	<span><i class="glyphicon glyphicon-book"></i> Courses</span>
	<ul>
		<li>{{ HTML::linkaction('course.index', 'List of courses') }}</li>
		@if (Auth::check() && Permission::canCreateCourse())
			<li>{{ HTML::linkAction('course.create', 'Add new course') }}</li>
		@endif
	</ul>
</li>

@if (Auth::check())
	<li class="mm-opened">
		<span><i class="glyphicon glyphicon-cog"></i> Settings</span>
		<ul>
			<li>{{ HTML::linkAction('UserController@getChangePassword', 'Change password') }}</li>
			<li>{{ HTML::linkRoute('user.edit', 'Personal details', [Auth::user()->id]) }}</li>
		</ul>
	</li>

	@if (Permission::isAdmin())
		<li class="mm-opened">
			<span><i class="glyphicon glyphicon-wrench"></i> System Admin</span>
			<ul>
				<li>{{ HTML::linkAction('AdminController@getSuperLogin', 'Login as...') }}</li>
				<li>{{ HTML::linkRoute('semester.index', 'Manage teaching terms') }}</li>
				<li>{{ HTML::linkRoute('user.index', 'Manage users') }}</li>
			</ul>
		</li>
	@endif
@endif
@stop