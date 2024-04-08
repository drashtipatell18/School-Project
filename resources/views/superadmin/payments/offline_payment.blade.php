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
                    <h3>{{ isset($payment) ? 'Edit Offline Bank Payments' : 'Add Offline Bank Payments' }}</h3>
                </div>
                <div class="button-container">
                    <a href="{{ route('offlinepayment') }}"><button type="button" class="btn btn-primary btn-sm mt-1">View
                            Payments</button></a>
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
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <h2>{{ isset($payment) ? 'Edit a Record' : 'Create a new Record' }}</h2>
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                                method="POST"
                                action="{{ isset($payment) ? '/admin/offlinepayment/update/' . $payment->id : '/admin/offlinepayment/insert' }}">
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
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">AdmissionNo *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select id="admissionno" name="admissionno"
                                            class="form-control @error('admissionno') is-invalid @enderror">
                                            <option value="">Select AdmissionNo</option>
                                        </select>
                                        @error('admissionno')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Date Of Payment *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="date-picker form-control @error('payment_date') is-invalid @enderror"
                                            type="datetime-local" name="payment_date"
                                            value="{{ old('payment_date', isset($payment) ? $payment->payment_date : '') }}">

                                        @error('payment_date')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Date Of Submission *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="date-picker form-control @error('submit_date') is-invalid @enderror"
                                            type="date" name="submit_date_date"
                                            value="{{ old('submit_date_date', isset($payment) ? \Carbon\Carbon::parse($payment->submit_date)->format('Y-m-d') : '') }}">
                                        <input class="date-picker form-control @error('submit_date') is-invalid @enderror"
                                            type="time" name="submit_date_time"
                                            value="{{ old('submit_date_time', isset($payment) ? \Carbon\Carbon::parse($payment->submit_date)->format('H:i') : '') }}">
                                        @error('submit_date')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Amount
                                        *</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="middle-name" class="form-control @error('amount') is-invalid @enderror"
                                            type="text" name="amount"
                                            value="{{ old('amount', isset($payment) ? $payment->amount : '') }}">
                                        @error('amount')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Reference *</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" class="form-control @error('reference') is-invalid @enderror"
                                            name="reference"
                                            value="{{ old('reference', isset($payment) ? $payment->reference : '') }}">
                                        @error('reference')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Comment *</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" class="form-control @error('comment') is-invalid @enderror"
                                            name="comment"
                                            value="{{ old('comment', isset($payment) ? $payment->comment : '') }}">
                                        @error('comment')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Payment Mode *</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text"
                                            class="form-control @error('payment_mode') is-invalid @enderror"
                                            name="payment_mode"
                                            value="{{ old('payment_mode', isset($payment) ? $payment->payment_mode : '') }}">
                                        @error('payment_mode')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Status *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="btn-group" data-toggle="buttons">
                                            <label
                                                class="btn btn-warning btn-sm mr-2 {{ old('status', isset($payment) ? $payment->status : '') == 'pending' ? 'active focus' : '' }}"
                                                data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                <input type="radio" name="status" value="pending" class="join-btn"
                                                    {{ old('status', isset($payment) ? $payment->status : '') == 'pending' ? 'checked' : '' }}>
                                                &nbsp; Pending &nbsp;
                                            </label>
                                            <label
                                                class="btn btn-success btn-sm mr-2 {{ old('status', isset($payment) ? $payment->status : '') == 'approved' ? 'active focus' : '' }}"
                                                data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                <input type="radio" name="status" value="approved" class="join-btn"
                                                    {{ old('status', isset($payment) ? $payment->status : '') == 'approved' ? 'checked' : '' }}>
                                                Approved
                                            </label>
                                            <label
                                                class="btn btn-danger btn-sm {{ old('status', isset($payment) ? $payment->status : '') == 'rejected' ? 'active focus' : '' }}"
                                                data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                <input type="radio" name="status" value="rejected" class="join-btn"
                                                    {{ old('status', isset($payment) ? $payment->status : '') == 'rejected' ? 'checked' : '' }}>
                                                Rejected
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
                                        {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                                        <button type="submit" class="btn btn-primary">
                                            @if (isset($payment))
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
                // Fetch and populate admission numbers based on the selected class and section
                fetchAdmissionNumbers($('#class').val(), $(this).val());
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
                            '{{ old('class', isset($payment) ? $payment->class : '') }}');
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
                            '{{ old('section', isset($payment) ? $payment->section : '') }}');

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
                                '{{ old('student', isset($payment) ? $payment->student : '') }}');
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

            // Function to fetch admission numbers based on the selected class and section
            function fetchAdmissionNumbers(selectedClass, selectedSection) {
                $.ajax({
                    url: '/get-admission-no',
                    type: 'GET',
                    data: {
                        class: selectedClass,
                        section: selectedSection
                    },
                    success: function(data) {
                        // Populate admission number dropdown
                        populateDropdown($('#admissionno'), data.admissionNumbers,
                            '{{ old('admissionno') }}');
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
