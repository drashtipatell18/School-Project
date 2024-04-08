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
                    <h3>Offline Bank Payments</h3>
                </div>
                <div class="button-container">
                    <a href="{{ route('create.offlinepayment') }}"><button type="button"
                            class="btn btn-primary btn-sm mt-1">Add Payment</button></a>
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
                                            <th>Admission No</th>
                                            <th>Class</th>
                                            <th>Name</th>
                                            <th>Pyament Date</th>
                                            <th>Submit Date</th>
                                            <th>Amount</th>
                                            <th>Reference</th>
                                            <th>Comment</th>
                                            <th>Payment Mode</th>
                                            <th>Status</th>
                                            <th>Status Date</th>
                                            <th>Payment ID</th>
                                            <th class=" no-link last"><span class="nobr">Action</span></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($payment as $index => $pay)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $pay->admissionno }}</td>
                                                <td>{{ $pay->class }} ({{ $pay->section }})</td>
                                                <td>{{ $pay->student }}</td>
                                                <td>{{ $dateFormatted = date('d-m-Y', strtotime($pay->payment_date)) }}</td>
                                                <td>{{ $dateFormatted = date('d-m-Y h:i A', strtotime($pay->submit_date)) }}
                                                </td>
                                                <td>{{ $pay->amount }}</td>
                                                <td>{{ $pay->reference }}</td>
                                                <td>{{ $pay->comment }}</td>
                                                <td>{{ $pay->payment_mode }}</td>
                                                <td>
                                                    @if ($pay->status == 'pending')
                                                        <button type="button"
                                                            class="btn btn-warning btn-sm">Pending</button>
                                                    @elseif($pay->status == 'approved')
                                                        <button type="button"
                                                            class="btn btn-success btn-sm">Approved</button>
                                                    @elseif($pay->status == 'rejected')
                                                        <button type="button"
                                                            class="btn btn-danger btn-sm">Rejected</button>
                                                    @endif
                                                </td>
                                                <td>{{ $dateFormatted = date('d-m-Y h:i A', strtotime($pay->created_at)) }}
                                                <td>{{ $pay->id }}</td>
                                                <td>
                                                    <a href="{{ route('edit.offlinepayment', $pay->id) }}"
                                                        class="btn btn-info btn-sm">Edit</a>

                                                    <a href="{{ route('destroy', $pay->id) }}"
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
