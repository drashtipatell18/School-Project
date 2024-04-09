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
                    <h3>{{ isset($visitor_book) ? 'Edit Add Visitor' : 'Add Add Visitor' }}</h3>
                </div>
                <div class="button-container">
                    <a href="{{ route('visitor.book') }}"><button type="button" class="btn btn-primary btn-sm mt-1">
                            Visitor List</button></a>
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
                            <h2>{{ isset($visitor_book) ? 'Edit a Record' : 'Create a new Record' }}</h2>
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                                method="POST"
                                action="{{ isset($visitor_book) ? '/admin/visitor/book/update/' . $visitor_book->id : '/admin/visitor/book/insert' }}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Purpose *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select name="purpose" class="form-control @error('purpose') is-invalid @enderror">
                                            <option value="">Select Purpose</option>
                                            @foreach ($purposes as $purpose_id => $purpose)
                                                <option value="{{ $purpose_id }}"
                                                    {{ old('purpose', $visitor_book->purpose ?? '') == $purpose_id ? 'selected' : '' }}>
                                                    {{ $purpose }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @error('purpose')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>




                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Meeting With *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select name="meeting_with" id="meeting_with" class="form-control @error('meeting_with') is-invalid @enderror">
                                            <option value="">Select</option>
                                            <option value="staff"
                                                {{ old('meeting_with', $visitor_book->meeting_with ?? '') == 'staff' ? 'selected' : '' }}>
                                                Staff</option>
                                            <option value="student"
                                                {{ old('meeting_with', $visitor_book->meeting_with ?? '') == 'student' ? 'selected' : '' }}>
                                                Student</option>
                                        </select>
                                        @error('meeting_with')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>



                                <div id="staff_dropdown" class="item form-group" style="display:none;">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Staff *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select name="staff" class="form-control @error('staff') is-invalid @enderror">
                                            <option value="">Select Staff</option>
                                            @foreach ($teachers as $staff_id => $staff)
                                                <option value="{{ $staff_id }}"
                                                    {{ old('staff') == $staff_id ? 'selected' : '' }}>
                                                    {{ $staff }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('staff')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div id="class_dropdown" class="item form-group" style="display:none;">
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

                                <div id="section_dropdown" class="item form-group" style="display:none;">
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

                                <div id="student_dropdown" class="item form-group" style="display:none;">
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
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Visitor Name *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text"
                                            class="form-control @error('visitor_name') is-invalid @enderror"
                                            name="visitor_name"
                                            value="{{ old('visitor_name', isset($visitor_book) ? $visitor_book->visitor_name : '') }}">
                                        @error('visitor_name')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Phone
                                        *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input id="middle-name" class="form-control @error('phone') is-invalid @enderror"
                                            type="number" name="phone"
                                            value="{{ old('phone', isset($visitor_book) ? $visitor_book->phone : '') }}">
                                        @error('phone')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">ID Card
                                        *</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="middle-name"
                                            class="form-control @error('id_card') is-invalid @enderror" type="number"
                                            name="id_card" value="{{ old('id_card', $visitor_book->id_card ?? '') }}">
                                        @error('id_card')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Number
                                        Of
                                        Person
                                        *</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="middle-name"
                                            class="form-control @error('number_of_person') is-invalid @enderror"
                                            type="number" name="number_of_person"
                                            value="{{ old('number_of_person', $visitor_book->number_of_person ?? '') }}">
                                        @error('number_of_person')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Date *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="date" class="form-control @error('date') is-invalid @enderror"
                                            name="date" value="{{ old('date', $visitor_book->date ?? '') }}">
                                        @error('date')
                                            <span style="color: red"
                                                class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">In Time *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="date" class="form-control @error('in_time') is-invalid @enderror"
                                            name="in_time" value="{{ old('in_time', $visitor_book->in_time ?? '') }}">
                                        @error('in_time')
                                            <span style="color: red"
                                                class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Out Time
                                        *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="date"
                                            class="form-control @error('out_time') is-invalid @enderror" name="out_time"
                                            value="{{ old('out_time', $visitor_book->out_time ?? '') }}">
                                        @error('out_time')
                                            <span style="color: red"
                                                class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Attach Document*</label>
                                    <div class="col-md-6 col-sm-6">
                                        @if (isset($visitor_book) && $visitor_book->attach_document)
                                            <img src="{{ asset('storage/attach_documents/' . $visitor_book->attach_document) }}"
                                                alt="Uploaded Document" width="100">
                                            <input type="file" class="form-control" name="attach_document">
                                            <p class="mt-1">{{ $visitor_book->attach_document }}</p>
                                        @else
                                            <input type="file" class="form-control" name="attach_document">
                                            <span class="invalid-feedback" style="color: red">Please select a file</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Note *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea class="form-control" name="note" rows="4">{{ old('note', isset($visitor_book) ? $visitor_book->note : '') }}</textarea>
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <button type="submit" class="btn btn-primary">
                                            @if (isset($visitor_book))
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
                            '{{ old('class', isset($visitor_book) ? $visitor_book->class : '') }}');
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
                            '{{ old('section', isset($visitor_book) ? $visitor_book->section : '') }}'
                        );

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
                                '{{ old('student', isset($visitor_book) ? $visitor_book->student : '') }}'
                            );
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
    <script>
        $(document).ready(function() {
            $("#meeting_with").change(function() {
                var selectedValue = $(this).val();
                if (selectedValue === 'staff') {
                    $("#staff_dropdown").show();
                    $("#class_dropdown").hide();
                    $("#section_dropdown").hide();
                    $("#student_dropdown").hide();
                } else if (selectedValue === 'student') {
                    $("#staff_dropdown").hide();
                    $("#class_dropdown").show();
                    $("#section_dropdown").show();
                    $("#student_dropdown").show();
                } else {
                    $("#staff_dropdown").hide();
                    $("#class_dropdown").hide();
                    $("#section_dropdown").hide();
                    $("#student_dropdown").hide();
                }
            });
        });
    </script>
@endpush
