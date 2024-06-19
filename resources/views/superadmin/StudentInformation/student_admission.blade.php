@extends('admin.main')
@section('content')
    <style>
        label.error {
            color: red;
        }
    </style>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>{{ isset($student) ? 'Edit Student Admission' : 'Add Student Admission' }}</h3>
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
                            <form id="studentForm" data-parsley-validate class="form-horizontal form-label-left"
                                action="{{ isset($student) ? route('update.student', $student->id) : route('insert.student') }}"
                                enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3 col-sm-3">
                                        <label>Admission No *</label>
                                        <input type="text" class="form-control" name="admissionno"
                                            value="{{ old('admissionno', isset($student) ? $student->admissionno : '') }}">
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <label>Roll Number *</label>
                                        <input type="text" class="form-control" name="rollnumber"
                                            value="{{ old('rollnumber', isset($student) ? $student->rollnumber : '') }}">
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <label>Class *</label>
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
                                    <div class="col-md-3 col-sm-3">
                                        <label>Section *</label>
                                        <select id="section" name="section" class="form-control">
                                            <option value="">Select a section</option>

                                        </select>
                                    </div>

                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-3 col-sm-3 form-group has-feedback">
                                        <input type="text" class="form-control has-feedback-left"
                                            placeholder="First Name" name="first_name"
                                            value="{{ old('first_name', isset($student) ? $student->first_name : '') }}">
                                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>

                                    <div class="col-md-3 col-sm-3 form-group has-feedback">
                                        <input type="text" class="form-control" placeholder="Last Name" name="last_name"
                                            value="{{ old('last_name', isset($student) ? $student->last_name : '') }}">
                                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                    </div>

                                    <div class="col-md-3 col-sm-3 form-group has-feedback">
                                        <input type="email" class="form-control has-feedback-left" placeholder="Email"
                                            name="email"
                                            value="{{ old('email', isset($student) ? $student->email : '') }}">
                                        <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                                    </div>

                                    <div class="col-md-3 col-sm-3 form-group has-feedback">
                                        <input type="tel" class="form-control" placeholder="Mobile Number"
                                            name="phone"
                                            value="{{ old('phone', isset($student) ? $student->phone : '') }}">
                                        <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-2 col-sm-2">
                                        <label>Gender *</label>
                                        <select class="form-control" name="gender">
                                            <option value=""
                                                {{ old('gender', isset($student) ? $student->gender : '') == '' ? 'selected' : '' }}>
                                                Select..</option>
                                            <option value="male"
                                                {{ old('gender', isset($student) ? $student->gender : '') == 'male' ? 'selected' : '' }}>
                                                Male</option>
                                            <option value="female"
                                                {{ old('gender', isset($student) ? $student->gender : '') == 'female' ? 'selected' : '' }}>
                                                Female</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-sm-2">
                                        <label>Date of Birth *</label>
                                        <input class="date-picker form-control @error('homework_date') is-invalid @enderror"
                                            placeholder="dd-mm-yyyy" type="date" name="date_of_birth"
                                            value="{{ old('date_of_birth', isset($student) ? $student->date_of_birth : '') }}">
                                    </div>

                                    <div class="col-md-2 col-sm-2">
                                        <label>Category *</label>
                                        <input type="text" class="form-control" name="category"
                                            value="{{ old('category', isset($student) ? $student->category : '') }}">
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <label>Religion *</label>
                                        <input type="text" class="form-control" name="religion"
                                            value="{{ old('religion', isset($student) ? $student->religion : '') }}">
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <label>Caste *</label>
                                        <input type="text" class="form-control" name="caste"
                                            value="{{ old('caste', isset($student) ? $student->caste : '') }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-3 col-sm-3">
                                        <label>Admission Date *</label>
                                        <input class="date-picker form-control" placeholder="dd-mm-yyyy" type="date"
                                            name="admission_date"
                                            value="{{ old('admission_date', isset($student) ? $student->admission_date : '') }}">
                                    </div>
                                    @if (isset($student) && $student->student_photo)
                                        <div class="col-md-3 col-sm-3">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align">Old Student Photo
                                                *</label>
                                            <input type="hidden" value="{{ $student->student_photo }}">
                                            <img src="{{ asset('student_photo/' . $student->student_photo) }}"
                                                alt="Image" width="100">
                                        </div>
                                    @endif
                                    <div class="col-md-3 col-sm-3">
                                        <label for="admissionno">Student Photo *</label>
                                        <input type="file" class="form-control" name="student_photo">
                                    </div>


                                    <div class="col-md-2 col-sm-2">
                                        <label for="rollnumber">Blood Group *</label>
                                        <input type="text" class="form-control" name="blood_group"
                                            value="{{ old('blood_group', isset($student) ? $student->blood_group : '') }}">
                                    </div>
                                    <div class="col-md-2 col-sm-2">
                                        <label for="class">Height *</label>
                                        <input type="text" class="form-control" name="height"
                                            value="{{ old('height', isset($student) ? $student->height : '') }}">
                                    </div>
                                    <div class="col-md-2 col-sm-2">
                                        <label for="class">Weight *</label>
                                        <input type="text" class="form-control" name="weight"
                                            value="{{ old('weight', isset($student) ? $student->weight : '') }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12 col-sm-12">
                                        <label>Medical History*</label>
                                        <textarea class="form-control" name="medical_history">{{ old('medical_history', isset($student) ? $student->medical_history : '') }}</textarea>
                                    </div>
                                </div>
                                <div class="x_title mt-3">
                                    <h2>Student Address Details</h2>
                                    <ul class="nav navbar-right panel_toolbox"></ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12 col-sm-12">
                                        <label>Current Address*</label>
                                        <input type="text" class="form-control" name="address"
                                            value="{{ old('address', isset($student) ? $student->address : '') }}">
                                    </div>
                                </div>
                                <div class="x_title mt-3">
                                    <h2>Parent Guardian Detail</h2>
                                    <ul class="nav navbar-right panel_toolbox"></ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-2 col-sm-2">
                                        <label>Father Name *</label>
                                        <input type="text" class="form-control" name="father_name"
                                            value="{{ old('father_name', isset($student) ? $student->father_name : '') }}">
                                    </div>
                                    <div class="col-md-2 col-sm-2">
                                        <label>Father Phone *</label>
                                        <input type="text" class="form-control" name="father_phone"
                                            value="{{ old('father_phone', isset($student) ? $student->father_phone : '') }}">
                                    </div>

                                    <div class="col-md-2 col-sm-2">
                                        <label>Father Occupation *</label>
                                        <input type="text" class="form-control" name="father_occupation"
                                            value="{{ old('father_occupation', isset($student) ? $student->father_occupation : '') }}">
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <label>Father Email *</label>
                                        <input type="email" class="form-control" name="father_email"
                                            value="{{ old('father_email', isset($student) ? $student->father_email : '') }}">
                                    </div>
                                    @if (isset($student) && $student->mother_photo)
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align">Old Father Photo
                                                *</label>
                                            <input type="hidden" value="{{ $student->mother_photo }}">
                                            <img src="{{ asset('father_photo/' . $student->mother_photo) }}"
                                                alt="Image" width="100">
                                        </div>
                                    @endif
                                    <div class="col-md-3 col-sm-3">
                                        <label>Father Photo *</label>
                                        <input type="file" class="form-control" name="father_photo">
                                    </div>

                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-2 col-sm-2">
                                        <label>Mother Name *</label>
                                        <input type="text" class="form-control"
                                            name="mother_name"value="{{ old('weight', isset($student) ? $student->mother_name : '') }}">
                                    </div>
                                    <div class="col-md-2 col-sm-2">
                                        <label>Mother Phone *</label>
                                        <input type="text" class="form-control"
                                            name="mother_phone"value="{{ old('weight', isset($student) ? $student->mother_phone : '') }}">
                                    </div>
                                    <div class="col-md-2 col-sm-2">
                                        <label>Mother Occupation *</label>
                                        <input type="text" class="form-control"
                                            name="mother_occupation"value="{{ old('weight', isset($student) ? $student->mother_occupation : '') }}">
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <label>Mother Email *</label>
                                        <input type="email" class="form-control" name="mother_email"
                                            value="{{ old('mother_email', isset($student) ? $student->mother_email : '') }}">
                                    </div>
                                    @if (isset($student) && $student->mother_photo)
                                        <div class="col-md-3 col-sm-3">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align">Old Mother Photo
                                                *</label>
                                            <input type="hidden" value="{{ $student->mother_photo }}">
                                            <img src="{{ asset('mother_photo/' . $student->mother_photo) }}"
                                                alt="Image" width="100">
                                        </div>
                                    @endif
                                    <div class="col-md-3 col-sm-3">
                                        <label>Mother Photo *</label>
                                        <input type="file" class="form-control" name="mother_photo">
                                    </div>

                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12 col-sm-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-secondary">
                                            @if (isset($student))
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
            // Initialize jQuery Validation
            $("#studentForm").validate({
                rules: {
                    admissionno: "required",
                    rollnumber: "required",
                    class: "required",
                    section: "required",
                    first_name: "required",
                    last_name: "required",
                    email: "required",
                    phone: "required",
                    gender: "required",
                    date_of_birth: "required",
                    category: "required",
                    religion: "required",
                    caste: "required",
                    admission_date: "required",
                    blood_group: "required",
                    height: "required",
                    weight: "required",
                    medical_history: "required",
                    address: "required",
                    father_name: "required",
                    father_phone: "required",
                    father_occupation: "required",
                    mother_name: "required",
                    mother_phone: "required",
                    mother_occupation: "required",
                },
                messages: {
                    admissionno: "Please enter Admission No",
                    rollnumber: "Please enter Roll Number",
                    class: "Please select a Class",
                    section: "Please select a Section",
                    first_name: "Please enter First Name",
                    last_name: "Please enter Last Name",
                    email: "Please enter a valid Email",
                    phone: "Please enter a valid Phone Number",
                    gender: "Please select a Gender",
                    date_of_birth: "Please enter a valid Date of Birth",
                    category: "Please enter Category",
                    religion: "Please enter Religion",
                    caste: "Please enter Caste",
                    admission_date: "Please enter a valid Admission Date",
                    blood_group: "Please enter Blood Group",
                    height: "Please enter Height",
                    weight: "Please enter Weight",
                    medical_history: "Please enter Medical History",
                    address: "Please enter Address",
                    father_name: "Please enter Father's Name",
                    father_phone: "Please enter a valid Father's Phone Number",
                    father_occupation: "Please enter Father's Occupation",
                    mother_name: "Please enter Mother's Name",
                    mother_phone: "Please enter a valid Mother's Phone Number",
                    mother_occupation: "Please enter Mother's Occupation",
                },

                submitHandler: function(form) {
                    form.submit();
                },
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Fetch classes when the page loads
            fetchClasses();

            // Event listener for class selection change
            $('#class').on('change', function() {
                // Fetch and populate sections based on the selected class
                fetchSections($(this).val());
            });

            // Function to fetch classes
            function fetchClasses() {
                $.ajax({
                    url: '/get-classes',
                    type: 'GET',
                    success: function(data) {
                        // Populate class dropdown and trigger change event
                        populateDropdown($('#class'), data.classes,
                            '{{ old('class', isset($student) ? $student->class : '') }}');
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
                            '{{ old('section', isset($student) ? $student->section : '') }}');
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
