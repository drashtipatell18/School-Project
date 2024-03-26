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
                    <h3>Reference List</h3>
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
                            <div class="mb-2">
                                <a href="{{ route('purpose') }}"><button type="button"
                                        class="btn btn-success btn-sm">Purpose</button></a>
                                <a href="{{ route('complaint.type') }}"><button type="button"
                                        class="btn btn-dark btn-sm">Complaint Type</button></a>
                                <a href="{{ route('source') }}"><button type="button"
                                        class="btn btn-warning btn-sm">Source</button></a>
                                <a href="{{ route('reference') }}"><button type="button"
                                        class="btn btn-info btn-sm">Reference</button></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">
                            <div class="table-responsive">
                                <div class="button-container">
                                    <a href="{{ route('create.reference') }}"><button type="button"
                                            class="btn btn-primary btn-sm mb-2">Add Reference</button></a>
                                </div>
                                <table class="table table-striped jambo_table bulk_action" id="table">
                                    <thead>
                                        <tr class="">
                                            <th>No</th>
                                            <th>Reference</th>
                                            <th>Description</th>
                                            <th><span class="nobr">Action</span></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($reference as $index => $refe)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $refe->reference }}</td>
                                                <td>{{ $refe->description }}</td>
                                                <td>
                                                    <a href="{{ route('edit.reference', $refe->id) }}"
                                                        class="btn btn-info btn-sm">Edit</a>

                                                    <a href="{{ route('destroy.reference', $refe->id) }}"
                                                        class="btn btn-danger btn-sm">Delete</a>
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
