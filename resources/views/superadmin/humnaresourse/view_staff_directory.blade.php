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
                    <h3>Staff Directory List</h3>
                </div>
                <div class="button-container">
                    <a href="{{ route('create.staff.directory') }}"><button type="button"
                            class="btn btn-primary btn-sm mt-1">Add Staff Direcory</button></a>
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
                                            <th>Staff Id</th>
                                            <th>Name</th>
                                            <th>Role</th>
                                            <th>Department</th>
                                            <th>Designation</th>
                                            <th>Mobile NUmber</th>
                                            <th>PAN Number</th>
                                            <th>Photo</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($staff_directory as $index => $staff_dire)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $staff_dire->staff_id }}</td>
                                                <td>{{ $staff_dire->first_name }}</td>
                                                <td>{{ $staff_dire->role }}</td>
                                                <td>{{ $staff_dire->department }}</td>
                                                <td>{{ $staff_dire->designation }}</td>
                                                <td>{{ $staff_dire->phone }}</td>
                                                <td>{{ $staff_dire->pan_number }}</td>
                                                <td>
                                                    @if ($staff_dire->photo)
                                                        <img src="{{ asset('photos/' . $staff_dire->photo) }}"
                                                            alt="User Image" width="100" height="50px">
                                                    @else
                                                        No Photo Available
                                                    @endif
                                                </td>


                                                <td>
                                                    <a href="{{ route('edit.staff.directory', $staff_dire->id) }}"
                                                        class="btn btn-info btn-sm">Edit</a>
                                                    <a href="{{ route('destroy.staff.directory', $staff_dire->id) }}"
                                                        class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure you want to delete this ?');">Delete</a>
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
