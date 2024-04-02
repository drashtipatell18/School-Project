@extends('admin.main')
@section('content')
    <style>
        .button-container {
            display: flex;
            justify-content: flex-end;
        }
        .select2-search__field {
            font-size: 129% !important;
            margin-left: 10px;
        }   
        .individual{
            border:0;
        } 
    </style>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>{{ isset($sendemails) ? 'Edit Send Email' : 'Add Send Email'}}</h3>
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
                <a href="{{ route('sendemails') }}"><button type="button" class="btn btn-primary btn-sm mb-2">View Send
                    Email  </button></a>
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
                            <h2>{{ isset($sendemails) ? 'Edit a Record' : 'Create a new Record' }}</h2>
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                                method="POST"
                                action="{{ isset($sendemails) ? '/admin/sendemail/update/' . $sendemails->id : '/admin/sendemail/insert' }}" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Template*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select name="template" class="form-control @error('template') is-invalid @enderror">
                                            <option value="">Select Template</option>
                                            @foreach($emailtemplate as $template)
                                                <option value="{{ $template }}" {{ isset($sendemails->template) && $sendemails->template == $template ? 'selected' : '' }}>{{ $template }}</option>
                                            @endforeach
                                        </select>
                                        @error('template')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"> Title*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" name="title" value="<?php echo isset($sendemails->title) ? $sendemails->title : '' ?>" class="form-control @error('title') is-invalid @enderror">
                                        @error('title')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                              
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Attach Document*</label>
                                    <div class="col-md-6 col-sm-6">
                                        @if (isset($sendemails) && $sendemails->attach_document)
                                            <img src="{{ asset('storage/attach_documents/' . $sendemails->attach_document) }}"
                                                alt="Uploaded Document" width="100">
                                            <input type="file" class="form-control" name="attach_document">
                                            <p class="mt-1">{{ $sendemails->attach_document }}</p>
                                        @else
                                            <input type="file" class="form-control" name="attach_document">
                                            <span class="invalid-feedback" style="color: red">Please select a file</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Message*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea name="message" class="form-control @error('message') is-invalid @enderror" rows="2">{{ isset($sendemails->message) ? $sendemails->message : '' }}</textarea>
                                        @error('message')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>    
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"></label>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="x_title mt-3">
                                            <h2>MessageTo</h2>
                                            <ul class="nav navbar-right panel_toolbox"></ul>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"> Group*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select id="messageto" name="messageto[]" class="form-control  @error('messageto') is-invalid @enderror" multiple>
                                            <option value="">Select Message To</option>
                                            @foreach ($roles as  $role)
                                                <option value="{{ $role }}"
                                                {{ in_array($role, old('messageto', [])) || (isset($sendemails) && in_array($role, explode(',', $sendemails->group))) ? 'selected' : '' }}>
                                                {{ $role }}
                                                </option>
                                            @endforeach
                                        </select>          
                                        @error('messageto')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"> Individual*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="input-group">
                                            <button type="button" data-toggle="dropdown" class="individual" aria-haspopup="true" >
                                                <select class="form-control @error('individual') is-invalid @enderror" name="individual" id="individual">
                                                    <option value="">Select</option>
                                                    @foreach($roles as $role)
                                                        <option value="{{ $role }}" {{ old('individual', isset($sendemails) ? $sendemails->individual : '') == $role ? 'selected' : '' }}>
                                                            {{ $role }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </button>
                                            <input type="text" value="<?php echo isset($sendemails->individual_name) ? $sendemails->individual_name : '' ?>" class="form-control" autocomplete="off" name="individual_name" id="search-query">
                                                <button class="btn btn-primary btn-searchsm add-btn" type="button" autocomplete="off">Add</button>
                                        </div>
                                    </div>
                                        @error('individual')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"></label>
                                    <div class="col-md-6 col-sm-6">
                                        <ul id="added-values-list"></ul>
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
                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <button type="submit" class="btn btn-primary">
                                            @if (isset($sendemails))
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
                        populateDropdown($('#class'), data.classes, '{{ old('class', isset($sendemails) ? $sendemails->class : '') }}');
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
                        populateDropdown($('#section'), data.sections, '{{ old('section', isset($sendemails) ? $sendemails->section : '') }}');
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

            $("#messageto").select2({
                    placeholder: "Select Message To",
                    allowClear: true
            }); 

            $('.add-btn').click(function() {
                var selectedOption = $('select[name="individual"]').val();
                var inputValue = $('input[name="text"]').val();

                console.log("Selected Option: ", selectedOption);
                console.log("Text Input Value: ", inputValue);


                // For demonstration purposes, let's append the values to a list
                $('#added-values-list').append('<li>' + selectedOption + ' (' + inputValue + ')</li>');
            });
        });
    </script>
@endpush