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
                    <h3>Approve Leave</h3>
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
                <a href="{{ route('approve.leave') }}"><button type="button" class="btn btn-primary btn-sm mb-2">View
                        Leave</button></a>
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
                            <h2>{{ isset($leave) ? 'Edit a Record' : 'Create a new Record' }}</h2>
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                                method="POST"
                                action="{{ isset($leave) ? route('update.approveleave', ['id' => $leave->id]) : route('insert.approveleave') }}"
                                enctype="multipart/form-data" method="POST">

                                @csrf
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
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Student *</label>
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
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Apply Date *</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input class="date-picker form-control @error('apply_date') is-invalid @enderror"
                                            placeholder="dd-mm-yyyy" type="date" name="apply_date"
                                            value="{{ old('apply_date', isset($leave) ? $leave->apply_date : '') }}">
                                        @error('apply_date')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">
                                        From Date *</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input class="date-picker form-control @error('from_date') is-invalid @enderror"
                                            placeholder="dd-mm-yyyy" type="date" name="from_date"
                                            value="{{ old('from_date', isset($leave) ? $leave->from_date : '') }}">
                                        @error('from_date')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">
                                        To Date *</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input class="date-picker form-control @error('to_date') is-invalid @enderror"
                                            placeholder="dd-mm-yyyy" type="date" name="to_date"
                                            value="{{ old('to_date', isset($leave) ? $leave->to_date : '') }}">
                                        @error('to_date')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Reason *</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" class="form-control @error('reason') is-invalid @enderror"
                                            name="reason"
                                            value="{{ old('reason', isset($leave) ? $leave->reason : '') }}">
                                        @error('reason')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Leave Status *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="btn-group" data-toggle="buttons">
                                            <label
                                                class="btn btn-warning btn-sm mr-2 {{ old('status', isset($leave) ? $leave->status : '') == 'pending' ? 'active focus' : '' }}"
                                                data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                <input type="radio" name="status" value="pending" class="join-btn"
                                                    {{ old('status', isset($leave) ? $leave->status : '') == 'pending' ? 'checked' : '' }}>
                                                &nbsp; Pending &nbsp;
                                            </label>
                                            <label
                                                class="btn btn-success btn-sm mr-2 {{ old('status', isset($leave) ? $leave->status : '') == 'approve' ? 'active focus' : '' }}"
                                                data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                <input type="radio" name="status" value="approve" class="join-btn"
                                                    {{ old('status', isset($leave) ? $leave->status : '') == 'approve' ? 'checked' : '' }}>
                                                Approve
                                            </label>
                                            <label
                                                class="btn btn-danger btn-sm {{ old('status', isset($leave) ? $leave->status : '') == 'disapprove' ? 'active focus' : '' }}"
                                                data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                <input type="radio" name="status" value="disapprove" class="join-btn"
                                                    {{ old('status', isset($leave) ? $leave->status : '') == 'disapprove' ? 'checked' : '' }}>
                                                Disapprove
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
                                            @if (isset($leave))
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // Fetch classes when the page loads
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
                            '{{ old('class', isset($leave) ? $leave->class : '') }}');
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
                            '{{ old('section', isset($leave) ? $leave->section : '') }}');

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
                        url: '/get-students',
                        type: 'GET',
                        data: {
                            class: selectedClass,
                            section: selectedSection
                        },
                        success: function(data) {
                            // Populate student dropdown
                            populateDropdown($('#student'), data.students,
                                '{{ old('student', isset($leave) ? $leave->student : '') }}');
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
        });
    </script>
@endpush
