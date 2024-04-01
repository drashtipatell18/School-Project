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
                    <h3>Admission Enquiry List</h3>
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
                                    <a href="{{ route('create.admission.enquiry') }}"><button type="button"
                                            class="btn btn-primary btn-sm mb-2">Admission Enquiry</button></a>
                                </div>
                                <table class="table table-striped jambo_table bulk_action" id="table">
                                    <thead>
                                        <tr class="">
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Source</th>
                                            <th>Enquiry Date</th>
                                            <th>Next Follow Up Date</th>

                                            <th><span class="nobr">Action</span></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($admission_enquiry as $index => $phone_call)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $phone_call->name }}</td>
                                                <td>{{ $phone_call->phone }}</td>
                                                <td>{{ $phone_call->source }}</td>

                                                <td class="">{{ date('d-m-Y', strtotime($phone_call->date)) }}</td>
                                                <td class="">
                                                    {{ date('d-m-Y', strtotime($phone_call->next_follow_up_date)) }}</td>
                                                <td>
                                                    <a href="{{ route('edit.admission.enquiry', $phone_call->id) }}"
                                                        class="btn btn-info btn-sm">Edit</a>

                                                    <a href="{{ route('destroy.admission.enquiry', $phone_call->id) }}"
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
