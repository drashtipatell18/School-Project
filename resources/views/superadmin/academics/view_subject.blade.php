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
                    <h3>Subject List</h3>
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
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Table</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Settings 1</a>
                                        <a class="dropdown-item" href="#">Settings 2</a>
                                    </div>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">
                            <div class="table-responsive">
                                <div class="button-container">
                                    <a href="{{ route('create.subject') }}"><button type="button" class="btn btn-primary btn-sm mb-2">Add Subject</button></a>
                                </div>
                                <table class="table table-striped jambo_table bulk_action" id="table">
                                    <thead>
                                          <tr class="">
                                            <th>No</th>
                                            <th>Subject Code</th>
                                            <th class="">Subject List</th>
                                            <th class="">Subject Type</th>
                                            <th class=""><span class="nobr">Action</span></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($subjects as $index => $subject)
                                        <tr class="">
                                          <td>{{ $index + 1 }}</td>
                                            <td class="">{{ $subject->code }}</td>                
                                            <td class="">{{ $subject->name }}</td>                
                                            <td class="">{{ $subject->subject_type }}</td>                       
                                                <td> 
                                                    <a href="{{ route('edit.subject', $subject->id) }}" class="btn btn-info btn-sm">Edit</a>

                                                    <a href="{{ route('destroy.subject',$subject->id) }}" class="btn btn-danger btn-sm">Delete</a>
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
    $(document).ready(function () {
        $('#table').DataTable();
    });
    </script>
@endpush
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
                    <h3>Teacher List</h3>
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
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Table</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Settings 1</a>
                                        <a class="dropdown-item" href="#">Settings 2</a>
                                    </div>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">
                            <div class="table-responsive">
                                <div class="button-container">
                                    <a href="{{ route('create.subject') }}"><button type="button" class="btn btn-primary btn-sm mb-2">Add Subject</button></a>
                                </div>
                                <table class="table table-striped jambo_table bulk_action" id="table">
                                    <thead>
                                          <tr class="">
                                            <th>No</th>
                                            <th>Subject Code</th>
                                            <th class="">Subject List</th>
                                            <th class="">Subject Type</th>
                                            <th class=""><span class="nobr">Action</span></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($subjects as $index => $subject)
                                        <tr class="">
                                          <td>{{ $index + 1 }}</td>
                                            <td class="">{{ $subject->code }}</td>                
                                            <td class="">{{ $subject->name }}</td>                
                                            <td class="">{{ $subject->subject_type }}</td>                
                                                <td> 
                                                    <a href="{{ route('edit.subject', $subject->id) }}" class="btn btn-info btn-sm">Edit</a>

                                                    <a href="{{ route('destroy.subject',$subject->id) }}" class="btn btn-danger btn-sm">Delete</a>
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
    $(document).ready(function () {
        $('#table').DataTable();
    });
    </script>
@endpush
