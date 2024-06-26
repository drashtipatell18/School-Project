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
                    <h3>{{ isset($events) ? 'Edit Event' : 'Add Event' }}</h3>
                </div>
                <div class="button-container">
                    <a href="{{ route('events') }}"><button type="button" class="btn btn-primary btn-sm mt-1">View
                            Event </button></a>
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
                            <h2>{{ isset($events) ? 'Edit a Record' : 'Create a new Record' }}</h2>
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                                method="POST"
                                action="{{ isset($events) ? '/admin/event/update/' . $events->id : '/admin/event/insert' }}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"> Title*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" name="title" value="<?php echo isset($events->title) ? $events->title : ''; ?>"
                                            class="form-control @error('title') is-invalid @enderror">
                                        @error('title')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Venue*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" name="venue" value="<?php echo isset($events->venue) ? $events->venue : ''; ?>"
                                            class="form-control @error('venue') is-invalid @enderror">
                                        @error('venue')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Start Date *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="date" class="form-control @error('startdate') is-invalid @enderror"
                                            name="startdate" value="{{ old('startdate', $events->startdate ?? '') }}">
                                        @error('startdate')
                                            <span style="color: red"
                                                class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">End Date *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="date" class="form-control @error('enddate') is-invalid @enderror"
                                            name="enddate" value="{{ old('enddate', $events->enddate ?? '') }}">
                                        @error('enddate')
                                            <span style="color: red"
                                                class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Description*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="2">{{ isset($events->description) ? $events->description : '' }}</textarea>
                                        @error('description')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                @if (isset($events) && $events->image)
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Old Image *</label>                                   
                                        <input type="hidden" value="{{ $events->image}}">
                                        <img src="{{ asset('events/' . $events->image) }}" alt="Image" width="100">
                                </div>
                                @endif

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Image*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <label for="admissionno">Image *</label>
                                        <input type="file" class="form-control" name="image">
                                        @error('image')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"></label>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="x_title mt-3">
                                            <h2>SEO Details</h2>
                                            <ul class="nav navbar-right panel_toolbox"></ul>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>


                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Meta Title*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" name="metatitle" value="<?php echo isset($events->metatitle) ? $events->metatitle : ''; ?>"
                                            class="form-control @error('metatitle') is-invalid @enderror">
                                        @error('metatitle')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Meta Keyword*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" name="metakeyword" value="<?php echo isset($events->metakeyword) ? $events->metakeyword : ''; ?>"
                                            class="form-control @error('metakeyword') is-invalid @enderror">
                                        @error('metatitle')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Meta Description*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea name="metadescription" class="form-control @error('metadescription') is-invalid @enderror" rows="2">{{ isset($events->metadescription) ? $events->metadescription : '' }}</textarea>
                                        @error('metadescription')
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
                                            @if (isset($events))
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
