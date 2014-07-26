@extends('layouts.main')

@section('title') User Homepage @stop
@section('heading') Welcome to WebCMS @stop

@section('page-info')
	<div class="text-center">
		<p>You are logged in as <b>{{{ Auth::user()->display_name }}}</b></p>

		<p style="color:#009900">
			Use the links in the sidebar menu to access the various WebCMS tools<br>
			or click on a course code to go to the web page for that course.
		</p>
	</div>
@stop

@section('content')

<div class="row">
	<div class="col-sm-10 col-sm-offset-1">
		@if (count($currentCourses) > 0)
			<div class="panel panel-default">
			  <div class="panel-heading cs-main">
			    <h3 class="panel-title">Your current courses</h3>
			  </div>
			  <div class="panel-body">
					<ul>
						@foreach ($currentCourses as $course)
							<li>
								{{ HTML::linkRoute('course.show', $course->code, $course->id) }}
								{{{ $course->title }}}
						  </li>
						@endforeach
					</ul>
			  </div>
			</div>
		@endif

		@if (count($pastCourses) > 0)
			<div class="panel panel-default">
			  <div class="panel-heading cs-main">
			    <h3 class="panel-title">Your past courses</h3>
			  </div>
			  <div class="panel-body">
					<ul>
						@foreach ($pastCourses as $course)
							<li>
								{{ HTML::linkRoute('course.show', $course->code, $course->id) }}
								{{{ $course->title }}}
						  </li>
						@endforeach
					</ul>
			  </div>
			</div>
		@endif

		<div class="panel panel-default">
		  <div class="panel-heading cs-main">
		    <h3 class="panel-title">WebCMS Tools</h3>
		  </div>
		  <div class="panel-body">
				<ul>
					<li><b>About WebCMS</b>, <b>FAQ</b>, <b>Contact</b>: give more details on the system</li>
					<li><b>Courses</b>: allows you to add/edit and view courses</li>
					<li><b>Change password</b>: allows you to change your WebCMS password</li>
					<li><b>Personal Detail</b>: allows you to edit your personal details</li>
				</ul>
		  </div>
		</div>

	</div>
</div>

@stop
