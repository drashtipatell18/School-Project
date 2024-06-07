<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>School</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <!-- Bootstrap -->
    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgre-->
    <link href="{{ asset('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- bootstrprogressbar -->
    <link href="{{ asset('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <!-- bootstrdaterangepicker -->
    <link href="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Custom Theme Style -->
    <link href="{{ asset('build/css/custom.min.css') }}" rel="stylesheet">
    <style>
        .navbar.light {
            background-color: #2A3F54;

        }

        /* .navbar-brand,
        .navbar-brand img {
            margin-left: 15px !important;
            margin-right: 15px !important;


        } */

        .user-name {
            font-weight: bold;
            color: #fff;
            /* Adjust the color to match your design */
            text-transform: capitalize;
            /* Capitalize the user's name */
        }

        .my-dropdown-menu {
            background-color: #fff;
            /* Set the background color */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Add a shadow for depth */
            border: 1px solid #ddd;
            /* Add a border for separation */
        }

        .my-dropdown-menu a {
            color: black;
            /* Set link color */
        }

        .my-dropdown-menu a:hover {
            background-color: #f0f0f0;
            /* Change background color on hover */
            color: #555;
            /* Change text color on hover */
        }

        .profile_info span {
            font-size: 13px;
            line-height: 0px !important;
            color: #fff !important;
        }

        .img-circle.profile_img {
            width: 70%;
            background: #fff;
            margin-left: 15%;
            z-index: 1000;
            position: inherit;
            border: 1px solid rgba(52, 73, 94, 0.44);
            padding: 4px;
        }

        .left_col .scroll-view {
            width: 100%;
        }

        .dropdown-menu {
            left: -46px;
            top: 106%;
        }

        .profile_info {
            margin-left: -19px;
        }

        .navbar {
            padding: 0px !important;
        }

        .nav_title {
            width: 300px !important;
        }
    </style>
</head>


<!-- navbar menu -->
<nav class="navbar navbar-expand-lg">
    <a class="" href="#" style="">
        <img src="{{ asset('images/logo.png') }}" class="h-[100px]" alt="Logo"
            style="height: 80px; max-width: 100%;">
        <div class="navbar nav_title ml-0" style="border: 0;">
            <a href="{{ route('dashboard') }}" class="site_title">
                <span>Bhakti International School</span>
            </a>
        </div>
    </a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-lg-0">

        </ul>
        <div class="form-inline my-2 my-lg-0 m-0">
            <div class="profile_pic ml-8">
                @if (auth()->check())
                    @if (auth()->user()->image)
                        <img src="{{ asset('images/' . auth()->user()->image) }}" alt="User Image" width="100"
                            height="50px" class="img-circle profile_img">
                    @else
                        <!-- Display a blank image -->
                        <img src="" alt="" width="100" height="50px" class="img-circle profile_img">
                    @endif
                @endif
            </div>
            <div class="nav-item dropdown profile_info">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    @if (auth()->check())
                        <span class="user-name">{{ auth()->user()->role }}</span>
                        <br>
                        <span class="user-name">{{ auth()->user()->name }}</span>
                    @endif
                </a>

                <div class="dropdown-menu dropdown-menu-right my-dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('changepass') }}">
                        {{ __('Change Password') }}
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}">
                        {{ __('Logout') }}
                    </a>
                </div>
            </div>
        </div>

    </div>
</nav>

