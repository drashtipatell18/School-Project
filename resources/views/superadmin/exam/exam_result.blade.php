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
                    <h3>{{ isset($result) ? 'Edit Result' : 'Add Result' }}</h3>
                </div>
                <div class="button-container">
                    <a href="{{ route('result') }}"><button type="button" class="btn btn-primary btn-sm mb-2">View
                            Result</button></a>
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
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                                method="POST" action="{{ route('insert.result') }}">
                                {{-- action="{{ isset($result) ? route('update.result', ['id' => $result->id]) : route('insert.result') }}"> --}}

                                <input type="hidden" id="id" name="id">
                                @csrf
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Exam Group *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select name="exam_group"
                                            class="form-control @error('exam_group') is-invalid @enderror" id="exam_group">
                                            <option value="">Select Exam group</option>
                                        </select>
                                        @error('exam_group')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Exam *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select name="exam" class="form-control @error('exam') is-invalid @enderror"
                                            id="exam">
                                            <option value="">Select Exam</option>
                                        </select>
                                        @error('exam')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

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
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Subject *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select id="subject" name="subject[]" class="mul-select" multiple="true"
                                            @error('subject') is-invalid @enderror>
                                            <option value="">Select Subject</option>
                                            <!-- Add your subject options here -->
                                        </select>
                                        @error('subject')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div id="marks-container"></div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Grand Total*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" class="form-control" id="grand-total" name="grand_total">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Percent *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" class="form-control" id="percent" name="percent">
                                    </div>
                                </div>
                                {{-- 
                                <input type="hidden" id="grand-total" name="grand_total">
                                <input type="hidden" id="percent" name="percent"> --}}


                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Rank *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" class="form-control @error('rank') is-invalid @enderror"
                                            name="rank" value="{{ old('rank', isset($result) ? $result->rank : '') }}">
                                        @error('rank')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Result *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" class="form-control @error('result') is-invalid @enderror"
                                            name="result"
                                            value="{{ old('result', isset($result) ? $result->result : '') }}">
                                        @error('result')
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
                                            @if (isset($result))
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
            $(".mul-select").select2({
                placeholder: "Select Subject",
                tags: true,
            });

            // Event listener for subject selection change
            $('#subject').on('change', function() {
                var selectedSubject = $(this).val();
                var marksInputContainer = $('#marks-container');

                // Clear existing marks input fields
                marksInputContainer.empty();

                // Check if a subject is selected
                if (selectedSubject && selectedSubject.length > 0) {
                    for (var i = 0; i < selectedSubject.length; i++) {
                        marksInputContainer.append(
                            '<div class="item form-group">' +
                            '<label class="col-form-label col-md-3 col-sm-3 label-align">' +
                            'Marks for ' + selectedSubject[i] + ' *</label>' +
                            '<div class="col-md-6 col-sm-6">' +
                            '<input type="text" class="form-control" name="marks[' + selectedSubject[
                                i] +
                            ']" placeholder="Enter marks for ' + selectedSubject[i] + '">' +
                            '</div>' +
                            '</div>'
                        );
                    }
                }
            });
            // Fetch classes when the page loads
            fetchExamGroups();

            // Event listener for class selection change
            $('#exam_group').on('change', function() {
                // Fetch and populate sections based on the selected class
                fetchExams($(this).val());
            });

            // Event listener for section selection change
            $('#exam').on('change', function() {
                // Fetch and populate students based on the selected class and section
                fetchExamsAndSubjects($('#exam_group').val(), $(this).val());
            });

            // Initialize Select2 for the student dropdown
            $('#subject').select2({
                placeholder: 'Select Subject',
                allowClear: true, // Option to clear the selected value
                width: '100%', // Adjust the width as needed
            });

            // Function to fetch classes
            function fetchExamGroups() {
                $.ajax({
                    url: '/get-groups/result',
                    type: 'GET',
                    success: function(data) {
                        console.log(data); // Log the data to the console
                        populateDropdown($('#exam_group'), data.exam_groups,
                            '{{ old('class', isset($result) ? $result->exam_group : '') }}');
                        $('#exam_group').change(); // Trigger change event
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }

            // Function to fetch exams based on the selected class
            function fetchExams(selectedExamGroup) {
                $.ajax({
                    url: '/get-exam/result',
                    type: 'GET',
                    data: {
                        exam_group: selectedExamGroup
                    },
                    success: function(data) {
                        // Populate exam dropdown
                        populateDropdown($('#exam'), data.exams,
                            '{{ old('exam', isset($result) ? $result->exam : '') }}');
                        // Trigger change event for exam dropdown
                        $('#exam').change();
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }

            // Function to fetch students based on the selected class and section
            function fetchExamsAndSubjects(selectedExamGroups, selectedExam) {
                // Check if both class and section are selected
                if (selectedExamGroups && selectedExam) {
                    $.ajax({
                        url: '/get-exam-groups-and-subjects',
                        type: 'GET',
                        data: {
                            exam_group: selectedExamGroups,
                            exam: selectedExam
                        },
                        success: function(data) {
                            // Populate student dropdown
                            populateDropdown($('#subject'), data.subjects,
                                '{{ old('subject', isset($result) ? $result->subject : '') }}');
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                } else {
                    // If either class or section is not selected, empty the student dropdown
                    populateDropdown($('#subject'), [], '');
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



    {{-- Subject Total get --}}

    <script>
        $(document).ready(function() {
            // Track which subjects have marks added
            var subjectsWithMarks = [];

            // Event listener for subject selection change
            $('#subject').on('change', function() {
                var selectedSubjects = $(this).val();
                var marksInputContainer = $('#marks-container');

                // Clear existing marks input fields
                marksInputContainer.empty();
                subjectsWithMarks = []; // Reset the array

                // Check if subjects are selected
                if (selectedSubjects && selectedSubjects.length > 0) {
                    for (var i = 0; i < selectedSubjects.length; i++) {
                        marksInputContainer.append(
                            '<div class="item form-group">' +
                            '<label class="col-form-label col-md-3 col-sm-3 label-align">' +
                            'Marks for ' + selectedSubjects[i] + ' *</label>' +
                            '<div class="col-md-6 col-sm-6">' +
                            '<input type="text" class="form-control marks-input" name="marks[' +
                            selectedSubjects[i] + ']" placeholder="Enter marks for ' + selectedSubjects[
                                i] + '">' +
                            '</div>' +
                            '</div>'
                        );

                        // Add selected subjects to the tracking array
                        subjectsWithMarks.push(selectedSubjects[i]);
                    }
                }
                // Update Grand Total whenever marks change
                updateGrandTotal();
            });

            // Event listener for marks input change
            $(document).on('input', '.marks-input', function() {
                // Update Grand Total whenever marks change
                updateGrandTotal();
            });

            // Function to update Grand Total and Percent based on the sum of all marks
            function updateGrandTotal() {
                var grandTotal = 0;

                // Iterate over all marks inputs and calculate the total
                $('.marks-input').each(function() {
                    var marksValue = parseFloat($(this).val()) || 0;
                    grandTotal += marksValue;
                });

                // Update the Grand Total input
                $('#grand-total').val(grandTotal);

                // Calculate Percent
                var percent = (grandTotal / (subjectsWithMarks.length * 100)) * 100;

                // Update Percent input
                $('#percent').val(percent.toFixed(2) + '%');
            }
        });
    </script>



    {{-- Class and Section get --}}

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
