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
                                action="{{ isset($classtimetables) ? '/admin/class/update-timetable/' . $classtimetables->id : '/admin/class/insert-timetable' }}">
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
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Subject
                                        Group
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
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Subject *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select id="subject" name="subject" class="form-control @error('subject') is-invalid @enderror">
                                            <option value="">Select Subject</option>
                                            <!-- Options will be populated dynamically -->
                                        </select>
                                        @error('subject')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Teacher *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select id="teacher" name="teacher" class="form-control @error('teacher') is-invalid @enderror">
                                            <option value="">Select Teacher</option>
                                            @foreach ($teachers as $teacher)
                                                <option value="{{ $teacher }}"
                                                    @if (old('teacher', isset($classtimetables->teacher) ? $classtimetables->teacher : '') == $teacher) selected @endif>
                                                    {{ $teacher }}</option>
                                            @endforeach
                                        </select>
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
                                        <input id="middle-name" class="form-control @error('time_from') is-invalid @enderror"
                                            type="time" name="time_from"
                                            value="{{ old('time_from', isset($classtimetables) ? $classtimetables->time_from : '') }}">
                                        @error('time_from')
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
                                        <input id="middle-name" class="form-control @error('time_to') is-invalid @enderror"
                                            type="time" name="time_to"
                                            value="{{ old('time_to', isset($classtimetables) ? $classtimetables->time_to : '') }}">
                                        @error('time_to')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Day
                                        *</label>
                                    <div class="col-md-6 col-sm-6">
                                        {{-- <input id="middle-name" class="form-control @error('day') is-invalid @enderror"
                                            type="" name="day"
                                            value="{{ old('time_in', isset($classtimetables) ? $classtimetables->time_in : '') }}"> --}}
                                            <select id="day" name="day" class="form-control @error('day') is-invalid @enderror">
                                                <option value="">Select Day</option>
                                                <option value="monday" {{ old('day', isset($classtimetables) && $classtimetables->day == 'monday' ? 'selected' : '') }}>Monday</option>
                                                <option value="tuesday" {{ old('day', isset($classtimetables) && $classtimetables->day == 'tuesday' ? 'selected' : '') }}>Tuesday</option>
                                                <option value="wednesday" {{ old('day', isset($classtimetables) && $classtimetables->day == 'wednesday' ? 'selected' : '') }}>Wednesday</option>
                                                <option value="thursday" {{ old('day', isset($classtimetables) && $classtimetables->day == 'thursday' ? 'selected' : '') }}>Thursday</option>
                                                <option value="friday" {{ old('day', isset($classtimetables) && $classtimetables->day == 'friday' ? 'selected' : '') }}>Friday</option>
                                                <option value="saturday" {{ old('day', isset($classtimetables) && $classtimetables->day == 'saturday' ? 'selected' : '') }}>Saturday</option>
                                                <option value="sunday" {{ old('day', isset($classtimetables) && $classtimetables->day == 'sunday' ? 'selected' : '') }}>Sunday</option>
                                            </select>
                                        @error('day')
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
                    populateDropdown($('#class'), data.classes, '{{ old('class', isset($classtimetables) ? $classtimetables->class : '') }}');
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
                data: { class: selectedClass },
                success: function(data) {
                    // Populate section dropdown
                    populateDropdown($('#section'), data.sections, '{{ old('section', isset($classtimetables) ? $classtimetables->section : '') }}');
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
                dropdown.append('<option value="' + value + '" ' + selected + '>' + value + '</option>');
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
                        populateDropdown($('#subject_group'), data.subjectGroups, '{{ old('subject_group', isset($classtimetables) ? $classtimetables->subject_group : '') }}');
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
                        $.each(data.subjects, function(key, value) {
                            var subjects = value.split(',');
                            $.each(subjects, function(index, subject) {
                                var selected = '{{ old('subject', isset($classtimetables) ? $classtimetables->subject : '') }}' == subject.trim() ? 'selected' : '';
                                $('#subject').append('<option value="' + subject.trim() + '" ' + selected + '>' + subject.trim() + '</option>');
                            });
                        });
                    }
                });
            } else {
                $('#subject').empty();
                $('#subject').append('<option value="">Select Subject</option>');
            }
        });

        // Fetch subject and teacher data on page load if editing
        if ('{{ isset($classtimetables) }}') {
            var subjectGroup = '{{ old('subject_group', isset($classtimetables) ? $classtimetables->subject_group : '') }}';
            if (subjectGroup) {
                let flag = false;
                let i = 3;
                let chckerInterval = setInterval(() => {
                    if(i > 0)
                    if($('#subject_group').val())
                    {
                        $('#subject_group').trigger('change')
                        clearInterval(chckerInterval)
                    }
                    i--;
                }, 1500);
            }
        }

    });
</script>
@endpush

