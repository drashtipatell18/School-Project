@extends('admin.main')
@section('content')
    <style>
        .button-container {
            display: flex;
            justify-content: flex-end;
        }

        .miplus {
            position: absolute;
            width: 60px;
        }

        .miplusinput {
            padding-left: 70px;
        }
    </style>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>{{ isset($issueitems) ? 'Edit Issue Items ' : 'Add Issue Items' }}</h3>
                </div>
                <div class="button-container">
                    <a href="{{ route('issueitems') }}"><button type="button" class="btn btn-primary btn-sm mt-1">View
                            Issue Item </button></a>
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
                            <h2>{{ isset($issueitems) ? 'Edit a Record' : 'Create a new Record' }}</h2>
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                                method="POST"
                                action="{{ isset($issueitems) ? '/admin/issueitem/update/' . $issueitems->id : '/admin/issueitem/insert' }}">
                                @csrf

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"> User Type*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select class="form-control @error('usertype') is-invalid @enderror" name="usertype"
                                            id="usertype">
                                            <option value="">Select a UserType</option>
                                            {{-- @foreach ($roles as $role)
                                            <option value="{{ $role }}" {{ old('usertype', isset($issueitems) ? $issueitems->usertype : '') == $role ? 'selected' : '' }}>
                                                {{ $role }}
                                            </option>
                                        @endforeach --}}
                                        </select>
                                        @error('usertype')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Issue To*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select class="form-control @error('issueto') is-invalid @enderror" name="issueto"
                                            id="issueto">
                                            <option value="">Select a IssueTo</option>
                                        </select>
                                        @error('issueto')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Issue By*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select class="form-control @error('issueby') is-invalid @enderror" name="issueby"
                                            id="issueby">
                                            <option value="">Select a IssueBy</option>
                                        </select>
                                        @error('issueby')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Issue Date *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="date" class="form-control @error('issuedate') is-invalid @enderror"
                                            name="issuedate" value="{{ old('issuedate', $issueitems->issuedate ?? '') }}">
                                        @error('issuedate')
                                            <span style="color: red"
                                                class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Return Date *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="date" class="form-control @error('returndate') is-invalid @enderror"
                                            name="returndate"
                                            value="{{ old('returndate', $issueitems->returndate ?? '') }}">
                                        @error('returndate')
                                            <span style="color: red"
                                                class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Quantity*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input id="quantity" name="quantity" placeholder="" type="text"
                                            class="form-control @error('quantity') is-invalid @enderror"
                                            value="<?php echo isset($issueitems->quantity) ? $issueitems->quantity : ''; ?>">
                                        @error('quantity')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"> Notes*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" name="note" value="<?php echo isset($issueitems->note) ? $issueitems->note : ''; ?>"
                                            class="form-control @error('title') is-invalid @enderror">
                                        @error('note')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"> Category*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select class="form-control @error('category') is-invalid @enderror" name="category"
                                            id="category">
                                            <option value="">Select a Category</option>
                                        </select>

                                        @error('category')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Item*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select class="form-control @error('item') is-invalid @enderror" name="item"
                                            id="item">
                                            <option value="">Select a Item</option>
                                        </select>
                                        @error('item')
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
                                            @if (isset($issueitems))
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
            fetchCategory();
            fetchUsertype();

            // Event listener for class selection change
            $('#usertype').on('change', function() {
                // Fetch and populate items based on the selected class
                fetchIssueto($(this).val());
                fetchIssueby($(this).val());
            });

            // Event listener for class selection change
            $('#category').on('change', function() {
                // Fetch and populate items based on the selected class
                fetchItem($(this).val());
            });


            // Function to fetchCategory
            function fetchCategory() {
                $.ajax({
                    url: '/get-category',
                    type: 'GET',
                    success: function(data) {
                        // Populate class dropdown and trigger change event
                        populateDropdown($('#category'), data.categorys,
                            '{{ old('category', isset($issueitems) ? $issueitems->category : '') }}'
                        );
                        $('#category').change(); // Trigger change event
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }

            // Function to fetch sections based on the selected class
            function fetchItem(selectedCategory) {
                $.ajax({
                    url: '/get-item',
                    type: 'GET',
                    data: {
                        class: selectedCategory
                    },
                    success: function(data) {
                        // Populate section dropdown
                        populateDropdown($('#item'), data.items,
                            '{{ old('item', isset($issueitems) ? $issueitems->item : '') }}');
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }
            // Function to fetchUsertype
            function fetchUsertype() {
                $.ajax({
                    url: '/get-usertype',
                    type: 'GET',
                    success: function(data) {
                        // Populate class dropdown and trigger change event
                        populateDropdown($('#usertype'), data.roles,
                            '{{ old('usertype', isset($issueitems) ? $issueitems->usertype : '') }}'
                        );
                        $('#usertype').change(); // Trigger change event
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }


            function fetchIssueto(selectedusertype) {
                $.ajax({
                    url: '/get-allname',
                    type: 'GET',
                    data: {
                        class: selectedusertype
                    },
                    success: function(data) {
                        // Populate section dropdown
                        populateDropdown($('#issueto'), data.names,
                            '{{ old('issueto', isset($issueitems) ? $issueitems->issueto : '') }}');
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }

            function fetchIssueby(selectedusertype) {
                $.ajax({
                    url: '/get-allname',
                    type: 'GET',
                    data: {
                        class: selectedusertype
                    },
                    success: function(data) {
                        // Populate section dropdown
                        populateDropdown($('#issueby'), data.names,
                            '{{ old('issueby', isset($issueitems) ? $issueitems->issueby : '') }}');
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
