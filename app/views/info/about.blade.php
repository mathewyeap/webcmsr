@extends('layouts.main')

@section('title') About WebCMS @stop
@section('heading') About WebCMS @stop

@section('content')
<div>
  <ul class="nav nav-tabs nav-justified">
      <li class="active">{{ HTML::linkAction('InfoController@getAbout', 'Overview') }}</li>
      <li>{{ HTML::linkAction('InfoController@getLecturerTools', 'Staff Tools') }}</li>
      <li>{{ HTML::linkAction('InfoController@getStudentTools', 'Student Tools') }}</li>
  </ul>

	<p>WebCMS is a <b>Web</b>-based <b>C</b>ourse <b>M</b>anagement <b>S</b>ystem which</p>

	<ul>
		<li>Allows lecturers to easily create and manage courses</li>
		<li>Allows students to easily navigate the material from their courses</li>
	</ul>

	<p>It was developed to address the needs of CSE lecturers to manage student and course related matters through a single, centralized, and web-based application. In addition, it is a tool that is easy to use, yet allows lecturers to develop a rich, interactive online teaching environment.</p>

	<p>WebCMS includes a full range of features which allow creation of course web pages without having to learn HTML. For lecturers, WebCMS has an extremely easy and intuitive interface for course Web page creation. Lecturers see what their course Web pages look like immediately. Thus, it minimizes the amount of administrative work in setting a course Web page under normal procedure. This greatly reduces the time spent in creating and maintaining the course Web site, allowing lecturers using their time for other course-related matters. Furthermore, lecturers can easily publish materials that supplement existing courses.</p>

	<p>For students, WebCMS creates a common look and feel to CSE course Web pages, helping students to orient themselves easily and to know immediately where to go to retrieve information. By providing a consistent interface, it reduces the amount of time and energy lecturers and students spend on learning the application. Therefore allowing users to focus on their tasks, instead of focusing their energies on the interface. Besides, it allows the users to transfer their knowledge within and across the applications, thus minimizing the time and effort required to use the application productively.</p>

	<p>The whole design of WebCMS is based on putting the control of Web environment into the hands of the lecturers creating the course Web page, including not only content, but also page design	and screen layout. Tools are available for them to shape the content and delivery in ways which make sense for their discipline. Users with little knowledge in programming should be able to drive through WebCMS without troubles. The only requirement for WebCMS is have access to Internet and common web browsers such as Netscape, Internet Explorer.</p>

	<p>
		You can find more details about the
		{{ HTML::linkAction('InfoController@getLecturerTools', 'lecturer tools') }} and 
		{{ HTML::linkAction('InfoController@getStudentTools', 'student tools') }} offered by WebCMS.
	</p>
</div>
@stop
