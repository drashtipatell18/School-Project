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
                    <h3>Visitor List</h3>
                </div>
                <div class="title_right">
                    <div class="col-md-5 col-sm-5   form-group pull-right top_search">
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
                        <div class="x_title text-center">
                            <h2>Table</h2>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">
                            <div class="table-responsive">
                                <div class="button-container">
                                    <a href="{{ route('create.visitor.book') }}"><button type="button"
                                            class="btn btn-primary btn-sm mb-2">Add Visitor</button></a>
                                </div>
                                <table class="table table-striped jambo_table bulk_action" id="table">
                                    <thead>
                                        <tr class="">
                                            <th>No</th>
                                            <th>Purpose</th>
                                            <th>Meeting With</th>
                                            <th>Visitor Name</th>
                                            <th>Phone</th>
                                            <th>ID Card </th>
                                            <th>NUmber Of Person</th>
                                            <th>Date</th>
                                            <th>In Time</th>
                                            <th>Out Time</th>
                                            <th><span class="nobr">Action</span></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($visitor_book as $index => $visitor_bo)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $visitor_bo->purpose }}</td>
                                                <td>{{ $visitor_bo->meeting_with }}</td>
                                                <td>{{ $visitor_bo->visitor_name }}</td>
                                                <td>{{ $visitor_bo->phone }}</td>
                                                <td>{{ $visitor_bo->id_card }}</td>
                                                <td>{{ $visitor_bo->number_of_person }}</td>
                                                <td class="">{{ date('d-m-Y', strtotime($visitor_bo->date)) }}</td>
                                                <td class="">{{ date('d-m-Y', strtotime($visitor_bo->in_time)) }}</td>
                                                <td class="">{{ date('d-m-Y', strtotime($visitor_bo->out_time)) }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('edit.visitor.book', $visitor_bo->id) }}"
                                                        class="btn btn-info btn-sm">Edit</a>
                                                    <a href="{{ route('destroy.visitor.book', $visitor_bo->id) }}"
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
