@extends('admin.main')
@section('content')
    <style>
        .button-container {
            display: flex;
            justify-content: flex-end;
        }

        .lesson {
            margin-right: 18px;
        }

        .add-lesson {
            margin-left: 69%;
        }

        .hideBtn {
            border: 0;
        }
    </style>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>{{ isset($lesson) ? 'Edit Lesson' : 'Add Lesson' }}</h3>
                </div>
                <div class="button-container">
                    <a href="{{ route('lessons') }}"><button type="button" class="btn btn-primary btn-sm mt-1">View
                            Lesson </button></a>
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
                            <h2>{{ isset($lesson) ? 'Edit a Record' : 'Create a new Record' }}</h2>
                            <form id="{{ isset($lesson) ? 'editButton' : 'demo-form2' }}" data-parsley-validate
                                class="form-horizontal form-label-left" method="POST"
                                action="{{ isset($lesson) ? '/admin/lesson/update/' . $lesson->id : '/admin/lesson/insert' }}">
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
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Subject Group *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select id="subject_group" name="subject_group"
                                            class="form-control @error('subject_group') is-invalid @enderror">
                                            <option value="">Select Subject Group</option>
                                            @isset($subjectGroup)
                                                @foreach ($subjectGroup as $subject_name => $subject_value)
                                                    <option value="{{ $subject_name }}"
                                                        {{ isset($lesson) && $lesson->subject_group == $subject_name ? 'selected' : '' }}>
                                                        {{ $subject_name }}
                                                    </option>
                                                @endforeach
                                            @endisset
                                        </select>
                                        @error('subject_group')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Subject *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select id="subject" name="subject"
                                            class="form-control @error('subject') is-invalid @enderror">
                                            <option value="">Select Subject</option>
                                            @isset($subject)
                                                @foreach ($subject as $subject_name => $subject_value)
                                                    <option value="{{ $subject_name }}"
                                                        {{ isset($lesson) && $lesson->subject == $subject_name ? 'selected' : '' }}>
                                                        {{ $subject_name }}
                                                    </option>
                                                @endforeach
                                            @endisset

                                        </select>
                                        @error('subject')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="lession-section">
                                    @isset($names)
                                        @foreach ($names as $lessonName)
                                            <div class="item form-group lesson-container">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align">Lesson Name
                                                    *</label>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="lesson d-flex">
                                                        <input type="text" name="name[]" value="{{ $lessonName }}"
                                                            class="form-control lesson @error('name') is-invalid @enderror">
                                                        <button class="hideBtn remove-lesson"><i
                                                                class="fa fa-remove"></i></button>
                                                    </div>
                                                    @error('name')
                                                        <span class="invalid-feedback" style="color: red">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        @endforeach
                                    @endisset
                                </div>
                                <div class="add-lesson">
                                    <button class="btn btn-light add-more" type="button">Add More</button>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <button type="submit" class="btn btn-primary">
                                            @if (isset($lesson))
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

            $('#section').on('change', function() {
                fetchSubjectGroups($('#class').val(), $(this).val());
                fetchSubjects($('#class').val(), $('#subject_group').val());
            });

            $('#subject_group').on('change', function() {
                fetchSubjects($('#class').val(), $(this).val());
            });

            // Function to fetch classes
            function fetchClasses() {
                $.ajax({
                    url: '/get-classes',
                    type: 'GET',
                    success: function(data) {
                        // Populate class dropdown and trigger change event
                        populateDropdown($('#class'), data.classes,
                            '{{ old('class', isset($lesson) ? $lesson->class : '') }}');
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
                            '{{ old('section', isset($lesson) ? $lesson->section : '') }}');
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }

            function fetchSubjectGroups(selectedClass, selectedSection) {
                $.ajax({
                    url: '/get-subjectgroups',
                    type: 'GET',
                    data: {
                        class: selectedClass,
                        section: selectedSection
                    },
                    success: function(data) {
                        // Populate subject group dropdown and set selected value
                        populateDropdown($('#subject_group'), data.subjectGroups,
                            '{{ old('subject_group', isset($lesson) ? $lesson->subject_group : '') }}'
                        );
                        $('#subject_group').change(); // Trigger change event
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }

            function fetchSubjects(selectedClass, selectedSubjectGroup) {
                $.ajax({
                    url: '/get-subjects',
                    type: 'GET',
                    data: {
                        class: selectedClass,
                        subject_group: selectedSubjectGroup
                    },
                    success: function(data) {
                        populateDropdown($('#subject'), data.subjects,
                            '{{ old('subject', isset($lesson) ? $lesson->subject : '') }}');
                        $('#subject').change();
                    },
                    error: function(error) {
                        console.error('Error fetching subjects:', error);
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

            $('.add-more').click(function() {
                var count = $('.lession-section').find('.lesson-container').length;
                var lessonContainer = $('.lession-section');
                var newLessonField = `
                    <div class="item form-group lesson-container">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Lesson Name *</label>
                        <div class="col-md-6 col-sm-6">
                            <div class="lesson d-flex">
                                <input type="text" name="name[${count}]" value="" class="form-control lesson">
                                <button class="hideBtn remove-lesson"><i class="fa fa-remove"></i></button>
                            </div>
                        </div>
                    </div>`;
                lessonContainer.append(newLessonField);
            });

            // Function to remove dynamically added lesson field
            $('.lession-section').on('click', '.remove-lesson', function() {
                $(this).closest('.lesson-container').remove();
            });
        });
    </script>
@endpush
