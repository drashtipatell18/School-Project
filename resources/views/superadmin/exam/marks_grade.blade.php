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
                    <h3>{{ isset($marks_grade) ? 'Edit Marks Grade' : 'Add Marks Grade' }}</h3>
                </div>
                <div class="button-container">
                    <a href="{{ route('marksgrade') }}"><button type="button" class="btn btn-primary btn-sm mt-1">View Grade
                            List</button></a>
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
                            <h2>{{ isset($marks_grade) ? 'Edit a Record' : 'Create a new Record' }}</h2>
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                                method="POST"
                                action="{{ isset($marks_grade) ? route('update.marksgrade', $marks_grade->id) : route('insert.marksgrade') }}">
                                @csrf
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Exam Type *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select class="form-control @error('exam_type') is-invalid @enderror"
                                            name="exam_type">
                                            <option value="">Select Exam Type</option>
                                            @foreach ($exam_types as $exam_ty)
                                                <option value="{{ $exam_ty->exam_type }}"
                                                    {{ old('exam_type', isset($marks_grade) && $marks_grade->exam_type == $exam_ty->exam_type ? 'selected' : '') }}>
                                                    {{ $exam_ty->exam_type }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('exam_type')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Grade Name *</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" class="form-control @error('grade_name') is-invalid @enderror"
                                            name="grade_name"
                                            value="{{ old('grade_name', isset($marks_grade) ? $marks_grade->grade_name : '') }}">
                                        @error('grade_name')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Percent Upto *</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text"
                                            class="form-control @error('percent_from') is-invalid @enderror"
                                            name="percent_from"
                                            value="{{ old('percent_from', isset($marks_grade) ? $marks_grade->percent_from : '') }}">
                                        @error('percent_from')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Percent From *</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text"
                                            class="form-control @error('percent_upto') is-invalid @enderror"
                                            name="percent_upto"
                                            value="{{ old('percent_upto', isset($marks_grade) ? $marks_grade->percent_upto : '') }}">
                                        @error('percent_upto')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Grade Point *</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text"
                                            class="form-control @error('grade_point') is-invalid @enderror"
                                            name="grade_point"
                                            value="{{ old('grade_point', isset($marks_grade) ? $marks_grade->grade_point : '') }}">
                                        @error('grade_point')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Description *</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text"
                                            class="form-control @error('description') is-invalid @enderror"
                                            name="description"
                                            value="{{ old('description', isset($marks_grade) ? $marks_grade->description : '') }}">
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
                                            @if (isset($marks_grade))
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
