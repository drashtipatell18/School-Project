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
                    <h3>{{ isset($expenses_head) ? 'Edit Expenses' : 'Add Expenses' }}</h3>
                </div>
                <div class="button-container">
                    <a href="{{ route('expenses.head') }}"><button type="button" class="btn btn-primary btn-sm mt-1">View
                            Expenses</button></a>
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
                            <h2>{{ isset($expenses_head) ? 'Edit a Record' : 'Create a new Record' }}</h2>
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                                method="POST"
                                action="{{ isset($expenses_head) ? '/admin/expenses/head/update/' . $expenses_head->id : '/admin/expenses/head/insert' }}">
                                @csrf

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Expenses Head *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text"
                                            class="form-control @error('expenses_head') is-invalid @enderror"
                                            name="expenses_head"
                                            value="{{ old('expenses_head', isset($expenses_head) ? $expenses_head->expenses_head : '') }}">
                                        @error('expenses_head')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Description *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea class="form-control" name="description" rows="4">{{ old('description', isset($expenses_head) ? $expenses_head->description : '') }}</textarea>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <button type="submit" class="btn btn-primary">
                                            @if (isset($expenses_head))
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
