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
                    <h3>Member List</h3>
                </div>
                @if (auth()->check())
                    @php
                        $userRole = strtolower(auth()->user()->role);
                    @endphp
                @endif
                @if ($userRole != 'student' || $userRole != 'parents')
                    <div class="button-container">
                        <a href="{{ route('create.member') }}"><button type="button" class="btn btn-primary btn-sm mt-1">Add
                                Member</button></a>
                    </div>
                @endif
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
                                            <th class="">Member ID</th>
                                            <th class="">Library Card No..</th>
                                            <th class="">Addmission No</th>
                                            <th class="">Member Type</th>
                                            <th class="">Name</th>
                                            <th class="">Phone</th>
                                            <th class=""><span class="nobr">Action</span></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($members as $index => $member)
                                            <tr class="">
                                                <td class="">{{ $member->userid }}</td>
                                                <td>{{ $index + 1 }}</td>
                                                <td class="">{{ $member->addmissionno }}</td>
                                                <td class="">{{ $member->role }}</td>
                                                <td class="">{{ $member->name }}</td>
                                                <td class="">{{ $member->phone }}</td>
                                                <td>
                                                    <a href="{{ route('view.member', $member->id) }}"
                                                        class="btn btn-info btn-sm"><i class="fa fa-sign-out"></i></a>
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
