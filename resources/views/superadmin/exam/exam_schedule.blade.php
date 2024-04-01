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
                    <h3>Schedule</h3>
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
                <a href="{{ route('schedule') }}"><button type="button" class="btn btn-primary btn-sm mb-2">View
                        Schedule</button></a>
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
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                                method="POST"
                                action="{{ isset($schedule) ? route('update.schedule', ['id' => $schedule->id]) : route('insert.schedule') }}">
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
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Subject *</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" class="form-control @error('subject') is-invalid @enderror"
                                            name="subject"
                                            value="{{ old('subject', isset($schedule) ? $schedule->subject : '') }}">
                                        @error('subject')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Date From *</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input class="date-picker form-control @error('date_from') is-invalid @enderror"
                                            type="date" name="date_from"
                                            value="{{ old('date_from', isset($schedule) ? $schedule->date_from : '') }}">
                                        @error('date_from')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Start Time *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="date-picker form-control @error('start_time') is-invalid @enderror"
                                            type="time" name="start_time"
                                            value="{{ old('start_time', isset($schedule) ? \Carbon\Carbon::parse($schedule->start_time)->format('H:i') : '') }}">
                                        @error('start_time')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Duration *</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" class="form-control @error('duration') is-invalid @enderror"
                                            name="duration"
                                            value="{{ old('duration', isset($schedule) ? $schedule->duration : '') }}">
                                        @error('duration')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Room No *</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" class="form-control @error('room_no') is-invalid @enderror"
                                            name="room_no"
                                            value="{{ old('room_no', isset($schedule) ? $schedule->room_no : '') }}">
                                        @error('room_no')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Max Marks *</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text"
                                            class="form-control @error('max_marks') is-invalid @enderror" name="max_marks"
                                            value="{{ old('max_marks', isset($schedule) ? $schedule->max_marks : '') }}">
                                        @error('max_marks')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Min Marks *</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text"
                                            class="form-control @error('min_marks') is-invalid @enderror" name="min_marks"
                                            value="{{ old('min_marks', isset($schedule) ? $schedule->min_marks : '') }}">
                                        @error('min_marks')
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
                                            @if (isset($exam_name))
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
            // Fetch exam groups when the page loads
            fetchExamGroups();

            // Event listener for exam group selection change
            $('#exam_group').on('change', function() {
                // Fetch and populate exams based on the selected exam group
                fetchExams($(this).val());
            });

            // Function to fetch exam groups
            function fetchExamGroups() {
                $.ajax({
                    url: '/get-groups',
                    type: 'GET',
                    success: function(data) {
                        // Populate exam group dropdown and trigger change event
                        populateDropdown($('#exam_group'), data.examGroups,
                            '{{ old('exam_group', isset($schedule) ? $schedule->exam_group : '') }}'
                        );
                        // Comment out the line below
                        // $('#exam_group').change(); 
                        fetchExams($('#exam_group').val());
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }

            // Function to fetch exams based on the selected exam group
            function fetchExams(selectedExamGroup) {
                $.ajax({
                    url: '/get-exam',
                    type: 'GET',
                    data: {
                        exam_group: selectedExamGroup // Change 'exam' to 'exam_group'
                    },
                    success: function(data) {
                        // Populate exam dropdown
                        populateDropdown($('#exam'), data.exams,
                            '{{ old('exam', isset($schedule) ? $schedule->exam : '') }}');
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
