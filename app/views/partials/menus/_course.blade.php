@extends('partials.menus._base')

@section('menu-header')
<div class="text-center">
	{{ HTML::linkRoute('home', 'WebCMS').'@'.
		HTML::link('http://www.cse.unsw.edu.au', 'CSE').'@'.
		HTML::link('http://www.unsw.edu.au', 'UNSW') }}
	<br>

	<h3>{{ HTML::linkRoute('course.show', $_course->code, [$_course->id], ['class' => 'text-bold']) }}
	<small>{{{ $_course->semester->show_name }}}</small></h3>

	@foreach ($_aliases as $alias)
		{{ HTML::linkRoute('course.show', $alias->alias, [$_course->id]) }}<br>
	@endforeach
	<span class="menuTitle">{{{ $_course->title }}}</span>
</div>
@stop

@section('menu-content')

@foreach ($_parentLinks as $parentLink)
<li {{ $parentLink->expand ? 'class="mm-opened"' : '' }}>
	{{ $parentLink->htmlLink() }}

	@if ( ! $parentLink->subLinks->isEmpty() && Permission::hasMinRole($parentLink->auth))
		<ul>
		
		@foreach ($parentLink->subLinks as $subLink)
			@if (Permission::hasMinRole($subLink->auth))
				<li>{{ $subLink->htmlLink() }}</li>
			@endif
		@endforeach

		</ul>
	@endif
</li>
@endforeach

<li><a href="{{ URL::action('InfoController@getHelp') }}"><i class="glyphicon glyphicon-info-sign"></i> 	WebCMS Info</a></li>

@if (Auth::check() && Permission::hasMinRole(Permission::ROLE_COURSE_ADMIN, $_course->id))
<li class="mm-opened">
	<span><i class="glyphicon glyphicon-cog"></i> Settings</b></span>
	<ul>
		<li>{{ HTML::linkAction('CourseController@getMenuPreferences', 'Menu preferences', [$_course->id], ['title' => 'You can add new menu items here']) }}</li>
		<li>{{ HTML::linkAction('UserController@getChangePassword', 'Change password', null, ['title' => 'You can change your WebCMS password here']) }}</li>
		<li>{{ HTML::linkRoute('course.upload.index', 'Manage course files', [$_course->id], ['title' => 'You can manage course files here']) }}</li>
	</ul>
</li>
<script>
	$(function() {
		$('*[title]').tooltip({animation: false, placement: 'bottom'});		
	});
</script>
@endif

@stop