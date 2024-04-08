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
                    <h3>{{ isset($emailtemplates) ? 'Edit Email Template' : 'Add Email Template' }}</h3>
                </div>
                <div class="button-container">
                    <a href="{{ route('emailtemplates') }}"><button type="button" class="btn btn-primary btn-sm mt-1">View
                            Email Template </button></a>
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
                            <h2>{{ isset($emailtemplates) ? 'Edit a Record' : 'Create a new Record' }}</h2>
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                                method="POST"
                                action="{{ isset($emailtemplates) ? '/admin/emailtemplate/update/' . $emailtemplates->id : '/admin/emailtemplate/insert' }}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"> Title*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" name="title" value="<?php echo isset($emailtemplates->title) ? $emailtemplates->title : ''; ?>"
                                            class="form-control @error('title') is-invalid @enderror">
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
                                        @if (isset($emailtemplates) && $emailtemplates->attach_document)
                                            <img src="{{ asset('storage/attach_documents/' . $emailtemplates->attach_document) }}"
                                                alt="Uploaded Document" width="100">
                                            <input type="file" class="form-control" name="attach_document">
                                            <p class="mt-1">{{ $emailtemplates->attach_document }}</p>
                                        @else
                                            <input type="file" class="form-control" name="attach_document">
                                            <span class="invalid-feedback" style="color: red">Please select a file</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Message*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea name="message" class="form-control @error('message') is-invalid @enderror" rows="2">{{ isset($emailtemplates->message) ? $emailtemplates->message : '' }}</textarea>
                                        @error('message')
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
                                            @if (isset($emailtemplates))
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
