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
                    <h3>Postal Dispatch List</h3>
                </div>
                <div class="button-container">
                    <a href="{{ route('create.postal.dispatch') }}"><button type="button"
                            class="btn btn-primary btn-sm mt-1">Add Postal Dispatch</button></a>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row" style="display: block;">
                <div class="clearfix"></div>
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                        <div class="x_title text-center">
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
                                            <th>From Title</th>
                                            <th>Reference No</th>
                                            <th>To Title</th>
                                            <th>Date</th>
                                            <th><span class="nobr">Action</span></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($postal_dispatch as $index => $postal_dis)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $postal_dis->from_title }}</td>
                                                <td>{{ $postal_dis->reference_no }}</td>
                                                <td>{{ $postal_dis->to_title }}</td>
                                                <td class="">{{ date('d-m-Y', strtotime($postal_dis->date)) }}</td>
                                                <td>
                                                    <a href="{{ route('edit.postal.dispatch', $postal_dis->id) }}"
                                                        class="btn btn-info btn-sm">Edit</a>

                                                    <a href="{{ route('destroy.postal.dispatch', $postal_dis->id) }}"
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
