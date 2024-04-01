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
                    <h3>Result</h3>
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
                                <div class="button-container">
                                    <a href="{{ route('create.result') }}"><button type="button"
                                            class="btn btn-primary btn-sm mb-2">Add Result</button></a>
                                </div>
                                <table class="table table-striped jambo_table bulk_action" id="table">
                                    <thead>
                                        <tr class="">
                                            <th>No</th>
                                            <th class="">Exam Group</th>
                                            <th class="">Exam</th>
                                            <th class="">Class</th>
                                            <th class="">Section</th>
                                            <th class="">Student</th>
                                            <th class="">Subject</th>
                                            <th class="">Marks</th>
                                            <th class="">Grand_Total</th>
                                            <th class="">Percent</th>
                                            <th class="">Rank</th>
                                            <th class="">Resut</th>
                                            <th class=""><span class="nobr">Action</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($results as $index => $res)
                                            <tr class="">
                                                <td>{{ $index + 1 }}</td>
                                                <td class="">{{ $res->exam_group }}</td>
                                                <td class="">{{ $res->exam }}</td>
                                                <td class="">{{ $res->class }}</td>
                                                <td class="">{{ $res->section }}</td>
                                                <td class="">{{ $res->student }}</td>
                                                <td class="">{{ $res->subject }}</td>
                                                <td class="">{{ $res->marks }}</td>
                                                <td class="">{{ $res->grand_total }}</td>
                                                <td class="">{{ $res->percent }}</td>
                                                <td class="">{{ $res->rank }}</td>
                                                <td class="">{{ $res->result }}</td>
                                                <td>
                                                    <a href="{{ route('edit.result', $res->id) }}"
                                                        class="btn btn-info btn-sm">Edit</a>
                                                    <a href="{{ route('destroy', $res->id) }}"
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
