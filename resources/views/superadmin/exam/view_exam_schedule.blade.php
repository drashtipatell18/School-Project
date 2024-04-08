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
                    <h3>Schedule</h3>
                </div>
                <div class="button-container">
                    <a href="{{ route('create.schedule') }}"><button type="button" class="btn btn-primary btn-sm mt-1">Add
                            Schedule</button></a>
                </div>
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
                                            <th class="">Exam Group</th>
                                            <th class="">Exam</th>
                                            <th class="">Subject</th>
                                            <th class="">Date From</th>
                                            <th class="">Start Time</th>
                                            <th class="">Duration</th>
                                            <th class="">Room No</th>
                                            <th class="">Max Maeks</th>
                                            <th class="">Min Marks</th>
                                            <th class=""><span class="nobr">Action</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($schedules as $index => $sche)
                                            <tr class="">
                                                <td>{{ $index + 1 }}</td>
                                                <td class="">{{ $sche->exam_group }}</td>
                                                <td class="">{{ $sche->exam }}</td>
                                                <td class="">{{ $sche->subject }}</td>
                                                <td>{{ $dateFormatted = date('d-m-Y', strtotime($sche->date_from)) }}</td>
                                                <td class="">{{ $sche->start_time }}</td>
                                                <td class="">{{ $sche->duration }}</td>
                                                <td class="">{{ $sche->room_no }}</td>
                                                <td class="">{{ $sche->max_marks }}</td>
                                                <td class="">{{ $sche->min_marks }}</td>
                                                <td>
                                                    <a href="{{ route('edit.schedule', $sche->id) }}"
                                                        class="btn btn-info btn-sm">Edit</a>
                                                    <a href="{{ route('destroy', $sche->id) }}"
                                                        class="btn btn-danger btn-sm"onclick="return confirm('Are you sure you want to delete this ?');">Delete</a>
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
