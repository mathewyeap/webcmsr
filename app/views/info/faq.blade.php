@extends('layouts.main')

@section('title') WebCMS - Frequently Asked Questions @stop
@section('heading') Frequently Asked Questions @stop

@section('content')
<div>
	<p>The following contains the frequently asked questions about WebCMS.</p>

	<ol>
		<li><a href='#faq1'>What is WebCMS?</a></li>
		<li><a href='#faq2'>Who will benefit from WebCMS?</a></li>
		<li><a href='#faq3'>How does it different from WebCT?</a></li>
		<li><a href='#faq4'>What can a lecturer do with WebCMS?</a></li>
		<li><a href='#faq5'>What can a student do with WebCMS?</a></li>
	</ol>
	<br>

	<a name="faq1"></a><h3>1. What is WebCMS?</h3>

	<p>WebCMS, a <b>Web</b>-based <b>C</b>ourse <b>M</b>anagement <b>S</b>ystem, provides a set of tools that facilitates the management of information related to courses in CSE. These tools include administrative, collaboration, authoring, learning and educational tools that are designed for lecturers and students based in CSE.</p>

	<a name="faq2"></a><h3>2. Who will benefit from WebCMS?</h3>

	<p>Lecturers and students in CSE. WebCMS provides a set of tools that facilitates the management of information related to courses in CSE. It includes a full range of features which allow creation of course web page without having to learn HTML.</p>

	<p>For lecturers, WebCMS has an extremely easy and intuitive interface for course Web page creation. Lecturers see what their course Web pages look like immediately. Thus, it minimizes the amount of administrative works in setting a course Web page under normal procedure. For students, WebCMS creates a common look and feel to CSE course Web pages, helping students to orient themselves easily and to know immediately where to go to retrieve information.</p>

	<a name="faq3"></a><h3>3. How does it different from WebCT?</h3>

	<p>WebCMS is a fourth-year Honours project, developed to address the needs of CSE for a single, centralized system to allow lecturers manage student and course related matters through a single, centralized, and web-based application. In addition, it is a tool that is easy to use, yet allowed lecturers to develop a rich, interactive online teaching environment.</p>

	<a name="faq4"></a><h3>4. What can a lecturer do with WebCMS?</h3>

	<p>WebCMS includes a range of tools that assist lecturers in managing and administering their courses. Please refer to 
	{{ HTML::linkAction('InfoController@getLecturerTools', 'lecturer tools') }} for more detailed about the tools available for lecturer.</p>

	<a name="faq5"></a><h3>5. What can a student do with WebCMS?</h3>

	<p>WebCMS includes a range of tools that cater the needs of students in CSE. Please refer to 
	{{ HTML::linkAction('InfoController@getStudentTools', 'student tools') }} for more detailed about the tools available for student.</p>
</div>
@stop
