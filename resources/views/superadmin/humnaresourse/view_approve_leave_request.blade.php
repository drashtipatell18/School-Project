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
                    <h3>Add Details</h3>
                </div>
                <div class="title_right">
                    <div class="col-md-5 col-sm-5 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row" style="display: block;">
                <div class="clearfix"></div>
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Table</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                                <li class="dropdown">

                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">
                            <div class="table-responsive">
                                <div class="button-container">
                                    <a href="{{ route('create.approve.leave.request') }}"><button type="button"
                                            class="btn btn-primary btn-sm mb-2">Add Leave Request</button></a>
                                </div>
                                <table class="table table-striped jambo_table bulk_action" id="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Staff</th>
                                            <th>Leave Type</th>
                                            <th>Leave Date</th>
                                            <th>Days</th>
                                            <th>Apply Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($approve_leave_request as $index => $approve_leave_req)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $approve_leave_req->name }}</td>
                                                <td>{{ $approve_leave_req->leave_type }}</td>
                                                <td>
                                                    {{ date('d-m-Y', strtotime($approve_leave_req->leave_from_date)) }} -
                                                    {{ date('d-m-Y', strtotime($approve_leave_req->leave_to_date)) }}
                                                </td>
                                                <td>
                                                    {{ (strtotime($approve_leave_req->leave_to_date) - strtotime($approve_leave_req->leave_from_date)) / (60 * 60 * 24) }}
                                                </td>
                                                <td>{{ date('d-m-Y', strtotime($approve_leave_req->apply_date)) }}</td>

                                                <td>
                                                    @if ($approve_leave_req->status == 'pending')
                                                        <button type="button"
                                                            class="btn btn-warning btn-sm">Pending</button>
                                                    @elseif($approve_leave_req->status == 'approved')
                                                        <button type="button"
                                                            class="btn btn-success btn-sm">Approved</button>
                                                    @elseif($approve_leave_req->status == 'disapproved')
                                                        <button type="button"
                                                            class="btn btn-danger btn-sm">Disapprove</button>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('edit.approve.leave.request', $approve_leave_req->id) }}"
                                                        class="btn btn-info btn-sm">Edit</a>
                                                    <a href="{{ route('destroy.approve.leave.request', $approve_leave_req->id) }}"
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
