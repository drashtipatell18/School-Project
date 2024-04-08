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
                    <h3>{{ isset($class) ? 'Edit Class' : 'Add Class' }}</h3>
                </div>
                <div class="button-container">
                    <a href="{{ route('class') }}"><button type="button" class="btn btn-primary btn-sm mt-1">View
                            Class</button></a>
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
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                                method="POST"
                                action="{{ isset($class) ? '/admin/class/update/' . $class->id : '/admin/class/insert' }}">
                                @csrf
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Class *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" class="form-control @error('class') is-invalid @enderror"
                                            name="class" value="{{ old('class', isset($class) ? $class->class : '') }}">
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
                                        <select name="section" class="form-control @error('section') is-invalid @enderror">
                                            <option value="">Select Section</option>
                                            @foreach ($sections as $sectionId => $sectionName)
                                                <option value="{{ $sectionId }}"
                                                    {{ old('section', isset($class) ? $class->section : '') == $sectionId ? 'selected' : '' }}>
                                                    {{ $sectionName }}
                                                </option>
                                            @endforeach
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
                                            @if (isset($class))
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
