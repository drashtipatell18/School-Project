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
                        <a href="{{ route('create.homework') }}"><button type="button" class="btn btn-primary btn-sm mt-1">Add
                                Homework</button></a>
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
                                            <th>Class</th>
                                            <th>Section</th>
                                            <th>Subject</th>
                                            <th>Homework Date</th>
                                            <th>Submission Date</th>
                                            <th>Note</th>
                                            <th>Status</th>
                                            @if ($userRole != 'student' && $userRole != 'parents')
                                                <th class=" no-link last"><span class="nobr">Action</span></th>
                                            @endif
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($homework as $index => $home)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $home->class }}</td>
                                                <td>{{ $home->section }}</td>
                                                <td>{{ $home->subject }}</td>
                                                <td>{{ $dateFormatted = date('d-m-Y', strtotime($home->homework_date)) }}
                                                </td>
                                                <td>{{ $dateFormatted = date('d-m-Y', strtotime($home->submission_date)) }}
                                                </td>
                                                <td>{{ $home->note }}</td>
                                                <td>
                                                    @if ($home->status == 'pending')
                                                        <button type="button"
                                                            class="btn btn-warning btn-sm">Pending</button>
                                                    @elseif($home->status == 'submitted')
                                                        <button type="button"
                                                            class="btn btn-success btn-sm">Submitted</button>
                                                    @elseif($home->status == 'late_submission')
                                                        <button type="button" class="btn btn-danger btn-sm">Late
                                                            Submission</button>
                                                    @endif
                                                </td>
                                                @if ($userRole != 'student' && $userRole != 'parents')
                                                    <td>
                                                        <a href="{{ route('edit.homework', $home->id) }}"
                                                            class="btn btn-info btn-sm">Edit</a>

                                                        <a href="{{ route('destroy.homework', $home->id) }}"
                                                            class="btn btn-danger btn-sm"onclick="return confirm('Are you sure you want to delete this ?');">Delete</a>
                                                    </td>
                                                @endif
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
