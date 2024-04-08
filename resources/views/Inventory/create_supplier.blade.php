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
                    <h3>{{ isset($supplier) ? 'Edit Item Supplier' : 'Add Item Supplier' }}</h3>
                </div>
                <div class="button-container">
                    <a href="{{ route('suppliers') }}"><button type="button" class="btn btn-primary btn-sm mt-1">View
                            Item Supplier </button></a>
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
                            <h2>{{ isset($supplier) ? 'Edit a Record' : 'Create a new Record' }}</h2>
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                                method="POST"
                                action="{{ isset($supplier) ? '/admin/supplier/update/' . $supplier->id : '/admin/supplier/insert' }}">
                                @csrf

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"> Name*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" name="name" value="<?php echo isset($supplier->name) ? $supplier->name : ''; ?>"
                                            class="form-control @error('name') is-invalid @enderror">
                                        @error('name')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Phone*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" name="phone" value="<?php echo isset($supplier->phone) ? $supplier->phone : ''; ?>"
                                            class="form-control @error('phone') is-invalid @enderror">
                                        @error('phone')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Email*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" name="email" value="<?php echo isset($supplier->email) ? $supplier->email : ''; ?>"
                                            class="form-control @error('email') is-invalid @enderror">
                                        @error('email')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Address*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea name="address" class="form-control @error('address') is-invalid @enderror" rows="2">{{ isset($supplier->address) ? $supplier->address : '' }}</textarea>
                                        @error('address')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Contact Person Name*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" name="contact_person_name" value="<?php echo isset($supplier->contact_person_name) ? $supplier->contact_person_name : ''; ?>"
                                            class="form-control @error('contact_person_name') is-invalid @enderror">
                                        @error('contact_person_name')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Contact Person
                                        Phone*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" name="contact_person_phone" value="<?php echo isset($supplier->contact_person_phone) ? $supplier->contact_person_phone : ''; ?>"
                                            class="form-control @error('contact_person_phone') is-invalid @enderror">
                                        @error('contact_person_phone')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Contact Person
                                        Email*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" name="contact_person_email" value="<?php echo isset($supplier->contact_person_email) ? $supplier->contact_person_email : ''; ?>"
                                            class="form-control @error('contact_person_email') is-invalid @enderror">
                                        @error('contact_person_email')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Description*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="2">{{ isset($supplier->description) ? $supplier->description : '' }}</textarea>
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
                                            @if (isset($supplier))
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
