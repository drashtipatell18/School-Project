@extends('admin.main')
@section('content')
    <style>
        .button-container {
            display: flex;
            justify-content: flex-end;
        }
    </style>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Homework</h3>
                </div>
                @if (auth()->check())
                    @php
                        $userRole = strtolower(auth()->user()->role);
                    @endphp
                @endif
                @if ($userRole != 'student' && $userRole != 'parents')
                    <div class="button-container">
                        <a href="{{ route('create.student') }}"><button type="button" class="btn btn-primary btn-sm mt-1">Add
                                Student Admission</button></a>
                    </div>
                @endif

            </div>
            <div class="clearfix"></div>
            <div class="row" style="display: block;">
                <div class="clearfix"></div>
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Table</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">
                            <div class="table-responsive">
                                <table class="table table-striped jambo_table bulk_action" id="table">
                                    <thead>
                                        <tr class="">
                                            <th>No</th>
                                            <th>Admission No</th>
                                            <th>Student Name</th>
                                            <th>Roll No.</th>
                                            <th>Class</th>
                                            <th>Father Name</th>
                                            <th>Date of Birth</th>
                                            <th>Gender</th>
                                            <th>Category</th>
                                            <th>Mobile Number</th>
                                            <th>Student Picture</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($students as $index => $student)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $student->admissionno }}</td>
                                                <td>{{ $student->first_name . ' ' . $student->last_name }}</td>
                                                <td>{{ $student->rollnumber }}</td>
                                                <td>{{ $student->class }}</td>
                                                <td>{{ $student->father_name }}</td>
                                                <td>{{ $dateFormatted = date('d-m-Y', strtotime($student->date_of_birth)) }}
                                                </td>
                                                <td>{{ $student->gender }}</td>
                                                <td>{{ $student->category }}</td>
                                                <td>{{ $student->phone }}</td>
                                                <td>
                                                    @if ($student->student_photo)
                                                        <img src="{{ asset('student_photo/' . $student->student_photo) }}"
                                                            alt="Student Photo" width="100">
                                                    @else
                                                        No Photo Available
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($userRole == 'student')
                                                        <a href="{{ route('profilepic', $student->id) }}"
                                                            class="btn btn-info btn-sm"><i class="fa fa-sign-out"></i></a>
                                                    @elseif ($userRole == 'parents')
                                                         <a href="{{ route('parents', $student->id) }}"
                                                        class="btn btn-info btn-sm"><i class="fa fa-sign-out"></i></a>
                                                    @else
                                                        <a href="{{ route('edit.student', $student->id) }}"
                                                            class="btn btn-info btn-sm">Edit</a>
                                                        <a href="{{ route('destroy', $student->id) }}"
                                                            class="btn btn-danger btn-sm"onclick="return confirm('Are you sure you want to delete this ?');">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
@endpush
