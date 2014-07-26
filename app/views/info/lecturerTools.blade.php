@extends('layouts.main')

@section('title') WebCMS - Lecturer Tools @stop
@section('heading') Lecturer Tools @stop

@section('content')
<div>
	<ul class="nav nav-tabs nav-justified">
    	<li>{{ HTML::linkAction('InfoController@getAbout', 'Overview') }}</li>
		<li class="active">
			{{ HTML::linkAction('InfoController@getLecturerTools', 'Staff Tools') }}
		</li>
		<li>{{ HTML::linkAction('InfoController@getStudentTools', 'Student Tools') }}</li>
	</ul>

	<p>WebCMS provides the folling set of tools for lecturers to assist in tracking and administering their courses:</p>

	<ul>
		<li><a href='#tool1'>Course Look and Feel</a></li>
		<li><a href='#tool2'>Course Planning, Design, Templates</a></li>
		<li><a href='#tool3'>Notice Board</a></li>
		<li><a href='#tool4'>Calendar</a></li>
		<li><a href='#tool5'>Student Management</a></li>
		<li><a href='#tool6'>File Management</a></li>
		<li><a href='#tool7'>Group Progress Tracking</a></li>
		<li><a href='#tool8'>Tool Incorporation</a></li>
		<li><a href='#tool9'>External References</a></li>
	</ul>

	<p>The following section outlines the facilities and features provided by these tools.</p>

	<a name="tool1"></a><h3>Course Look and Feel</h3>

	<p>WebCMS provides an interface for the construction of course Web sites, and the look and feel of the course as a whole. Courses can be customized in terms of several attributes. For
		instance, the color of the screen layout can be chosen from existing (or custom-built) color schemes. A default set of tools is made available to the course Web page. Tools are configurable
		by lecturers, and can be added/removed as necessary.</p>

		<a name="tool2"></a><h3>Course Planning, Design, Templates</h3>

		<p>This tool assists with the initial course layout and structuring. The Course Outline link under Administration in the menu bar gives a tool that assists with building course outlines.
			Course outline provides an overview of the course structure and may include syllabus, objectives, dates for assignments, lectures and other material that is relevant to the course. Template
			examples are available to style the layout of the course introduction. If you do not wish to use the Intro builder, you use an existing course introduction and upload this file to the
			server.</p>

			<p>The Administration link itself gives access to a tool that allows lecturers to include various other tools on the course web site. Tools that can be included under this section are Class,
				Schedule, Consultation and Allocation. All these tools provide templates for collecting the required information.</p>

				<a name="tool3"></a><h3>Notice Board</h3>

				<p>This tool allows lecturers to post messages of interest to the class such as last minute changes or other special announcements related to the course. These messages appear in the Notice
					Board and are displayed whenever the main course Web page is accessed or when the Notices link is clicked.</p>

					<a name="tool4"></a><h3>Calendar</h3>

					<p>A calendar (like a daily planner) allows lecturers to post events that can be viewed by students in the class. Calendar entries include event details and date. WebCMS displays the event
						along with the number of days left before the event. This allows students to keep track of their class schedule, and see the past and future calendar events. Lecturers can also add, modify or
						remove a past or future event.</p>

						<a name="tool5"></a><h3>Student Management</h3>

						<p>This is a major set of features in WebCMS, which provides facilities similar to Student Management System (SMS) that is currently being used in CSE. It is under the WebSMS (aka Web-based
							Student Management System) section of course Web page. Four major components that make up the WebSMS are Student, Course Item, Assessment and Final Mark.</p>

							<p>Student section provides facilities for lecturers to add/delete students to the course. For adding students, WebCMS provides a searching facility for lecturer to search for students in
								CSE. Students can be searched by family name, given name, program, stage or student id. Searching results display list of students that matches the keyword entered by the lecturers, along
								with their relevant information such as program, stage, gender and etc.</p>

								<p>Furthermore, lecturers can view the class lists for the course. Class lists can be presented and printed in a variety of configurations and orderings. By default, class lists is presented
									with ordering by family name. However, lecturers are given choice to order the lists by student id, gender, program and stage.</p>

									<p>The second main component of WebSMS is Course Item, which gives lecturers ability to create item related to a course such as assignment, project, test, lab and etc. Different constraint
										can be placed on the course item, allowing the system to perform checking on the value entered by lecturers when updating student assessment.</p>

										<p>The third component of WebSMS is Assessment, which includes the facilities to enable lecturers update student results on the course item created for the course. Student assessment can be
											entered one student at a time, or can be uploaded (in a simple, predetermined format) as a whole. In either case, WebCMS perform checking on the value entered according to the constraint
											specified by the lecturers when creating course item.</p>

											<p>Lecturers can view all the student's assessment for a course or an individual student. On this report page, the lecturer can view student profile and their scores for each course item of
												the course. Student assessment can be presented and printed in a variety of configurations and orderings. This is an important feature allowing lecturers to generate a report end of the
												session for class assessment.</p>

												<p>Lastly, the Final Mark. This includes facilities that allow lecturers to generate student final mark and the corresponding grade for the course. Lecturers are given facilities to enter
													formula expression that is used to calculate the mark, allowing WebCMS to automatically generate final mark and grades. One of the major features of this tool is the scaling facility. This
													allows lecturers to scale the mark for any of the course item, using graph. The graph presented shows the overall class performance for a particular course item. Lecturers use this graph to
													scale the mark until the desired graph is achieved.</p>

													<a name="tool6"></a><h3>File Management</h3>

													<p>This tool refers to the facilities to enable lecturers upload materials related to the course such as lecture notes, tutorial sheets and solution, lab exercise and etc to WebCMS server.
														WebCMS offers a facility for file uploading to the course's storage space on WebCMS server. Lecturers can upload the course-related materials such as lecture notes, tutorial sheets to be
														downloaded by the students in the class. At any time, they can remove the files from the server, rename the files, and etc.</p>

														<a name="tool7"></a><h3>Group Progress Tracking</h3>

														<p>Group Progress tracking allows lecturers to monitor and track group progress in the course. Indicators of group participation such as number of messages and notices posted in the group Web
															page is available. Doing so allows lecturers to identify groups who have stopped making progress. This can be used to make inferences about the level of interest of a group project. If
															lecturers are not satisfy with the group participation or want to make comments to the group, they can send an email to the group via the mail facility provided.</p>

															<a name="tool8"></a><h3>Tool Incorporation</h3>

															<p>A tool is a feature supplied by WebCMS that can be incorporated into any course such as Message Board, WebGMS (Web-based Group Management System). Each course has different requirements
																and needs in which the tools might not be applied or suitable to the course. Therefore, it's important to provide a facility enabling lecturers to add/delete these tools when necessary. In
																WebCMS, tools can be made accessible under the Tool section in the navigation bar of the course Web page. Lecturers can add/delete these tools from the course Web page.</p>

																<a name="tool9"></a><h3>External References</h3>

																<p>This tool allows placement of a link in the navigation bar that is linked to external references, such as textbook references, paper references, and URLs.</p>
															</div>
														</body>
														</html>

														@stop
