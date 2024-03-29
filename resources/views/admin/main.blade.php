<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>
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

    <!-- Custom Theme Style -->
    <link href="{{ asset('build/css/custom.min.css') }}" rel="stylesheet">

</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="{{ route('dashboard') }}" class="site_title"><i class="fa fa-paw"></i>
                            <span>Gentelella Alela!</span></a>
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="{{ asset('production/images/img.jpg') }}" alt="..."
                                class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>John Doe</h2>images/img.jpg
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

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
                                </li>
                                <li><a><i class="fa fa-edit"></i> Academics
                                        <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ route('section') }}">Sections</a>
                                        </li>
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
                                <li><a><i class="fa fa-list-alt ftlayer"></i> Lesson Plan
                                        <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ route('lessons') }}">Lesson</a>
                                        </li>
                                        <li><a href="{{ route('topics') }}">Topic</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('homework') }}"><i class="fa fa-flask ftlayer"></i>HomeWork</a>

                                <li><a><i class="fa fa-user-plus ftlayer"></i>
                                        Student Information<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">

                                        <li><a href="{{ url('/admin/student/admission/create') }}">Student
                                                Admission</a></li>

                                        <li><a href="{{ route('student.details.view') }}">Student
                                                Details</a></li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-calendar-check-o ftlayer"></i>Attendance<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ route('approve.leave') }}">Approve
                                                Leave</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-money ftlayer"></i>Fees
                                        Collection<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ route('offlinepayment') }}">Offline
                                                Bank Payments</a></li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-map-o ftlayer"></i>Examinations<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ route('examtype') }}">Exam
                                                Type</a></li>
                                        <li><a href="{{ route('examgroup') }}">Exam
                                                Group</a></li>
                                        <li><a href="{{ route('marksgrade') }}">Marks
                                                Grade</a></li>
                                        <li><a href="{{ route('exam') }}">Exam</a>
                                        </li>
                                        <li><a href="{{ route('schedule') }}">Exam
                                                Schedule</a></li>
                                        <li><a href="{{ route('result') }}">Exam
                                                Result</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-usd ftlayer"></i>Income<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ route('income.head') }}">Income Head</a></li>
                                        <li><a href="{{ route('income') }}">Add Income</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-credit-card ftlayer"></i>Expenses<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ route('expenses.head') }}">Expenses Head</a></li>
                                        <li><a href="{{ route('expenses') }}">Add Expenses</a></li>
                                    </ul>
                                </li>
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
                                {{-- <li><a><i class="fa fa-sitemap ftlayer"></i>Human Resource<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ route('designation') }}">Designation</a></li>
                                        <li><a href="{{ route('expenses') }}">Add Expenses</a></li>
                                    </ul>
                                </li> --}}
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
                    Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
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
    @stack('scripts')
</body>

</html>
