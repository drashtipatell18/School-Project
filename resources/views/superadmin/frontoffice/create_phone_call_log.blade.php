@extends('admin.main')
@section('content')
    <style>
        .button-container {
            display: flex;
            justify-content: flex-end;
        }
    </style>
    <div class="right_col" role="main">
        <div>
            <div class="page-title">
                <div class="title_left">
                    <h3>{{ isset($phone_call_log) ? 'Edit Phone Call Log' : 'Add Phone Call Log' }}</h3>
                </div>
                <div class="button-container">
                    <a href="{{ route('phone.call.log') }}"><button type="button" class="btn btn-primary btn-sm mt-1">Phone
                            Call Log List</button></a>
                </div>
            </div>
            <div class="clearfix"></div>
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
                            <h2>{{ isset($phone_call_log) ? 'Edit a Record' : 'Create a new Record' }}</h2>
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                                method="POST"
                                action="{{ isset($phone_call_log) ? '/admin/phone/call/log/update/' . $phone_call_log->id : '/admin/phone/call/log/insert' }}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Name *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name"
                                            value="{{ old('name', isset($phone_call_log) ? $phone_call_log->name : '') }}">
                                        @error('name')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Phone
                                        *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input id="middle-name" class="form-control @error('phone') is-invalid @enderror"
                                            type="number" name="phone"
                                            value="{{ old('phone', isset($phone_call_log) ? $phone_call_log->phone : '') }}">
                                        @error('phone')
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
                                            name="date"
                                            value="{{ old('date', isset($phone_call_log) ? $phone_call_log->date : '') }}">
                                        @error('date')
                                            <span style="color: red"
                                                class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Description *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea class="form-control" name="description" rows="4">{{ old('description', isset($phone_call_log) ? $phone_call_log->description : '') }}</textarea>
                                    </div>
                                </div>


                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Next Follow Up Date
                                        *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="date"
                                            class="form-control @error('next_follow_up_date') is-invalid @enderror"
                                            name="next_follow_up_date"
                                            value="{{ old('next_follow_up_date', isset($phone_call_log) ? $phone_call_log->next_follow_up_date : '') }}">
                                        @error('next_follow_up_date')
                                            <span style="color: red"
                                                class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Call
                                        Duration
                                        *</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="middle-name"
                                            class="form-control @error('call_duration') is-invalid @enderror" type="number"
                                            name="call_duration"
                                            value="{{ old('call_duration', $phone_call_log->call_duration ?? '') }}">
                                        @error('call_duration')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Note *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea class="form-control" name="note" rows="4">{{ old('note', isset($phone_call_log) ? $phone_call_log->note : '') }}</textarea>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Call Type *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <label style="margin-right: 20px;">
                                            <input type="radio" name="call_type" value="Incoming"
                                                {{ old('call_type', isset($phone_call_log) && $phone_call_log->call_type == 'Incoming' ? 'checked' : '') }}class="mt-2">
                                            Incoming
                                        </label>
                                        <label>
                                            <input type="radio" name="call_type" value="Outgoing"
                                                {{ old('call_type', isset($phone_call_log) && $phone_call_log->call_type == 'Outgoing' ? 'checked' : '') }}
                                                class="mt-2">
                                            Outgoing
                                        </label>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        @error('call_type')
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
                                            @if (isset($phone_call_log))
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
