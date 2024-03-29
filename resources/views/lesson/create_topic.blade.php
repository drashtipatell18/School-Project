@extends('admin.main')
@section('content')
    <style>
        .button-container {
            display: flex;
            justify-content: flex-end;
        }
        .topic{
            margin-right: 18px;
        }
        .add-topic{
            margin-left: 69%;
        }
        .hideBtn{
            border:0;
        }
    </style>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>{{ isset($topic) ? 'Edit Topic' : 'Add Topic'}}</h3>
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
                <a href="{{ route('topics') }}"><button type="button" class="btn btn-primary btn-sm mb-2">View
                    Topic </button></a>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Form</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a class="dropdown-item" href="#">Settings 1</a>
                                        </li>
                                        <li><a class="dropdown-item" href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <h2>{{ isset($topic) ? 'Edit a Record' : 'Create a new Record' }}</h2>
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                                method="POST"
                                action="{{ isset($topic) ? '/admin/topic/update/' . $topic->id : '/admin/topic/insert' }}">
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
                                        <select id="section" name="section" class="form-control @error('section') is-invalid @enderror">
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
                                        <select id="subject_group" name="subject_group" class="form-control @error('subject_group') is-invalid @enderror">
                                            <option value="">Select Subject Group</option>
                                            @foreach($subjectGroup as $subject_name => $subject_value)
                                                <option value="{{ $subject_name }}" {{ (isset($topic) && $topic->subject_group == $subject_name) ? 'selected' : '' }}>
                                                    {{ $subject_name }}
                                                </option>
                                            @endforeach
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
                                        <select id="subject" name="subject" class="form-control @error('subject') is-invalid @enderror">
                                            <option value="">Select Subject</option>
                                            @foreach($subject as $subject_name => $subject_value)
                                                <option value="{{ $subject_name }}" {{ (isset($topic) && $topic->subject == $subject_name) ? 'selected' : '' }}>
                                                    {{ $subject_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('subject')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Lesson *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select id="lesson" name="lesson" class="form-control @error('lesson') is-invalid @enderror">
                                            <option value="">Select Lesson</option>
                                            @foreach($lessons as $lesson)
                                                <option value="{{ $lesson }}" {{ (isset($topic) && $topic->lesson == $lesson) ? 'selected' : '' }}>
                                                    {{ $lesson }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('lesson')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="topic-section">
                                    @isset($names)
                                        @foreach ($names as $topicName)
                                            <div class="item form-group topic-container">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align">Topic Name *</label>
                                                <div class="col-md-6 col-sm-6">
                                                        <div class="topic d-flex">
                                                            <input type="text" name="name[]" value="{{ isset($topicName) ? $topicName : ''}}" class="form-control topic @error('name') is-invalid @enderror">
                                                            <button class="hideBtn remove-topic"><i class="fa fa-remove"></i></button>
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
                                <div class="add-topic">
                                    <button class="btn btn-light add-more" type="button">Add More</button>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <button type="submit" class="btn btn-primary">
                                            @if (isset($topic))
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
                fetchSubjects($('#class').val(), $(this).val());
           });

           $('#subjectgroup').on('change', function() {
                fetchSubjects($('#class').val(), $(this).val());
           });
           $('#subject').on('change', function() {
                fetchLessons($('#class').val(), $(this).val());
           });
            // Function to fetch classes
            function fetchClasses() {
                $.ajax({
                    url: '/get-classes',
                    type: 'GET',
                    success: function(data) {
                        // Populate class dropdown and trigger change event
                        populateDropdown($('#class'), data.classes, '{{ old('class', isset($topic) ? $topic->class : '') }}');
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
                        populateDropdown($('#section'), data.sections, '{{ old('section', isset($topic) ? $topic->section : '') }}');
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }

            function fetchSubjectGroups(selectedClass, selectedSection) {
                // Check if both class and section are selected
                if (selectedClass && selectedSection) {
                    $.ajax({
                        url: '/get-subjectgroups',
                        type: 'GET',
                        data: {
                            class: selectedClass,
                            section: selectedSection
                        },
                        success: function(data) {
                            // Populate student dropdown
                            populateDropdown($('#subject_group'), data.subjectGroups,
                                '{{ old('subject_group', isset($topic) ? $topic->subject_group : '') }}');
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                } else {
                    populateDropdown($('#subjectgroup'), [], '');
                }
            }
            function fetchSubjects(selectedClass,selectedSubjectGroup) {
                $.ajax({
                    url: '/get-subjects',
                    type: 'GET',
                    data: {
                        class: selectedClass,
                        subject_group: selectedSubjectGroup
                    },
                    success: function(data) {
                        populateDropdown($('#subject'), data.subjects, '{{ old('subject', isset($topic) ? $topic->subject : '') }}');
                        $('#subject').change(); 
                    },
                    error: function(error) {
                        console.error('Error fetching subjects:', error);
                    }
                });
            }
            function fetchLessons(selectedClass,selectedSubjectGroup) {
                $.ajax({
                    url: '/get-lessons',
                    type: 'GET',
                    data: {
                        class: selectedClass,
                        subject_group: selectedSubjectGroup
                    },
                    success: function(data) {
                        populateDropdown($('#lesson'), data.lessons, '{{ old('lesson', isset($topic) ? $topic->lesson : '') }}');
                        $('#lesson').change(); 
                    },
                    error: function(error) {
                        console.error('Error fetching lesson:', error);
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
                var count = $('.topic-section').find('.topic-container').length; 
                var topicContainer = $('.topic-section');
                var newTopicField = `
                    <div class="item form-group topic-container">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Topic Name *</label>
                        <div class="col-md-6 col-sm-6">
                            <div class="topic d-flex">
                                <input type="text" name="name[${count}]" value="" class="form-control topic">
                                <button class="hideBtn remove-topic"><i class="fa fa-remove"></i></button>
                            </div>
                        </div>
                    </div>`;
                topicContainer.append(newTopicField);
            });

            // Function to remove dynamically added lesson field
            $('.topic-section').on('click', '.remove-topic', function() {
                $(this).closest('.topic-container').remove();
            });


        });
    </script>
@endpush