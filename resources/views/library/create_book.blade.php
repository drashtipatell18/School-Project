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
                    <h3>{{ isset($books) ? 'Edit Book' : 'Add Book' }}</h3>
                </div>
                <div class="button-container">
                    <a href="{{ route('books') }}"><button type="button" class="btn btn-primary btn-sm mt-1">View
                            Books </button></a>
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
                            <h2>{{ isset($books) ? 'Edit a Record' : 'Create a new Record' }}</h2>
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                                method="POST"
                                action="{{ isset($books) ? '/admin/book/update/' . $books->id : '/admin/book/insert' }}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"> Title*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" name="title" value="<?php echo isset($books->title) ? $books->title : ''; ?>"
                                            class="form-control @error('title') is-invalid @enderror">
                                        @error('title')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"> Book No*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" name="bookno" value="<?php echo isset($books->bookno) ? $books->bookno : ''; ?>"
                                            class="form-control @error('bookno') is-invalid @enderror">
                                        @error('bookno')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"> ISBN No*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" name="isbnno" value="<?php echo isset($books->isbnno) ? $books->isbnno : ''; ?>"
                                            class="form-control @error('isbnno') is-invalid @enderror">
                                        @error('isbnno')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"> Publisher*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" name="publisher" value="<?php echo isset($books->publisher) ? $books->publisher : ''; ?>"
                                            class="form-control @error('publisher') is-invalid @enderror">
                                        @error('publisher')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"> Author*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" name="author" value="<?php echo isset($books->author) ? $books->author : ''; ?>"
                                            class="form-control @error('author') is-invalid @enderror">
                                        @error('author')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"> Subject*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" name="subject" value="<?php echo isset($books->subject) ? $books->subject : ''; ?>"
                                            class="form-control @error('subject') is-invalid @enderror">
                                        @error('subject')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"> Rack No*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" name="rackno" value="<?php echo isset($books->subject) ? $books->subject : ''; ?>"
                                            class="form-control @error('subject') is-invalid @enderror">
                                        @error('subject')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"> Qty*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" name="qty" value="<?php echo isset($books->qty) ? $books->qty : ''; ?>"
                                            class="form-control @error('qty') is-invalid @enderror">
                                        @error('qty')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"> Available*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" name="available" value="<?php echo isset($books->available) ? $books->available : ''; ?>"
                                            class="form-control @error('available') is-invalid @enderror">
                                        @error('available')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"> Price*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" name="price" value="<?php echo isset($books->price) ? $books->price : ''; ?>"
                                            class="form-control @error('price') is-invalid @enderror">
                                        @error('price')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Post Date*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="date"
                                            class="form-control @error('postdate') is-invalid @enderror" name="postdate"
                                            value="{{ old('postdate', $books->postdate ?? '') }}">
                                        @error('postdate')
                                            <span style="color: red"
                                                class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Description*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="2">{{ isset($books->description) ? $books->description : '' }}</textarea>
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
                                            @if (isset($books))
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
