@extends('layouts.main')

@section('title') WebCMS Help @stop
@section('heading') WebCMS Help @stop

@section('head')
@parent
<style>
    th {color:white;background-color:#202077;}
</style>
@stop

@section('content')
    <div align="center">
        <table width='100%' cellspacing='0'>
            <tr class='head'>
                <th align='left' valign='top'>Content</th>
            </tr>
        </table>

        <table width='100%' cellspacing='0'>
            <tr>
                <td></td>
            </tr>

            <tr>
                <td align='left' valign='top'><nobr><a href='#general'>General Help</a></nobr></td>
                <td align='left' valign='top'><nobr><a href='#admin'>Administration Tool</a></nobr></td>
                <td align='left' valign='top'><nobr><a href='#class'>Classes Tool</a></nobr></td>
                <td align='left' valign='top'><nobr><a href='#consult'>Consultation Tool</a></nobr></td>
                <td align='left' valign='top'><nobr><a href='#schedule'>Schedule Tool</a></nobr></td>
            </tr>

            <tr>
                <td align='left' valign='top'><nobr><a href='#calendar'>Calendar Tool</a></nobr></td>

                <td align='left' valign='top'><nobr><a href='#intro'>Course Outline Tool</a></nobr></td>

                <td align='left' valign='top'><nobr><a href='#notice'>Notice Tool</a></nobr></td>

                <td align='left' valign='top'><nobr><a href='#message'>Messageboard</a></nobr></td>

                <td align='left' valign='top'><nobr><a href='#staff'>Staff Tool</a></nobr></td>
            </tr>

            <tr>
                <td align='left' valign='top'><nobr><a href='#crs'>WebCRS Tool</a></nobr></td>

                <td align='left' valign='top'><nobr><a href='#gms'>WebGMS Tool</a></nobr></td>

                <td align='left' valign='top'><nobr><a href='#sms'>WebSMS Tool</a></nobr></td>

                <td align='left' valign='top'><nobr><a href='#stu'>Student Tool</a></nobr></td>

                <td align='left' valign='top'><nobr><a href='#info'>Assessment Info Tool</a></nobr></td>
            </tr>

            <tr>
                <td align='left' valign='top'><nobr><a href='#ass'>Assessment Tool</a></nobr></td>

                <td align='left' valign='top'><nobr><a href='#final'>Final Mark Tool</a></nobr></td>

                <td align='left' valign='top'><nobr><a href='#work'>Work Tool</a></nobr></td>

                <td align='left' valign='top'><nobr><a href='#menu'>Menu Preference Tool</a></nobr></td>

                <td align='left' valign='top'><nobr><a href='#tool'>WebCMS Tools</a></nobr></td>
            </tr>

            <tr>
                <td align='left' valign='top'><nobr><a href='#pre'>Preferences Tool</a></nobr></td>
            </tr>

            <tr>
                <td align='left' valign='top'>&nbsp;</td>
            </tr>
        </table><a name='general'></a>

        <table width='100%' cellspacing='0'>
            <tr class='head'>
                <th align='left' valign='top'>General Help</th>
            </tr>

            <tr>
                <td align='left' valign='top'>
                    Welcome to WebCMS. WebCMS is designed to simplify the construction of a course website, yet providing powerful tools. Here are some tips that can help you familiarise with WebCMS
                    quicker:

                    <ul>
                        <li>All tools are to be accessed via menu at left hand side</li>

                        <li>In all WebCMS tools, 'Add New' buttons are located at top right hand side while other buttons will be at left hand side</li>

                        <li>Click on the '+' button next to the tool link in menu to expand/hide the sub-tools</li>
                    </ul>
                </td>
            </tr>

            <tr>
                <td align='right' valign='top'><nobr><a href='#top'>[top]</a></nobr></td>
            </tr>

            <tr>
                <td align='left' valign='top'>&nbsp;</td>
            </tr>
        </table><a name='admin'></a>

        <table width='100%' cellspacing='0'>
            <tr class='head'>
                <th align='left' valign='top'>Administration Tool</th>
            </tr>

            <tr>
                <td align='left' valign='top'>Administration tool allows you to add the standard sub-tools under administration, this includes classes, consultation and schedule tools.<br>
                Simply click one the use check box to add, uncheck it to remove.</td>
            </tr>

            <tr>
                <td align='right' valign='top'><nobr><a href='#top'>[top]</a></nobr></td>
            </tr>

            <tr>
                <td align='left' valign='top'>&nbsp;</td>
            </tr>
        </table><a name='class'></a>

        <table width='100%' cellspacing='0'>
            <tr class='head'>
                <th align='left' valign='top'>Classes Tool</th>
            </tr>

            <tr>
                <td align='left' valign='top'>
                    Class tool allows you to add classes to this course.<br>
                    You need to add a new class type before adding class. Example of class type can be Lecture, Tutorial, or even Exam.<br>
                    After adding class type, now you can add class for this class type, simply click on 'Add new' button. Now you need to enter the class details, following are the explaination for
                    each class details:

                    <ul>
                        <li>Weekly / One off : class runs once a week / once on specific date</li>

                        <li>Day / Date : Choose a day of the week / specific date for this class</li>

                        <li>Staff : staff who will run this class, you can add new staffs from staff tool</li>

                        <li>Stu Reg : Check the box to allow students to register in this class from WebCRS by them selves</li>

                        <li>Time : Time when this class will run</li>

                        <li>Location : The location where this class will take place, can leave blank if not decided</li>

                        <li>Capacity : The maximun number of students can be registered in this class</li>
                    </ul>Class types can reordered by clicking move up or move down button
                </td>
            </tr>

            <tr>
                <td align='right' valign='top'><nobr><a href='#top'>[top]</a></nobr></td>
            </tr>

            <tr>
                <td align='left' valign='top'>&nbsp;</td>
            </tr>
        </table><a name='consult'></a>

        <table width='100%' cellspacing='0'>
            <tr class='head'>
                <th align='left' valign='top'>Consultation Tool</th>
            </tr>

            <tr>
                <td align='left' valign='top'>
                    Consultation tool allows you to add consultation slots for each staff member.<br>
                    Click on the 'Add New' button to add details of consultation.

                    <ul>
                        <li>Name : Staff for this consultation slot</li>

                        <li>Day : Day of the week</li>

                        <li>Time : Time period for the consultation</li>

                        <li>Location : The location where consultation will take place</li>
                    </ul>
                </td>
            </tr>

            <tr>
                <td align='right' valign='top'><nobr><a href='#top'>[top]</a></nobr></td>
            </tr>

            <tr>
                <td align='left' valign='top'>&nbsp;</td>
            </tr>
        </table><a name='schedule'></a>

        <table width='100%' cellspacing='0'>
            <tr class='head'>
                <th align='left' valign='top'>Schedule Tool</th>
            </tr>

            <tr>
                <td align='left' valign='top'>Schedule tools allow you to list out weekly schedules for this course.<br>
                Before adding weekly schedules, you will need to add at least one column to the schedule, the column is the name of the schedule item, for example lecture. After adding a column you
                can now add weekly schedule. You will need to choose a week and fill in the schedule of that week under the column you created. You can also add more columns to the schedule if
                required.<br>
                To delete a column, simply empty the column you wish to delete, note that this will delete all schedules under this column with no back ups.</td>
            </tr>

            <tr>
                <td align='right' valign='top'><nobr><a href='#top'>[top]</a></nobr></td>
            </tr>

            <tr>
                <td align='left' valign='top'>&nbsp;</td>
            </tr>
        </table><a name='calendar'></a>

        <table width='100%' cellspacing='0'>
            <tr class='head'>
                <th align='left' valign='top'>Calendar Tool</th>
            </tr>

            <tr>
                <td align='left' valign='top'>Calendar tool allows you to view calendar for this semester and provides facilities to add course events.<br>
                To add new event you will need to enter event name and date, time left column will automatically calculate the time left before this event is due. An example of event can be
                assignment due date or exam date.</td>
            </tr>

            <tr>
                <td align='right' valign='top'><nobr><a href='#top'>[top]</a></nobr></td>
            </tr>

            <tr>
                <td align='left' valign='top'>&nbsp;</td>
            </tr>
        </table><a name='intro'></a>

        <table width='100%' cellspacing='0'>
            <tr class='head'>
                <th align='left' valign='top'>Course Outline Tool</th>
            </tr>

            <tr>
                <td align='left' valign='top'>Course intro tool allows you to update course introduction informations.<br>
                There are two ways to update course intro, by link or by template. If you choose to update by link, simply provide the URL of the course intro or upload a file to WebCMS server.
                WebCMS has already provided a template course intro for your convenience, simply fill in the fields you wish to display and WebCMS will generate a course intro for you.<br>
                You can only add one course intro to the course, if you wish to add new intro please remove the previous one then add again.</td>
            </tr>

            <tr>
                <td align='right' valign='top'><nobr><a href='#top'>[top]</a></nobr></td>
            </tr>

            <tr>
                <td align='left' valign='top'>&nbsp;</td>
            </tr>
        </table><a name='notice'></a>

        <table width='100%' cellspacing='0'>
            <tr class='head'>
                <th align='left' valign='top'>Notice Tool</th>
            </tr>

            <tr>
                <td align='left' valign='top'>Notice tool allows you to post important notices.<br>
                Simply fill in the topic and message to add a new notice.</td>
            </tr>

            <tr>
                <td align='right' valign='top'><nobr><a href='#top'>[top]</a></nobr></td>
            </tr>

            <tr>
                <td align='left' valign='top'>&nbsp;</td>
            </tr>
        </table><a name='message'></a>

        <table width='100%' cellspacing='0'>
            <tr class='head'>
                <th align='left' valign='top'>Messageboard</th>
            </tr>

            <tr>
                <td align='left' valign='top'>
                    <p>The Message board allows staff and students to discuss aspects of the course.</p>

                    <p>Discussions take place under broad topic areas, which are defined by the lecturer. Within each topic is a collection of discussions (message threads). A thread of discussion is
                    started by either a student or course staff member posting a message. Students and staff can reply to this message to contribute to the discussion.</p>

                    <p>The MessageBoard attempts to display topics and threads to enable you to easily find recent postings. The list of topics is displayed in a fixed order: the order that the
                    topics weere created. The list of threads is ordered by the time that the last message was added to the thread. The most recently updated discussions come first. Entries in topic
                    and thread lists are also colour-coded: a yellow entry had a message posted to it within the last 24 hours; a pale grey entry was posted within the last 3 days; entries become
                    darker grey as they get older.</p>

                    <p>Within the list of topics, clicking on the topic title takes you to a list of threads under that topic. Within the list of threads, clicking on the thread title takes you to
                    the top of the list of messages for that thread. In both tables, clicking on the time in the Last Update column takes you direct to the latest message posted under that topic or
                    thread.</p>

                    <p>Messages are composed in a text box using a small collection of markup elements (e.g. [b]bold[/b], etc.). All other text typed in the text box is interpreted literally so, e.g.
                    HTML markup are rendered exactly as typed. The [code] tag allows you to interpolate blocks of code into your messages.</p>
                </td>
            </tr>

            <tr>
                <td align='right' valign='top'><nobr><a href='#top'>[top]</a></nobr></td>
            </tr>

            <tr>
                <td align='left' valign='top'>&nbsp;</td>
            </tr>
        </table><a name='staff'></a>

        <table width='100%' cellspacing='0'>
            <tr class='head'>
                <th align='left' valign='top'>Staff Tool</th>
            </tr>

            <tr>
                <td align='left' valign='top'>Staff tool allows you to add new staffs to the course.<br>
                Click on add new staff button to search for the staff you want to add, then followed by selecting a role to this new staff.<br>
                You can choose to let any staff to be displayed in the menu under 'Staff' item, to do this simply click on the menu check box to add this staff to menu. Lecture-In-Charge, Lecture and
                System support are to be display in menu by default.<br>
                There is only one Lecture-In-Charge allowed for each course.<br>
                If you want to reorder the staffs displayed in menu, please modify from menu preference.</td>
            </tr>

            <tr>
                <td align='right' valign='top'><nobr><a href='#top'>[top]</a></nobr></td>
            </tr>

            <tr>
                <td align='left' valign='top'>&nbsp;</td>
            </tr>
        </table><a name='crs'></a>

        <table width='100%' cellspacing='0'>
            <tr class='head'>
                <th align='left' valign='top'>WebCRS Tool</th>
            </tr>

            <tr>
                <td align='left' valign='top'>
                    WebCRS allows you to register students into classes, these classes are created from 'classes tool'.<br>

                    <ul>
                        <li>View class rolls : select a class and view the students enrolled in this class.</li>

                        <li>Class statistic : view the enrolment status for each class.</li>

                        <li>Update student : Register indivdual student to classes.</li>

                        <li>Update Class : Update class registration through file upload.</li>
                    </ul>
                </td>
            </tr>

            <tr>
                <td align='right' valign='top'><nobr><a href='#top'>[top]</a></nobr></td>
            </tr>

            <tr>
                <td align='left' valign='top'>&nbsp;</td>
            </tr>
        </table><a name='gms'></a>

        <table width='100%' cellspacing='0'>
            <tr class='head'>
                <th align='left' valign='top'>WebGMS Tool</th>
            </tr>

            <tr>
                <td align='left' valign='top'>WebGMS tool allows you to modify the group settings such as group size, closing date and default group name.<br>
                Group registration can be done from 'Registration' sub-tool. To add a new group, you will need to enter group name first, then select group members. Lecture-In-Charge and add
                arbitrary number of group members while students only allow add to maximun number being set.<br>
                For student, only group members can add new members to the group, if any student wants to join a group they will need to contact group members to add him/her to the group.<br>
                'Registration' sub-tool will display as 'Group' once closing date has been reached. Students will not allow to modify group members after closing date.</td>
            </tr>

            <tr>
                <td align='right' valign='top'><nobr><a href='#top'>[top]</a></nobr></td>
            </tr>

            <tr>
                <td align='left' valign='top'>&nbsp;</td>
            </tr>
        </table><a name='sms'></a>

        <table width='100%' cellspacing='0'>
            <tr class='head'>
                <th align='left' valign='top'>WebSMS Tool</th>
            </tr>

            <tr>
                <td align='left' valign='top'>WebSMS includes tools for student managment.</td>
            </tr>

            <tr>
                <td align='right' valign='top'><nobr><a href='#top'>[top]</a></nobr></td>
            </tr>

            <tr>
                <td align='left' valign='top'>&nbsp;</td>
            </tr>
        </table><a name='stu'></a>

        <table width='100%' cellspacing='0'>
            <tr class='head'>
                <th align='left' valign='top'>Student Tool</th>
            </tr>

            <tr>
                <td align='left' valign='top'>The Student tool allows you to add students to this course. Offically enrolled student should already have been automatically uploaded from NSS; all
                other students added by this tool are not offically enrolled. You can choose to enrol them manually in this tool, but once enrolled you will not be able to remove them.</td>
            </tr>

            <tr>
                <td align='right' valign='top'><nobr><a href='#top'>[top]</a></nobr></td>
            </tr>

            <tr>
                <td align='left' valign='top'>&nbsp;</td>
            </tr>
        </table><a name='info'></a>

        <table width='100%' cellspacing='0'>
            <tr class='head'>
                <th align='left' valign='top'>Assessment Info Tool</th>
            </tr>

            <tr>
                <td align='left' valign='top'>
                    Assessment info tool allows you to create assessment items for this course, there are three types of assessment available to create:

                    <ul>
                        <li>Mark : assessment which uses number to represent it's level of completness.</li>

                        <li>Enumeration : assessment which uses some specified grades.</li>

                        <li>Text : assessment which require marker's comments.</li>
                    </ul>
                </td>
            </tr>

            <tr>
                <td align='right' valign='top'><nobr><a href='#top'>[top]</a></nobr></td>
            </tr>

            <tr>
                <td align='left' valign='top'>&nbsp;</td>
            </tr>
        </table><a name='ass'></a>

        <table width='100%' cellspacing='0'>
            <tr class='head'>
                <th align='left' valign='top'>Assessment Tool</th>
            </tr>

            <tr>
                <td align='left' valign='top'>Assessment tool allows you to update each student's assessment marks.</td>
            </tr>

            <tr>
                <td align='right' valign='top'><nobr><a href='#top'>[top]</a></nobr></td>
            </tr>

            <tr>
                <td align='left' valign='top'>&nbsp;</td>
            </tr>
        </table><a name='final'></a>

        <table width='100%' cellspacing='0'>
            <tr class='head'>
                <th align='left' valign='top'>Final Mark Tool</th>
            </tr>

            <tr>
                <td align='left' valign='top'>Final mark tool calculate final mark for students automatically.<br>
                You will need to update the formula for final mark, this formula must be valid PHP code in order to have the finalisation work.</td>
            </tr>

            <tr>
                <td align='right' valign='top'><nobr><a href='#top'>[top]</a></nobr></td>
            </tr>

            <tr>
                <td align='left' valign='top'>&nbsp;</td>
            </tr>
        </table><a name='work'></a>

        <table width='100%' cellspacing='0'>
            <tr class='head'>
                <th align='left' valign='top'>Work Tool</th>
            </tr>

            <tr>
                <td align='left' valign='top'>
                    Work Tools allows you to add the standard sub-tools under work in similar way to administration tool.<br>
                    Sub-Tools includes Lecture, Tutorial, Lab and Assignment. These tools have similar interface. Some features for these tools are:

                    <ul>
                        <li>You can add topics and materials.</li>

                        <li>You can edit display notes by clicking 'Edit note' button</li>

                        <li>You can order the topics by week, or by topics. If you choose to order by topics, you can rearrange the order in any way you like.</li>
                    </ul>
                </td>
            </tr>

            <tr>
                <td align='right' valign='top'><nobr><a href='#top'>[top]</a></nobr></td>
            </tr>

            <tr>
                <td align='left' valign='top'>&nbsp;</td>
            </tr>
        </table><a name='menu'></a>

        <table width='100%' cellspacing='0'>
            <tr class='head'>
                <th align='left' valign='top'>Menu Preference Tool</th>
            </tr>

            <tr>
                <td align='left' valign='top'>
                    Menu preference tool allows you to modify various properties to menu items.<br>

                    <ul>
                        <li>Check the home check box to set the default home page for this course. This page will be loaded when you first enter course webpage.</li>

                        <li>You can rearrange the order of all menu items.</li>

                        <li>Check on the expand check box to make the sub-tools showable by default.</li>

                        <li>You can add new menu items.</li>

                        <li>You can only modify name for standard WebCMS tools, you will need to go to WebCMS Tools to remove or add standard WebCMS tools.</li>
                    </ul>
                </td>
            </tr>

            <tr>
                <td align='right' valign='top'><nobr><a href='#top'>[top]</a></nobr></td>
            </tr>

            <tr>
                <td align='left' valign='top'>&nbsp;</td>
            </tr>
        </table><a name='tool'></a>

        <table width='100%' cellspacing='0'>
            <tr class='head'>
                <th align='left' valign='top'>WebCMS Tools</th>
            </tr>

            <tr>
                <td align='left' valign='top'>The WebCMS Tools link lists all the available standard WebCMS tools. Simply click on the use check box to add a tool; uncheck to delete.</td>
            </tr>

            <tr>
                <td align='right' valign='top'><nobr><a href='#top'>[top]</a></nobr></td>
            </tr>

            <tr>
                <td align='left' valign='top'>&nbsp;</td>
            </tr>
        </table><a name='pre'></a>

        <table width='100%' cellspacing='0'>
            <tr class='head'>
                <th align='left' valign='top'>Preferences Tool</th>
            </tr>

            <tr>
                <td align='left' valign='top'>
                    The Preferences link allows you to modify course website settings:

                    <ul>
                        <li>Course color : The colour scheme used in this course website.</li>

                        <li>Base-URL : appears in text input boxes when entering links; this can save you from typing long URLs.</li>

                        <li>Results display per page : the number of data records to be displayed in one page, you can set to 0 for unlimited. Default is 25.</li>
                    </ul>
                </td>
            </tr>

            <tr>
                <td align='right' valign='top'><nobr><a href='#top'>[top]</a></nobr></td>
            </tr>

            <tr>
                <td align='left' valign='top'>&nbsp;</td>
            </tr>
        </table>
    </div>
@stop