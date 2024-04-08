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
                    <h3>{{ isset($approve_leave_request) ? 'Edit Details' : 'Add Details' }}</h3>
                </div>
                <div class="button-container">
                    <a href="{{ route('approve.leave.request') }}"><button type="button" class="btn btn-primary btn-sm mt-1">
                            Approve Leave Request</button></a>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Form</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown"></li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                                method="POST"
                                action="{{ isset($approve_leave_request) ? '/admin/approve/leave/request/update/' . $approve_leave_request->id : '/admin/approve/leave/request/insert' }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Role *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select class="form-control @error('role') is-invalid @enderror" name="role"
                                            id="role">
                                            <option value="">Select a Role</option>
                                        </select>
                                        @error('role')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Name *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select class="form-control @error('name') is-invalid @enderror" name="name"
                                            id="name">
                                            <option value="">Select a Name</option>
                                        </select>
                                        @error('name')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Apply Date *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="date" class="form-control @error('apply_date') is-invalid @enderror"
                                            name="apply_date"
                                            value="{{ old('apply_date', $approve_leave_request->apply_date ?? '') }}">
                                        @error('apply_date')
                                            <span style="color: red"
                                                class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Leave Type *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select name="leave_type"
                                            class="form-control @error('leave_type') is-invalid @enderror">
                                            <option value="">Select Leave Type</option>
                                            @foreach ($leave_types as $leave_type_id => $leave_ty)
                                                <option value="{{ $leave_ty }}"
                                                    {{ (isset($approve_leave_request) && $approve_leave_request->leave_type == $leave_ty) || old('leave_type') == $leave_ty ? 'selected' : '' }}>
                                                    {{ $leave_ty }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('leave_type')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Leave From Date *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="date"
                                            class="form-control @error('leave_from_date') is-invalid @enderror"
                                            name="leave_from_date"
                                            value="{{ old('leave_from_date', $approve_leave_request->leave_from_date ?? '') }}">
                                        @error('leave_from_date')
                                            <span style="color: red"
                                                class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Leave To Date *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="date"
                                            class="form-control @error('leave_to_date') is-invalid @enderror"
                                            name="leave_to_date"
                                            value="{{ old('leave_to_date', $approve_leave_request->leave_to_date ?? '') }}">
                                        @error('leave_to_date')
                                            <span style="color: red"
                                                class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Reason *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea class="form-control" name="reason" rows="4">{{ old('reason', isset($approve_leave_request) ? $approve_leave_request->reason : '') }}</textarea>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Note *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea class="form-control" name="note" rows="4">{{ old('note', isset($approve_leave_request) ? $approve_leave_request->note : '') }}</textarea>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Attach Document*</label>
                                    <div class="col-md-6 col-sm-6">
                                        @if (isset($approve_leave_request) && $approve_leave_request->attach_document)
                                            <img src="{{ asset('storage/attach_documents/' . $approve_leave_request->attach_document) }}"
                                                alt="Uploaded Document" width="100">
                                            <input type="file" class="form-control" name="attach_document">
                                            <p class="mt-1">{{ $approve_leave_request->attach_document }}</p>
                                        @else
                                            <input type="file" class="form-control" name="attach_document">
                                            <span class="invalid-feedback" style="color: red">Please select a file</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Status *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="btn-group" data-toggle="buttons">
                                            <label
                                                class="btn btn-warning btn-sm mr-2 {{ old('status', isset($approve_leave_request) ? $approve_leave_request->status : '') == 'pending' ? 'active focus' : '' }}"
                                                data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                <input type="radio" name="status" value="pending" class="join-btn"
                                                    {{ old('status', isset($approve_leave_request) ? $approve_leave_request->status : '') == 'pending' ? 'checked' : '' }}>
                                                &nbsp; Pending &nbsp;
                                            </label>
                                            <label
                                                class="btn btn-success btn-sm mr-2 {{ old('status', isset($approve_leave_request) ? $approve_leave_request->status : '') == 'approved' ? 'active focus' : '' }}"
                                                data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                <input type="radio" name="status" value="approved" class="join-btn"
                                                    {{ old('status', isset($approve_leave_request) ? $approve_leave_request->status : '') == 'approved' ? 'checked' : '' }}>
                                                Approved
                                            </label>
                                            <label
                                                class="btn btn-danger btn-sm {{ old('status', isset($approve_leave_request) ? $approve_leave_request->status : '') == 'disapproved' ? 'active focus' : '' }}"
                                                data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                <input type="radio" name="status" value="disapproved"
                                                    class="join-btn"
                                                    {{ old('status', isset($approve_leave_request) ? $approve_leave_request->status : '') == 'disapproved' ? 'checked' : '' }}>
                                                Disapproved
                                            </label>
                                        </div>

                                        @error('status')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <button type="submit" class="btn btn-primary">
                                            @if (isset($approve_leave_request))
                                                Update
                                            @else
                                                Submit
                                            @endif
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            // Fetch roles when the page loads
            fetchRoles();

            // Event listener for role selection change
            $('#role').on('change', function() {
                // Fetch and populate names based on the selected role
                fetchNames($(this).val());
            });

            // Function to fetch roles
            function fetchRoles() {
                $.ajax({
                    url: '/get-usertype',
                    type: 'GET',
                    success: function(data) {
                        // Populate role dropdown and trigger change event
                        populateDropdown($('#role'), data.roles,
                            '{{ old('role', isset($approve_leave_request) ? $approve_leave_request->role : '') }}'
                        );
                        $('#role').change(); // Trigger change event
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }

            // Function to fetch names based on the selected role
            function fetchNames(selectedRole) {
                $.ajax({
                    url: '/get-allname',
                    type: 'GET',
                    data: {
                        role: selectedRole // Pass selectedRole as 'role' parameter
                    },
                    success: function(data) {
                        // Populate name dropdown
                        populateDropdown($('#name'), data.names,
                            '{{ old('name', isset($approve_leave_request) ? $approve_leave_request->name : '') }}'
                        );
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }

            // Function to populate a dropdown with options
            function populateDropdown(dropdown, options, selectedValue) {
                dropdown.empty();
                dropdown.append('<option value="">Select...</option>');

                $.each(options, function(key, value) {
                    let selected = value == selectedValue ? 'selected="selected"' : '';
                    dropdown.append('<option value="' + value + '" ' + selected + '>' + value +
                        '</option>');
                });
            }
        });
    </script>
@endpush
