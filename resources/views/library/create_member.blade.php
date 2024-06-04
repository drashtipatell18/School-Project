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
                <div class="button-container">
                    <a href="{{ route('members') }}"><button type="button" class="btn btn-primary btn-sm mt-1">View
                            Members </button></a>
                </div>
            </div>
            <div class="clearfix"></div>
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

                                        </select>
                                        @error('userid')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div id="admissionNoDiv">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Class *</label>
                                        <div class="col-md-6 col-sm-6">
                                            <select class="form-control @error('class') is-invalid @enderror" name="class"
                                                id="class">
                                                <option value="">Select a class</option>
                                            </select>
                                            @error('class')
                                                <span class="invalid-feedback" style="color: red">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Section *</label>
                                        <div class="col-md-6 col-sm-6">
                                            <select id="section" name="section"
                                                class="form-control @error('section') is-invalid @enderror">
                                                <option value="">Select Section</option>
                                            </select>
                                            @error('section')
                                                <span class="invalid-feedback" style="color: red">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Student Roll No*</label>
                                        <div class="col-md-6 col-sm-6">
                                            <select id="student" name="student"
                                                class="form-control @error('student') is-invalid @enderror">
                                                <option value="">Select Student</option>
                                            </select>
                                            @error('student')
                                                <span class="invalid-feedback" style="color: red">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="item form-group" id="memberIdDiv"> <label
                                        class="col-form-label col-md-3 col-sm-3 label-align">Member ID*</label>
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
            fetchClasses();
            // Event listener for class selection change
            $('#class').on('change', function() {
                // Fetch and populate sections based on the selected class
                fetchSections($(this).val());
            });

            // Event listener for section selection change
            $('#section').on('change', function() {
                // Fetch and populate students based on the selected class and section
                fetchStudents($('#class').val(), $(this).val());
            });

            // Initialize Select2 for the student dropdown
            $('#student').select2({
                placeholder: 'Select Student',
                allowClear: true, // Option to clear the selected value
                width: '100%', // Adjust the width as needed
            });
            // Function to fetch classes
            function fetchClasses() {
                $.ajax({
                    url: '/get-classes',
                    type: 'GET',
                    success: function(data) {
                        // Populate class dropdown and trigger change event
                        populateDropdown($('#class'), data.classes,
                            '{{ old('class', isset($members) ? $members->class : '') }}');
                        $('#class').change(); // Trigger change event
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }

            // Function to fetch sections based on the selected class
            function fetchSections(selectedClass) {
                $.ajax({
                    url: '/get-sections',
                    type: 'GET',
                    data: {
                        class: selectedClass
                    },
                    success: function(data) {
                        // Populate section dropdown
                        populateDropdown($('#section'), data.sections,
                            '{{ old('section', isset($members) ? $members->section : '') }}');

                        // Trigger change event for section dropdown
                        $('#section').change();
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }

            // Function to fetch students based on the selected class and section
            function fetchStudents(selectedClass, selectedSection) {
                // Check if both class and section are selected
                if (selectedClass && selectedSection) {
                    $.ajax({
                        url: '/get-roll-students',
                        type: 'GET',
                        data: {
                            class: selectedClass,
                            section: selectedSection
                        },
                        success: function(data) {
                            // Populate student dropdown
                            populateDropdown($('#student'), data.students,
                                '{{ old('student', isset($members) ? $members->student : '') }}');
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                } else {
                    // If either class or section is not selected, empty the student dropdown
                    populateDropdown($('#student'), [], '');
                }
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

            $('#userid').change(function() {
                var selectedUserType = $(this).val();
                if (selectedUserType === "student") {
                    $('#admissionNoDiv').show();
                    $('#memberIdDiv').hide();
                } else {
                    $('#admissionNoDiv').hide();
                    $('#memberIdDiv').show();
                }
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
