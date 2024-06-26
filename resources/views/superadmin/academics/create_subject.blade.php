@extends('admin.main')
@section('content')
    <style>
        .button-container {
            display: flex;
            justify-content: flex-end;
        }
        .circus .form-control{
            display: inline; 
            height: 12px; 
            width: 15px !important;
        }
        #theory{
            padding-left: 12px;
        }
    </style>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>{{ isset($subjects) ? 'Edit Subject' : 'Add Subject' }}</h3>
                </div>
                <div class="button-container">
                    <a href="{{ route('subject') }}"><button type="button" class="btn btn-primary btn-sm mt-1">View
                            Subject </button></a>
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
                            <h2>{{ isset($subject) ? 'Edit a Record' : 'Create a new Record' }}</h2>
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                                method="POST"
                                action="{{ isset($subject) ? '/admin/subject/update/' . $subject->id : '/admin/subject/insert' }}">
                                @csrf

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Subject Code *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" name="code" value="<?php echo isset($subject->code) ? $subject->code : ''; ?>"
                                            class="form-control @error('code') is-invalid @enderror">
                                        @error('code')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Subject Name *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" name="name" value="<?php echo isset($subject->name) ? $subject->name : ''; ?>"
                                            class="form-control @error('name') is-invalid @enderror">
                                        @error('name')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group circus">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Subject Type *</label>
                                    <div class="col-md-6 col-sm-6 mt-2">
                                        <input type="radio" id="practical" name="subject_type" value="Practical"
                                            {{ isset($subject->subject_type) && $subject->subject_type == 'Practical' ? 'checked' : '' }} class="form-control subjectradio @error('subject_type') is-invalid @enderror">
                                        <label for="practical">Practical</label>
                                        <input type="radio" id="theory" name="subject_type" value="Theory"
                                            {{ isset($subject->subject_type) && $subject->subject_type == 'Theory' ? 'checked' : '' }} class="form-control subjectradio @error('subject_type') is-invalid @enderror">
                                        <label for="theory">Theory</label>
                                        @error('subject_type')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                @if(isset($error))
                                    <span style="color: red">{{ $error }}</span>
                                @endif
                                

                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <button type="submit" class="btn btn-primary">
                                            @if (isset($subject))
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
