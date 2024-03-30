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
                    <h3>Item Supplier List</h3>
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
                                    <a href="{{ route('create.supplier') }}"><button type="button" class="btn btn-primary btn-sm mb-2">Add Item Supplier</button></a>
                                </div>
                                <table class="table table-striped jambo_table bulk_action" id="table">
                                    <thead>
                                        <tr class="">
                                            <th>No</th>
                                            <th class="">Item Supplier</th>
                                            <th class="">Contact Person</th>
                                            <th class="">Address</th>
                                            <th class="">Description</th>
                                            <th class=""><span class="nobr">Action</span></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($suppliers as $index => $supplier)
                                            <tr class="">
                                                <td>{{ $index + 1 }}</td>
                                                <td class="">
                                                        {{ $supplier->name }}<br>
                                                        <i class="fa fa-phone-square"></i> {{ $supplier->phone }}<br>
                                                        <i class="fa fa-envelope"></i> {{ $supplier->email }}
                                                </td>  
                                                <td class="">
                                                    <i class="fa fa-user"></i> {{ $supplier->contact_person_name }}<br>                
                                                    <i class="fa fa-phone-square"></i> {{ $supplier->contact_person_phone }}<br>                
                                                    <i class="fa fa-envelope"></i> {{ $supplier->contact_person_email }}
                                                </td>  
                                                <td class=""><i class="fa fa-building"></i> {{ $supplier->address }}</td>                          
                                                <td class=""><i class="fa fa-building"></i> {{ $supplier->description }}</td>                
                                                <td> 
                                                    <a href="{{ route('edit.supplier', $supplier->id) }}" class="btn btn-info btn-sm">Edit</a>
                                                    <a href="{{ route('destroy.supplier',$supplier->id) }}" class="btn btn-danger btn-sm">Delete</a>
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
