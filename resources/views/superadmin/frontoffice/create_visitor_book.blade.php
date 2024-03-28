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
                    <h3>Add Visitor</h3>
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
                <a href="{{ route('visitor.book') }}"><button type="button" class="btn btn-primary btn-sm mb-2">
                        Visitor List</button></a>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
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
                            <h2>{{ isset($visitor_book) ? 'Edit a Record' : 'Create a new Record' }}</h2>
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                                method="POST"
                                action="{{ isset($visitor_book) ? '/admin/visitor/book/update/' . $visitor_book->id : '/admin/visitor/book/insert' }}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Purpose *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select name="purpose" class="form-control @error('purpose') is-invalid @enderror">
                                            <option value="">Select Purpose</option>
                                            @foreach ($purposes as $purpose_id => $purpose)
                                                <option value="{{ $purpose_id }}"
                                                    {{ old('purpose') == $purpose_id ? 'selected' : '' }}>
                                                    {{ $purpose }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @error('purpose')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                {{-- <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Purpose *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select name="purpose" class="form-control @error('purpose') is-invalid @enderror">
                                            <option value="">Select Purpose</option>
                                            @foreach ($purposes as $purpose_id => $purpose)
                                                <option value="{{ $purpose_id }}"
                                                    {{ old('purpose') == $purpose_id ? 'selected' : '' }}>
                                                    {{ $purpose }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @error('purpose')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div> --}}



                                <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Reference
                                        No
                                        *</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="middle-name"
                                            class="form-control @error('reference_no') is-invalid @enderror" type="number"
                                            name="reference_no"
                                            value="{{ old('reference_no', $visitor_book->reference_no ?? '') }}">
                                        @error('reference_no')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Address *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea class="form-control" name="address" rows="4">{{ old('address', isset($visitor_book) ? $visitor_book->address : '') }}</textarea>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Note *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea class="form-control" name="note" rows="4">{{ old('note', isset($visitor_book) ? $visitor_book->note : '') }}</textarea>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">To Title *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" class="form-control @error('to_title') is-invalid @enderror"
                                            name="to_title"
                                            value="{{ old('to_title', isset($visitor_book) ? $visitor_book->to_title : '') }}">
                                        @error('to_title')
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
                                            name="date" value="{{ old('date', $visitor_book->date ?? '') }}">
                                        @error('date')
                                            <span style="color: red"
                                                class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Attach Document*</label>
                                    <div class="col-md-6 col-sm-6">
                                        @if (isset($visitor_book) && $visitor_book->attach_document)
                                            <img src="{{ asset('storage/attach_documents/' . $visitor_book->attach_document) }}"
                                                alt="Uploaded Document" width="100">
                                            <input type="file" class="form-control" name="attach_document">
                                            <p class="mt-1">{{ $visitor_book->attach_document }}</p>
                                        @else
                                            <input type="file" class="form-control" name="attach_document">
                                            <span class="invalid-feedback" style="color: red">Please select a file</span>
                                        @endif
                                    </div>
                                </div>


                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <button type="submit" class="btn btn-primary">
                                            @if (isset($visitor_book))
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
