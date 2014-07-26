@extends('layouts.main')

@section('title') WebCMS - Student Tools @stop
@section('heading') Student Tools @stop 

@section('content')
    <div>
        <ul class="nav nav-tabs nav-justified">
            <li>{{ HTML::linkAction('InfoController@getAbout', 'Overview') }}</li>
            <li>{{ HTML::linkAction('InfoController@getLecturerTools', 'Staff Tools') }}</li>
            <li class="active">
                {{ HTML::linkAction('InfoController@getStudentTools', 'Student Tools') }}
            </li>
        </ul>
        <br>

        <p>WebCMS provides a set of tools for students as the following:</p>

        <ul>
            <li><a href='#tool1'>Message Board</a></li>
            <li><a href='#tool2'>Grade Tool</a></li>
            <li><a href='#tool3'>Group Web Pages</a></li>
        </ul>

        <p>The following section outlines the facilities and features provided by these tools.</p>

        <a name="tool1"></a><h3>Message Board</h3>

        <p>Message Board, aka Bulletin Board, is asynchronous discussion that provides the means for students to engage in collaborative exchange about topics on the course and allows classmates to discuss various issues. It facilitates the communication among students and lecturers in a course in the form of one-to-many communications.</p>

        <p>Through Message Board, students are able to motivate each other, talk to others and get reinforcement on issues they may not understand by posting messages to a common area. By default, WebCMS presents list of messages sorted by the latest messages being posted. However, users are allowed to sort the messages in any order by clicking the link on top of the messages such as Topic, Message Title, Poster, Date Posted and etc. Besides, messages can have embedded URLs which are clickable by WebCMS.</p>

        <p>In addition, the messages can be searched by criteria such as Author or Message. Therefore, messages can be easily found by selecting a search criterion and entering relevant keyword. Students and lecturers of a particular course are allowed to add, edit or delete message on the Message Board. There is a link presented beside the message to allow the creator of the message to perform function such as edit, or delete the message. This link will not be presented other user who is not the poster of the message. General Public is allowed to view the messages being posted in the course. However, they are not allowed to add any message to the Message Board.</p>

        <a name="tool2"></a><h3>Grade Tool</h3>

        <p>When students have access to their own grades, they can better track the progress of their own learning. WebCMS give student a way to access their own grades on assignments and tests, and course statistics under the WebSMS section of the course Web page. Each student can view his or her own marks as entered by the lecturers. The student also has access to minimum, maximum marks for each course item. In addition, a graph is presented showing the class achievement for each course item.</p>

        <a name="tool3"></a><h3>Group Web Pages</h3>

        <p>True collaboration requires online work areas with controlled access for flexibility in forming and reforming collaborative groups as the course unfolds [f]. Group Web pages provides a
        private space for the group to organize and track collaborations. Group Web pages helps students get organized and share information with other students in a group to create a collaborative
        working environment.</p>

        <p>This is an important feature particularly for courses that have a group project. WebCMS gives students a way to register their group under WebGMS section of the course Web page, and
        auto-generate a group Web page once registered. WebCMS enables lecturers to place additional constraint on the number of students in a group by allowing lecturers to set the minimum and
        maximum numbers of students in a group.</p>

        <p>This tool includes features that facilitate the communication and collaboration among group members such as Notice, Calendar, To Do List, Message Board, Meeting Minutes, WebCVS, and etc.
        Furthermore, group members have the ability to upload/download files to/from the server with permission. In addition, group members have the ability to customize their group Web page such as
        changing the color scheme, create links in the navigation bar and etc.</p>
    </div>
@stop
