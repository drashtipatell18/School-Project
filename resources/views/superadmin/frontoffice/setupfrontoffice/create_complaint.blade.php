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
                    <h3>{{ isset($complaint) ? 'Edit Complain' : 'Add Complain' }}</h3>
                </div>
                <div class="button-container">
                    <a href="{{ route('complaint') }}"><button type="button" class="btn btn-primary btn-sm mt-1">Complaint
                            List</button></a>
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
                            <h2>{{ isset($complaint) ? 'Edit a Record' : 'Create a new Record' }}</h2>
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                                method="POST"
                                action="{{ isset($complaint) ? '/admin/complaint/update/' . $complaint->id : '/admin/complaint/insert' }}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Complaint Type *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select name="complaint_type"
                                            class="form-control @error('complaint_type') is-invalid @enderror">
                                            <option value="">Select Complaint Type</option>
                                            @foreach ($complaint_type as $complaint_type_value => $complaint_type_label)
                                                <option value="{{ $complaint_type_value }}"
                                                    {{ old('complaint_type') == $complaint_type_value || (isset($complaint) && $complaint->complaint_type == $complaint_type_value) ? 'selected' : '' }}>
                                                    {{ $complaint_type_label }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @error('complaint_type')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Source*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select name="source" class="form-control @error('source') is-invalid @enderror">
                                            <option value="">Select Source</option>
                                            @foreach ($sources as $source_id => $source_name)
                                                <option value="{{ $source_id }}"
                                                    {{ old('source') == $source_id || (isset($complaint) && $complaint->source == $source_id) ? 'selected' : '' }}>
                                                    {{ $source_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('source')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Complain By *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text"
                                            class="form-control @error('complain_by') is-invalid @enderror"
                                            name="complain_by"
                                            value="{{ old('complain_by', isset($complaint) ? $complaint->complain_by : '') }}">
                                        @error('complain_by')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Phone
                                        *</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="middle-name" class="form-control @error('phone') is-invalid @enderror"
                                            type="number" name="phone"
                                            value="{{ old('phone', $complaint->phone ?? '') }}">
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
                                            name="date" value="{{ old('date', $complaint->date ?? '') }}">
                                        @error('date')
                                            <span style="color: red"
                                                class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Description *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea class="form-control" name="description" rows="4">{{ old('description', isset($complaint) ? $complaint->description : '') }}</textarea>
                                    </div>
                                </div>


                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Action Taken *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text"
                                            class="form-control @error('action_taken') is-invalid @enderror"
                                            name="action_taken"
                                            value="{{ old('action_taken', isset($complaint) ? $complaint->action_taken : '') }}">
                                        @error('action_taken')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Assigned *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" class="form-control @error('assigned') is-invalid @enderror"
                                            name="assigned"
                                            value="{{ old('assigned', isset($complaint) ? $complaint->assigned : '') }}">
                                        @error('assigned')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Note *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea class="form-control" name="note" rows="4">{{ old('note', isset($complaint) ? $complaint->note : '') }}</textarea>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Attach Document*</label>
                                    <div class="col-md-6 col-sm-6">
                                        @if (isset($complaint) && $complaint->attach_document)
                                            <img src="{{ asset('storage/attach_documents/' . $complaint->attach_document) }}"
                                                alt="Uploaded Document" width="100">
                                            <input type="file" class="form-control" name="attach_document">
                                            <p class="mt-1">{{ $complaint->attach_document }}</p>
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
                                            @if (isset($complaint))
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
