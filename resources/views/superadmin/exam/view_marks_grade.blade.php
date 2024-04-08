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
                    <h3>Marks Grade</h3>
                </div>
                <div class="button-container">
                    <a href="{{ route('create.marksgrade') }}"><button type="button" class="btn btn-primary btn-sm mt-1">Add
                            Marks Grade</button></a>
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
                                            <th>Exam Type</th>
                                            <th>Grade Name</th>
                                            <th>Percent From / Upto</th>
                                            <th>Grade Point</th>
                                            <th>Description</th>
                                            <th><span class="nobr">Action</span></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($marks_grades as $index => $marks_gra)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $marks_gra->exam_type }}</td>
                                                <td>{{ $marks_gra->grade_name }}</td>
                                                <td>{{ $marks_gra->percent_upto }} To {{ $marks_gra->percent_from }}</td>
                                                <td>{{ $marks_gra->grade_point }}</td>
                                                <td>{{ implode(' ', array_slice(str_word_count($marks_gra->description, 1), 0, 15)) }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('edit.marksgrade', $marks_gra->id) }}"
                                                        class="btn btn-info btn-sm">Edit</a>

                                                    <a href="{{ route('destroy', $marks_gra->id) }}"
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
