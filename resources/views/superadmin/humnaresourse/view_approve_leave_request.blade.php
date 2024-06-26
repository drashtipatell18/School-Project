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
