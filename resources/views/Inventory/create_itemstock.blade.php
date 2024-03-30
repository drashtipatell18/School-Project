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
                    <h3>{{ isset($itemstocks) ? 'Edit Items Stock' : 'Add Items Stock'}}</h3>
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
                <a href="{{ route('itemstocks') }}"><button type="button" class="btn btn-primary btn-sm mb-2">View
                    Item Stocks </button></a>
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
                            <h2>{{ isset($itemstocks) ? 'Edit a Record' : 'Create a new Record' }}</h2>
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                                method="POST"
                                action="{{ isset($itemstocks) ? '/admin/itemstock/update/' . $itemstocks->id : '/admin/itemstock/insert' }}" enctype="multipart/form-data">
                                @csrf
                                
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
                              
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Supplier*</label>
                                    <div class="col-md-6 col-sm-6">
                                    <select class="form-control @error('supplier') is-invalid @enderror" name="supplier"
                                        id="supplier">
                                        <option value="">Select a Supplier</option>
                                        @foreach($suppliers as $supplier)
                                            <option value="{{ $supplier }}" {{ old('supplier', isset($itemstocks) ? $itemstocks->supplier : '') == $supplier ? 'selected' : '' }}>
                                                {{ $supplier }}
                                            </option>
                                        @endforeach
                                    </select>
                                        @error('supplier')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>    

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Store*</label>
                                    <div class="col-md-6 col-sm-6">
                                    <select class="form-control @error('store') is-invalid @enderror" name="store"
                                    id="store">
                                        <option value="">Select a Store</option>
                                        @foreach($stores as $store)
                                            <option value="{{ $store }}" {{ old('store', isset($itemstocks) ? $itemstocks->store : '') == $store ? 'selected' : '' }}>
                                                {{ $store }}
                                            </option>
                                        @endforeach
                                    </select>
                                        @error('store')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Quantity*</label>
                                    <div class="col-md-6 col-sm-6">
                                            <span class="miplus">
                                                <select class="form-control @error('quantity') is-invalid @enderror" name="symbol" autocomplete="off">
                                                    <option value="+">+</option>
                                                    <option value="-">-</option>
                                                </select>
                                            </span>
                                            <input id="quantity" name="quantity" placeholder="" type="text" class="form-control miplusinput @error('quantity') is-invalid @enderror" value="<?php echo isset($itemstocks->quantity) ? $itemstocks->quantity : '' ?>">
                                        @error('quantity')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>  
                            
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Purchase Price ($)*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input id="price" name="price" placeholder="" type="text" class="form-control @error('price') is-invalid @enderror" value="<?php echo isset($itemstocks->price) ? $itemstocks->price : '' ?>">
                                        @error('price')
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
                                            name="date" value="{{ old('date', $itemstocks->date ?? '') }}">
                                        @error('date')
                                            <span style="color: red"
                                                class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Attach Document*</label>
                                    <div class="col-md-6 col-sm-6">
                                        @if (isset($itemstocks) && $itemstocks->attach_document)
                                            <img src="{{ asset('storage/attach_documents/' . $itemstocks->attach_document) }}"
                                                alt="Uploaded Document" width="100">
                                            <input type="file" class="form-control" name="attach_document">
                                            <p class="mt-1">{{ $itemstocks->attach_document }}</p>
                                        @else
                                            <input type="file" class="form-control" name="attach_document">
                                            <span class="invalid-feedback" style="color: red">Please select a file</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Description*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="2">{{ isset($itemstocks->description) ? $itemstocks->description : '' }}</textarea>
                                        @error('description')
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
                                            @if (isset($itemstocks))
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
                        populateDropdown($('#category'), data.categorys, '{{ old('category', isset($itemstocks) ? $itemstocks->category : '') }}');
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
                        populateDropdown($('#item'), data.items, '{{ old('item', isset($itemstocks) ? $itemstocks->item : '') }}');
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