<!--\navbar menu -->

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    {{-- <div class="profile clearfix">
                        <div class="profile_pic">
                            @if (auth()->check())
                                @if (auth()->user()->image)
                                    <img src="{{ asset('images/' . auth()->user()->image) }}" alt="User Image"
                                        width="100" height="50px" class="img-circle profile_img">
                                @else
                                @endif
                            @endif
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>
                                @if (auth()->check())
                                    <h2>{{ auth()->user()->name }}</h2>
                                @endif
                            </h2>
                        </div>
                    </div> --}}
                    <!-- /menu profile quick info -->

                    <br />
                    @php
                        $userRole = '';
                    @endphp
                    @if (auth()->check())
                        @php
                            $userRole = strtolower(auth()->user()->role);
                        @endphp
                    @endif

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ route('dashboard') }}">Dashboard</a>
                                        </li>
                                    </ul>
                                </li>

                                @if ($userRole != 'teacher' && $userRole != 'librarian' && $userRole != 'student' && $userRole != 'parents')
                                    <li><a><i class="fa fa-user-plus ftlayer"></i> User
                                            <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{ route('users') }}">User</a>
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                                @if ($userRole != 'teacher' && $userRole != 'librarian' && $userRole != 'student' && $userRole != 'parents')
                                <li><a><i class="fa fa-user-plus ftlayer"></i> Role
                                        <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ route('roles') }}">Role</a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                                @if ($userRole != 'librarian' && $userRole != 'student' && $userRole != 'parents')
                                    <li><a><i class="fa fa-edit"></i> Academics
                                            <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{ route('classtimetable') }}">Class TimeTable</a></li>
                                            <li><a href="{{ route('section') }}">Sections</a></li>
                                            <li><a href="{{ route('class') }}">Class</a>
                                            </li>
                                            <li><a href="{{ route('teacher') }}">Teacher</a>
                                            </li>
                                            <li><a href="{{ route('teacherassign') }}">Assign Class Teacher</a>
                                            </li>
                                            <li><a href="{{ route('subject') }}">Subject</a>
                                            </li>
                                            <li><a href="{{ route('subjectgroup') }}">Subject Group</a>
                                            </li>
                                        </ul>
                                    </li>
                                @endif

                                @if ($userRole != 'librarian')
                                    <li><a><i class="fa fa-list-alt ftlayer"></i> Lesson Plan
                                            <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{ route('lessons') }}">Lesson</a>
                                            </li>
                                            <li><a href="{{ route('topics') }}">Topic</a>
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                                @if ($userRole != 'librarian')
                                    <li><a href="{{ route('homework') }}"><i
                                                class="fa fa-flask ftlayer"></i>HomeWork</a>
                                    </li>
                                @endif

                                @if ($userRole != 'teacher' && $userRole != 'librarian' && $userRole != 'student' && $userRole != 'parents')
                                    <li><a><i class="fa fa-object-group ftlayerr"></i>Inventory
                                            <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{ route('issueitems') }}">Issue Item</a>
                                            </li>
                                            <li><a href="{{ route('suppliers') }}">Item Supplier</a>
                                            </li>
                                            <li><a href="{{ route('stores') }}"> Item Store</a>
                                            </li>
                                            <li><a href="{{ route('categorys') }}"> Item Category</a>
                                            </li>
                                            <li><a href="{{ route('items') }}"> Add Items </a>
                                            </li>
                                            <li><a href="{{ route('itemstocks') }}"> Add Items Stock </a>
                                            </li>
                                        </ul>
                                    </li>
                                @endif

                                @if ($userRole != 'teacher' && $userRole != 'librarian' && $userRole != 'student' && $userRole != 'parents')
                                    <li><a><i class="fa fa-empire ftlayer"></i>Front CMS
                                            <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{ route('events') }}">Events</a>
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                                @if ($userRole != 'admin' && $userRole != 'superadmin' && $userRole != 'teacher' && $userRole != 'librarian')
                                    <li><a href="{{ route('student.details.view') }}"><i
                                                class="fa fa-user-plus ftlayer"></i>My Profile</a></li>
                                @endif
                                @if ($userRole != 'librarian' && $userRole != 'student' && $userRole != 'parents')
                                    <li><a><i class="fa fa-user-plus ftlayer"></i>
                                            Student Information<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{ url('/admin/student/admission/create') }}">Student
                                                    Admission</a></li>

                                            <li><a href="{{ route('student.details.view') }}">Student
                                                    Details</a></li>
                                        </ul>
                                    </li>
                                @endif
                                @if ($userRole != 'librarian' )
                                    <li><a><i class="fa fa-calendar-check-o ftlayer"></i>Attendance<span
                                                class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{ route('approve.leave') }}">Approve
                                                    Leave</a></li>
                                        </ul>
                                    </li>
                                @endif

                                @if ($userRole != 'teacher' && $userRole != 'librarian' && $userRole == 'student' && $userRole == 'parents')
                                    <li><a><i class="fa fa-money ftlayer"></i>Fees
                                            Collection<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{ route('offlinepayment') }}">Offline
                                                    Bank Payments</a></li>
                                        </ul>
                                    </li>
                                @endif
                                @if ($userRole != 'librarian')
                                    <li><a><i class="fa fa-map-o ftlayer"></i>Examinations<span
                                                class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            @if ($userRole == 'student' && $userRole == 'parents')
                                                <li><a href="{{ route('examtype') }}">Exam
                                                        Type</a></li>
                                                <li><a href="{{ route('examgroup') }}">Exam
                                                        Group</a></li>
                                                <li><a href="{{ route('marksgrade') }}">Marks
                                                        Grade</a></li>
                                                <li><a href="{{ route('exam') }}">Exam</a>
                                                </li>
                                            @endif
                                            <li><a href="{{ route('schedule') }}">Exam
                                                    Schedule</a></li>
                                            <li><a href="{{ route('result') }}">Exam
                                                    Result</a></li>

                                        </ul>
                                    </li>
                                @endif
                                @if ($userRole != 'librarian' && $userRole != 'teacher' && $userRole != 'student'&& $userRole != 'parents')
                                    <li><a><i class="fa fa-usd ftlayer"></i>Income<span
                                                class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{ route('income.head') }}">Income Head</a></li>
                                            <li><a href="{{ route('income') }}">Add Income</a></li>
                                        </ul>
                                    </li>
                                @endif

                                @if ($userRole != 'teacher' && $userRole != 'librarian' && $userRole != 'student'&& $userRole != 'parents')
                                    <li><a><i class="fa fa-credit-card ftlayer"></i>Expenses<span
                                                class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{ route('expenses.head') }}">Expenses Head</a></li>
                                            <li><a href="{{ route('expenses') }}">Add Expenses</a></li>
                                        </ul>
                                    </li>
                                @endif
                                @if ($userRole == 'student' && $userRole == 'parents' )
                                    <li><a><i class="fa fa-ioxhost ftlayer"></i>Front Office<span
                                                class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{ route('visitor.book') }}">Visitor Book</a></li>
                                        </ul>
                                    </li>
                                @endif
                                @if ($userRole != 'teacher' && $userRole != 'librarian' && $userRole != 'student'&& $userRole != 'parents')
                                    <li><a><i class="fa fa-ioxhost ftlayer"></i>Front Office<span
                                                class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{ route('admission.enquiry') }}">Admission Enquiry</a></li>
                                            <li><a href="{{ route('visitor.book') }}">Visitor Book</a></li>
                                            <li><a href="{{ route('phone.call.log') }}">Phone Call Log</a></li>
                                            <li><a href="{{ route('postal.dispatch') }}">Postal Dispatch</a></li>
                                            <li><a href="{{ route('postal.receive') }}">Postal Receive</a></li>
                                            <li><a href="{{ route('complaint') }}">Complain</a></li>
                                            <li><a href="{{ route('purpose') }}">Setup Front Office</a></li>
                                        </ul>
                                    </li>
                                @endif

                                @if ($userRole == 'librarian' )
                                    <li><a><i class="fa fa-sitemap ftlayer"></i>Human Resource<span
                                                class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{ route('staff.directory') }}">Staff Directory</a>
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                                @if ($userRole != 'librarian' && $userRole != 'student'&& $userRole != 'parents')
                                    <li><a><i class="fa fa-sitemap ftlayer"></i>Human Resource<span
                                                class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{ route('staff.directory') }}">Staff Directory</a>
                                            </li>
                                            <li><a href="{{ route('approve.leave.request') }}">Approve Leave
                                                    Request</a>
                                            </li>
                                            <li><a href="{{ route('leave.type') }}">Leave Type</a></li>
                                            <li><a href="{{ route('designation') }}">Designation</a></li>
                                            <li><a href="{{ route('department') }}">Department</a></li>
                                        </ul>
                                    </li>
                                @endif
                                @if ($userRole == 'student' && $userRole == 'parents')
                                    <li><a href="{{ route('noticeborads') }}"><i
                                                class="fa fa-bullhorn ftlayer"></i>Notice Board</a></li>
                                @endif
                                @if ($userRole != 'student' && $userRole != 'parents')
                                    <li><a><i class="fa fa-bullhorn ftlayer"></i>Communicate<span
                                                class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{ route('noticeborads') }}">Notice Board</a></li>
                                            <li><a href="{{ route('sendemails') }}">Send Email</a></li>
                                            <li><a href="{{ route('sendsms') }}">Send SMS</a></li>
                                            <li><a href="{{ route('emailtemplates') }}">Email Template</a></li>
                                            <li><a href="{{ route('smstemplates') }}">SMS Template</a></li>
                                        </ul>
                                    </li>
                                @endif
                                @if ($userRole != 'teacher')
                                    <li><a><i class="fa fa-book ftlayer"></i>Library<span
                                                class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{ route('books') }}">Book List</a></li>
                                            <li><a href="{{ route('members') }}">Issue - Return</a></li>
                                        </ul>
                                    </li>
                                @endif
                            </ul>
                        </div>

                    </div>
                    <!-- /sidebar menu -->
                </div>
            </div>

            <!-- content -->
            @yield('content')
            <!-- /content -->
            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Created by⭐<a href="https://kalathiyainfotech.com/">Kalathiya Infotech</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('vendors/nprogress/nprogress.js') }}"></script>
    <!-- Chart.js -->
    <script src="{{ asset('vendors/Chart.js/dist/Chart.min.js') }}"></script>
    <!-- jQuery Sparklines -->
    <script src="{{ asset('vendors/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
    <!-- morris.js -->
    <script src="{{ asset('vendors/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('vendors/morris.js/morris.min.js') }}"></script>
    <!-- gauge.js -->
    <script src="{{ asset('vendors/gauge.js/dist/gauge.min.js') }}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <!-- Skycons -->
    <script src="{{ asset('vendors/skycons/skycons.js') }}"></script>
    <!-- Flot -->
    <script src="{{ asset('vendors/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('vendors/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('vendors/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('vendors/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('vendors/Flot/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset('vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset('vendors/flot.curvedlines/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src="{{ asset('vendors/DateJS/build/date.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('build/js/custom.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <!-- Include jQuery -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

    <!-- Include DataTables JS -->
    {{-- <script>
        $(document).ready(function() {
            $('#userImage').click(function() {
                $('.dropdown-menu').toggle();
            });
        });
    </script> --}}

    @stack('scripts')
</body>

</html>
