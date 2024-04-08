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
                    <h3>{{ isset($exam) ? 'Edit Exam' : 'Add Exam' }}</h3>
                </div>
                <div class="button-container">
                    <a href="{{ route('exam') }}"><button type="button" class="btn btn-primary btn-sm mt-1">View
                            Exam</button></a>
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
                                action="{{ isset($exam) ? route('update.exam', ['id' => $exam->id]) : route('insert.exam') }}">
                                @csrf
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Exam Group *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select name="exam_group"
                                            class="form-control @error('exam_group') is-invalid @enderror">
                                            <option value="">Select Exam group</option>
                                            @foreach ($exam_group_name as $group)
                                                <option value="{{ $group }}"
                                                    {{ old('exam_group', isset($exam) ? $exam->exam_group : '') == $group ? 'selected' : '' }}>
                                                    {{ $group }}</option>
                                            @endforeach
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
                                        <input type="text" name="exam"
                                            class="form-control @error('exam') is-invalid @enderror"
                                            value="{{ old('exam', isset($exam) ? $exam->exam : '') }}" />
                                        @error('exam')
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
