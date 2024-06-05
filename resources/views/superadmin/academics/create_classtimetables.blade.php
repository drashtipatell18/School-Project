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
                    <h3>{{ isset($classtimetables) ? 'Edit ClassTimeTable' : 'Add ClassTimeTable' }}</h3>
                </div>
                <div class="button-container">
                    <a href="{{ route('classtimetable') }}"><button type="button" class="btn btn-primary btn-sm mt-1">View
                        ClassTimeTable</button></a>
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
                            <h2>{{ isset($classtimetables) ? 'Edit a Record' : 'Create a new Record' }}</h2>
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                                method="POST"
                                action="{{ isset($classtimetables) ? '/admin/class/update-timetable/' . $classtimetables->id : '/admin/class/create-timetable' }}">
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
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Subject Group
                                        *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select id="subject_group" name="subject_group"
                                            class="form-control @error('subject_group') is-invalid @enderror">
                                            <option value="">Select Subject Group</option>
                                        </select>
                                       
                                        @error('subject_group')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Subject
                                        *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select id="subject" name="subject"
                                        class="form-control @error('subject') is-invalid @enderror">
                                        <option value="">Select Subject</option>
                                    </select>
                                        @error('subject')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Teacher 
                                        *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input id="middle-name" class="form-control @error('teacher') is-invalid @enderror"
                                            type="text" name="teacher"
                                            value="{{ old('teacher', isset($classtimetables) ? $classtimetables->teacher : '') }}">
                                        @error('teacher')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Time For 
                                        *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input id="middle-name" class="form-control @error('time_for') is-invalid @enderror"
                                            type="date" name="time_for"
                                            value="{{ old('time_for', isset($classtimetables) ? $classtimetables->time_for : '') }}">
                                        @error('time_for')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Time In 
                                        *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input id="middle-name" class="form-control @error('time_in') is-invalid @enderror"
                                            type="date" name="time_in"
                                            value="{{ old('time_in', isset($classtimetables) ? $classtimetables->time_in : '') }}">
                                        @error('time_in')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Room No
                                        *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input id="middle-name" class="form-control @error('room_no') is-invalid @enderror"
                                            type="text" name="room_no"
                                            value="{{ old('room_no', isset($classtimetables) ? $classtimetables->room_no : '') }}">
                                        @error('room_no')
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
                                            @if (isset($classtimetables))
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
                            '{{ old('class', isset($classtimetables) ? $classtimetables->class : '') }}');
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
                            '{{ old('section', isset($classtimetables) ? $classtimetables->section : '') }}');
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

            $('#class').change(function() {
                var classID = $(this).val();
                if (classID) {
                    $.ajax({
                        url: '/subject-groups',
                        type: 'GET',
                        data: { class_id: classID },
                        success: function(data) {
                            $('#subject_group').empty();
                            $('#subject_group').append('<option value="">Select Subject Group</option>');
                            populateDropdown($('#subject_group'), data.subjectGroups,
                            '{{ old('subject_group', isset($classtimetables) ? $classtimetables->subject_group : '') }}');                          
                        }
                    });
                } 
            });
            $('#subject_group').change(function() {
                var subjectGroup = $(this).val();
                if (subjectGroup) {
                    $.ajax({
                        url: '/subjects',
                        type: 'GET',
                        data: { subject_group: subjectGroup },
                        success: function(data) {
                            $('#subject').empty();
                            $('#subject').append('<option value="">Select Subject</option>');

                            populateDropdown($('#subject'), data.subjects,
                            '{{ old('subject', isset($classtimetables) ? $classtimetables->subject : '') }}');                          
                        }
                    });
                } else {
                    $('#subject').empty();
                    $('#subject').append('<option value="">Select Subject</option>');
                }
            });
        });
    </script>
@endpush
