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
                    <h3>{{ isset($members) ? 'Edit Member' : 'Add Member' }}</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5  form-group pull-right top_search">
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
            <div class="button-container">
                <a href="{{ route('members') }}"><button type="button" class="btn btn-primary btn-sm mb-2">View
                        Members </button></a>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Form</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <h2>{{ isset($members) ? 'Edit a Record' : 'Create a new Record' }}</h2>
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                                method="POST"
                                action="{{ isset($members) ? '/admin/member/update/' . $members->id : '/admin/member/insert' }}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Member Type*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select class="form-control @error('userid') is-invalid @enderror" name="userid"
                                            id="userid">
                                            <option value="">Select a UserType</option>
                                            {{-- @foreach ($roles as $role)
                                            <option value="{{ $role }}" {{ old('usertype', isset($issueitems) ? $issueitems->usertype : '') == $role ? 'selected' : '' }}>
                                                {{ $role }}
                                            </option>
                                        @endforeach --}}
                                        </select>
                                        @error('userid')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"> Addmission No*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select class="form-control @error('addmissionno') is-invalid @enderror"
                                            name="addmissionno" id="addmissionno">
                                            <option value="">Select Addmission No</option>
                                            @foreach ($admissionno as $no)
                                                <option value="{{ $no }}"
                                                    {{ old('addmissionno', isset($members) ? $members->addmissionno : '') == $no ? 'selected' : '' }}>
                                                    {{ $no }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('addmissionno')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Member ID*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select class="form-control @error('role') is-invalid @enderror" name="role"
                                            id="role">
                                            <option value="">Select a MemberID</option>
                                        </select>
                                        @error('role')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"> Name*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" name="name" value="<?php echo isset($members->name) ? $members->name : ''; ?>"
                                            class="form-control @error('name') is-invalid @enderror">
                                        @error('name')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"> Phone No*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" name="phone" value="<?php echo isset($members->phone) ? $members->phone : ''; ?>"
                                            class="form-control @error('phone') is-invalid @enderror">
                                        @error('phone')
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
                                            @if (isset($books))
                                                Update
                                            @else
                                                Submit
                                            @endif
                                        </button>
                                        {{-- <button class="btn btn-info" type="reset">Reset</button> --}}
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
            fetchUsertype();

            $('#userid').change(function() {
                var selectedUserType = $(this).val();
                $.ajax({
                    type: 'GET',
                    url: '/get-byname', 
                    data: {
                        class: selectedUserType
                    },
                    success: function(response) {
                        $('#role').empty(); 
                        $('#role').append($('<option>', {
                            value: '',
                            text: 'Select a MemberID'
                        }));
                        $.each(response.users, function(key, value) {
                            $('#role').append($('<option>', {
                                value: value.id,
                                text: value.name
                            }));
                        });
                    },
                    error: function(xhr, status, error) {
                        $('#error-message').text('Error: ' + xhr.responseText);
                    }
                });
            });


            // Function to fetchUsertype
            function fetchUsertype() {
                $.ajax({
                    url: '/get-usertype',
                    type: 'GET',
                    success: function(data) {
                        // Populate class dropdown and trigger change event
                        populateDropdown($('#userid'), data.roles,
                            '{{ old('userid', isset($members) ? $members->userid : '') }}');
                        $('#userid').change(); // Trigger change event
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
