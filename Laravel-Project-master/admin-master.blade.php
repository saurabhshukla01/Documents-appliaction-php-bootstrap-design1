<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Responsive Bootstrap Advance Admin Template</title>

        <!-- BOOTSTRAP STYLES-->
        <link href="{{url('')}}/assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FONTAWESOME STYLES-->
        <link href="{{url('')}}/assets/css/font-awesome.css" rel="stylesheet" />
        <!--CUSTOM BASIC STYLES-->
        <link href="{{url('')}}/assets/css/basic.css" rel="stylesheet" />
        <!--CUSTOM MAIN STYLES-->
        <link href="{{url('')}}/assets/css/custom.css" rel="stylesheet" />
        <!-- GOOGLE FONTS-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

        <script src="https://code.jquery.com/jquery-1.12.4.js" type="text/javascript"></script> 

    </head>
    <body>
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{url('/')}}">COMPANY NAME</a>
                </div>

                <div class="header-right">

                    <a href="message-task.html" class="btn btn-info" title="New Message"><b>30 </b><i class="fa fa-envelope-o fa-2x"></i></a>
<a href="{{url('/change-password')}}" class="btn btn-primary" title="Chang Password"><b></b><i class="fa fa-lock fa-2x"></i></a>
                    <a href="{{url('/logout')}}" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></a>

                </div>
            </nav>
            <!-- /. NAV TOP  -->
            <nav class="navbar-default navbar-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="main-menu">
                        <li>
                            <div class="user-img-div">
                                @if(Session::get('mytype') == 's')
                                <img src="{{url('')}}/images/student/student-{{ Session::get('myid') }}.{{ Session::get('mypicture') }}" class="img-thumbnail" />
                                @elseif(Session::get('mytype') == 'a')
                                <img src="{{url('')}}/images/administrator/administrator-{{ Session::get('myid') }}.{{ Session::get('mypicture') }}" class="img-thumbnail" />
                                
                                @elseif(Session::get('mytype') == 't')
                                <img src="{{url('')}}/images/teacher/teacher-{{ Session::get('myid') }}.{{ Session::get('mypicture') }}" class="img-thumbnail" />
                                @endif


                                <div class="inner-text">
                                    {{ Session::get('myname') }}
                                    <br />
                                    <small>Last Login : 2 Weeks Ago </small>
                                </div>
                            </div>

                        </li>
                        }

                        <li>
                            <a href="{{url('/profile-management/view')}}"><i class="fa fa-dashboard "></i>Profile</a>
                        </li>

                        <li>
                            <a @if(isset($sel_menu) && $sel_menu=='student')
                                class="active-menu"
                                @endif
                                href="#"><i class="fa fa-graduation-cap"></i>Student<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('/student-management')}}"><i class="fa fa-toggle-on"></i>New Student</a>
                                </li>
                                <li>
                                    <a href="{{url('/student-management/view')}}"><i class="fa fa-bell "></i>View Student</a>
                                </li>                           
                            </ul>
                        </li>

                        <li>
                            <a 
                                @if(isset($sel_menu) && $sel_menu=='notice')
                                class="active-menu"
                                @endif
                                href="#"><i class="fa fa-envelope"></i>Notice<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('/notice-management')}}"><i class="fa fa-toggle-on"></i>New Notice</a>
                                </li>
                                <li>
                                    <a href="{{url('/notice-management/view')}}"><i class="fa fa-bell "></i>View Notice</a>
                                </li>                           
                            </ul>
                        </li>
                        
                        
                        <li>
                            <a 
                                @if(isset($sel_menu) && $sel_menu=='teacher')
                                class="active-menu"
                                @endif
                                href="#"><i class="fa fa-envelope"></i>Teacher<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('/teacher-management')}}"><i class="fa fa-toggle-on"></i>Teacher Registration</a>
                                </li>
                                <li>
                                    <a href="{{url('/teacher-management/view')}}"><i class="fa fa-bell "></i>Teacher List</a>
                                </li>                           
                            </ul>
                        </li>
                        
                        
                        



                        <li>
                            <a
                            @if(isset($sel_menu) && $sel_menu=='expense')
                                class="active-menu"
                                @endif
                             href="#"><i class="fa fa-money"></i>Expense<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('/expense-management')}}"><i class="fa fa-toggle-on"></i>New Expense</a>
                                </li>
                                <li>
                                    <a href="{{url('/expense-management/view')}}"><i class="fa fa-bell "></i>View Expense</a>
                                </li>                           
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-money"></i>Department<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('/department-management')}}"><i class="fa fa-toggle-on"></i>Add Department</a>
                                </li>
                                <li>
                                    <a href="{{url('/department-management/view')}}"><i class="fa fa-bell "></i>View Department</a>
                                </li>                           
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-desktop "></i>Course<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('/course-management')}}"><i class="fa fa-toggle-on"></i>New  Course</a>
                                </li>
                                <li>
                                    <a href="{{url('/course-management/view')}}"><i class="fa fa-bell "></i>View Course</a>
                                </li>                           
                            </ul>
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-desktop "></i>Designation<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('/designation-management')}}"><i class="fa fa-toggle-on"></i>New  Designation</a>
                                </li>
                                <li>
                                    <a href="{{url('/designation-management/view')}}"><i class="fa fa-bell "></i>View Designation</a>
                                </li>                           
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-book"></i>Subject<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('/subject-management')}}"><i class="fa fa-toggle-on"></i>New Subject</a>
                                </li>
                                <li>
                                    <a href="{{url('/subject-management/view')}}"><i class="fa fa-bell "></i>View Subject</a>
                                </li>                           
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-desktop "></i>Exam Fees<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('/examfees-management')}}"><i class="fa fa-toggle-on"></i>New Exam Fees</a>
                                </li>
                                <li>
                                    <a href="{{url('/examfees-management/view')}}"><i class="fa fa-bell "></i>View Exam Fees</a>
                                </li>                           
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-desktop "></i>Administrator<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('/administrator-management')}}"><i class="fa fa-toggle-on"></i>New Admin</a>
                                </li>
                                <li>
                                    <a href="{{url('/administrator-management/view')}}"><i class="fa fa-bell "></i>View Admin</a>
                                </li>                           
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-desktop "></i>Salary<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('/salary-management')}}"><i class="fa fa-toggle-on"></i>New Salary</a>
                                </li>
                                <li>
                                    <a href="{{url('/salary-management/view')}}"><i class="fa fa-bell "></i>View Salary</a>
                                </li>                           
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-desktop "></i>Semester Fees<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('/semesterfees-management')}}"><i class="fa fa-toggle-on"></i>New SemesterFees</a>
                                </li>
                                <li>
                                    <a href="{{url('/semesterfees-management/view')}}"><i class="fa fa-bell "></i>View SemesterFees</a>
                                </li>                           
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-desktop "></i>Online Exam<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('/online-exam')}}"><i class="fa fa-toggle-on"></i>Take Exam</a>
                                </li>
                                <li>
                                    <a href="{{url('/online-exam/view')}}"><i class="fa fa-bell "></i>View Result</a>
                                </li>                           
                            </ul>
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-desktop "></i>Gallery<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('/gallery-management')}}"><i class="fa fa-toggle-on"></i>Add Gallery</a>
                                </li>
                                <li>
                                    <a href="{{url('/gallery-management/view')}}"><i class="fa fa-bell "></i>View Gallery</a>
                                </li>                           
                            </ul>
                        </li>

                        
                                <li>
                                    <a href="#"><i class="fa fa-desktop "></i>Stuff<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            <a href="{{url('/stuff-management')}}"><i class="fa fa-toggle-on"></i>New Stuff</a>
                                        </li>
                                        <li>
                                            <a href="{{url('/stuff-management/view')}}"><i class="fa fa-bell "></i>View Stuff</a>
                                        </li>                           
                                    </ul>
                                </li>
                        
                                <li>
                                    <a href="#"><i class="fa fa-desktop "></i>Attendance<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            <a href="{{url('/daily-attendence')}}"><i class="fa fa-toggle-on"></i>Daily Attendence callsheet</a>
                                        </li>
                                        <li>
                                            <a href="{{url('/daily-attendence/view')}}"><i class="fa fa-bell "></i>View Attendence</a>
                                        </li>                           
                                    </ul>
                                </li>
                         <li>
                                    <a href="#"><i class="fa fa-desktop "></i>Bank<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            <a href="{{url('/bank')}}"><i class="fa fa-toggle-on"></i>Bank Statement</a>
                                        </li>
                                        <li>
                                            <a href="{{url('/bank/report')}}"><i class="fa fa-bell "></i>Bank Report</a>
                                        </li>                           
                                    </ul>
                                </li>

