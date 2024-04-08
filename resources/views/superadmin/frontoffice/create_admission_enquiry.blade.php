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
                    <h3>{{ isset($admission_enquiry) ? 'Edit Admission Enquiry' : 'Add Admission Enquiry' }}</h3>
                </div>
                <div class="button-container">
                    <a href="{{ route('admission.enquiry') }}"><button type="button"
                            class="btn btn-primary btn-sm mt-1">Admission
                            Enquiry List</button></a>
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
                            <h2>{{ isset($admission_enquiry) ? 'Edit a Record' : 'Create a new Record' }}</h2>
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                                method="POST"
                                action="{{ isset($admission_enquiry) ? '/admin/admission/enquiry/update/' . $admission_enquiry->id : '/admin/admission/enquiry/insert' }}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Name *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name"
                                            value="{{ old('name', isset($admission_enquiry) ? $admission_enquiry->name : '') }}">
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
                                            value="{{ old('phone', isset($admission_enquiry) ? $admission_enquiry->phone : '') }}">
                                        @error('phone')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Email
                                        *</label>
                                    <div class="col-md-6 col-sm-6 form-group has-feedback">
                                        <input type="email" class="form-control has-feedback-left" placeholder="Email"
                                            name="email"
                                            value="{{ old('email', isset($admission_enquiry) ? $admission_enquiry->email : '') }}">
                                        <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Address *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea class="form-control" name="address" rows="4">{{ old('address', isset($admission_enquiry) ? $admission_enquiry->address : '') }}</textarea>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Description *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea class="form-control" name="description" rows="4">{{ old('description', isset($admission_enquiry) ? $admission_enquiry->description : '') }}</textarea>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Note *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea class="form-control" name="note" rows="4">{{ old('note', isset($admission_enquiry) ? $admission_enquiry->note : '') }}</textarea>
                                    </div>
                                </div>


                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Date *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="date" class="form-control @error('date') is-invalid @enderror"
                                            name="date"
                                            value="{{ old('date', isset($admission_enquiry) ? $admission_enquiry->date : '') }}">
                                        @error('date')
                                            <span style="color: red"
                                                class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>





                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Next Follow Up Date
                                        *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="date"
                                            class="form-control @error('next_follow_up_date') is-invalid @enderror"
                                            name="next_follow_up_date"
                                            value="{{ old('next_follow_up_date', isset($admission_enquiry) ? $admission_enquiry->next_follow_up_date : '') }}">
                                        @error('next_follow_up_date')
                                            <span style="color: red"
                                                class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Assigned *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select name="staff" class="form-control @error('staff') is-invalid @enderror">
                                            <option value="">Select Assigned</option>
                                            @foreach ($teachers as $staff_id => $staff)
                                                <option value="{{ $staff_id }}"
                                                    {{ old('staff') == $staff_id ? 'selected' : '' }}>
                                                    {{ $staff }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('staff')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Reference *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select name="reference"
                                            class="form-control @error('reference') is-invalid @enderror">
                                            <option value="">Select Staff</option>
                                            @foreach ($teachers as $reference_id => $reference)
                                                <option value="{{ $reference_id }}"
                                                    {{ old('reference') == $reference_id ? 'selected' : '' }}>
                                                    {{ $reference }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('reference')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Source *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select name="source" class="form-control @error('source') is-invalid @enderror">
                                            <option value="">Select Source</option>
                                            @foreach ($sources as $source_id => $source)
                                                <option value="{{ $source_id }}"
                                                    {{ old('source') == $source_id ? 'selected' : '' }}>
                                                    {{ $source }}
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
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Class *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select name="class" class="form-control @error('class') is-invalid @enderror">
                                            <option value="">Select Class</option>
                                            @foreach ($class as $className)
                                                <!-- Changed loop variable name -->
                                                <option value="{{ $className }}"
                                                    {{ old('class', isset($admission_enquiry) ? $admission_enquiry->class : '') == $className ? 'selected' : '' }}>
                                                    {{ $className }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('class')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Number
                                        Of Child
                                        *</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="middle-name"
                                            class="form-control @error('number_of_child') is-invalid @enderror"
                                            type="number" name="number_of_child"
                                            value="{{ old('number_of_child', $admission_enquiry->number_of_child ?? '') }}">
                                        @error('number_of_child')
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
                                            @if (isset($admission_enquiry))
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