<!--
                                <li>
                                    <a href="#"><i class="fa fa-desktop "></i>UI Elements <span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            <a href="panel-tabs.html"><i class="fa fa-toggle-on"></i>Tabs & Panels</a>
                                        </li>
                                        <li>
                                            <a href="notification.html"><i class="fa fa-bell "></i>Notifications</a>
                                        </li>
                                        <li>
                                            <a href="progress.html"><i class="fa fa-circle-o "></i>Progressbars</a>
                                        </li>
                                        <li>
                                            <a href="buttons.html"><i class="fa fa-code "></i>Buttons</a>
                                        </li>
                                        <li>
                                            <a href="icons.html"><i class="fa fa-bug "></i>Icons</a>
                                        </li>
                                        <li>
                                            <a href="wizard.html"><i class="fa fa-bug "></i>Wizard</a>
                                        </li>
                                        <li>
                                            <a href="typography.html"><i class="fa fa-edit "></i>Typography</a>
                                        </li>
                                        <li>
                                            <a href="grid.html"><i class="fa fa-eyedropper "></i>Grid</a>
                                        </li>


                                    </ul>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-yelp "></i>Extra Pages <span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            <a href="invoice.html"><i class="fa fa-coffee"></i>Invoice</a>
                                        </li>
                                        <li>
                                            <a href="pricing.html"><i class="fa fa-flash "></i>Pricing</a>
                                        </li>
                                        <li>
                                            <a href="component.html"><i class="fa fa-key "></i>Components</a>
                                        </li>
                                        <li>
                                            <a href="social.html"><i class="fa fa-send "></i>Social</a>
                                        </li>

                                        <li>
                                            <a href="message-task.html"><i class="fa fa-recycle "></i>Messages & Tasks</a>
                                        </li>


                                    </ul>
                                </li>
                                <li>
                                    <a href="table.html"><i class="fa fa-flash "></i>Data Tables </a>

                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-bicycle "></i>Forms <span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">

                                        <li>
                                            <a href="form.html"><i class="fa fa-desktop "></i>Basic </a>
                                        </li>
                                        <li>
                                            <a href="form-advance.html"><i class="fa fa-code "></i>Advance</a>
                                        </li>


                                    </ul>
                                </li>
                                <li>
                                    <a href="gallery.html"><i class="fa fa-anchor "></i>Gallery</a>
                                </li>
                                <li>
                                    <a href="error.html"><i class="fa fa-bug "></i>Error Page</a>
                                </li>
                                <li>
                                    <a href="login.html"><i class="fa fa-sign-in "></i>Login Page</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-sitemap "></i>Multilevel Link <span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            <a href="#"><i class="fa fa-bicycle "></i>Second Level Link</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-flask "></i>Second Level Link</a>
                                        </li>
                                        <li>
                                            <a href="#">Second Level Link<span class="fa arrow"></span></a>
                                            <ul class="nav nav-third-level">
                                                <li>
                                                    <a href="#"><i class="fa fa-plus "></i>Third Level Link</a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-comments-o "></i>Third Level Link</a>
                                                </li>

                                            </ul>

                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="blank.html"><i class="fa fa-square-o "></i>Blank Page</a>
                                </li>-->
                            </ul>

                            </div>

                            </nav>
                            <!-- /. NAV SIDE  -->
                            @yield("content")
                            <!-- /. PAGE WRAPPER  -->
                            </div>
                            <!-- /. WRAPPER  -->

                            <div id="footer-sec">
                                &copy; 2014 YourCompany | Design By : <a href="http://www.binarytheme.com/" target="_blank">BinaryTheme.com</a>
                            </div>
                            <!-- /. FOOTER  -->
                            <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
                            <!-- JQUERY SCRIPTS -->





                            <!-- BOOTSTRAP SCRIPTS -->
                            <script src="{{url('')}}/assets/js/bootstrap.js"></script>
                            <!-- METISMENU SCRIPTS -->
                            <script src="{{url('')}}/assets/js/jquery.metisMenu.js"></script>
                            <!-- CUSTOM SCRIPTS -->
                            <script src="{{url('')}}/assets/js/custom.js"></script>

                            <!-- DATA TABLE SCRIPTS -->
                            <script src="{{url('')}}/assets/js/dataTables/jquery.dataTables.js"></script>
                            <script>
$(document).ready(function() {
    $('#dataTables-example').dataTable();
});
                            </script>


                            </body>
                            </html>
