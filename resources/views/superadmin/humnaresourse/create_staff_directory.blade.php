@extends('admin.main')
@section('content')
    <style>
        label.error {
            color: red;
        }
    </style>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Student Admission</h3>
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
                            <form id="staff_directoryForm" data-parsley-validate class="form-horizontal form-label-left"
                                action="{{ isset($staff_directory) ? route('update.staff.directory', $staff_directory->id) : route('insert.staff.directory') }}"
                                enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3 col-sm-3">
                                        <label>Staff ID *</label>
                                        <input type="number"
                                            class="form-control @error('date_of_birth') is-invalid @enderror"
                                            name="staff_id"
                                            value="{{ old('staff_id', isset($staff_directory) ? $staff_directory->staff_id : '') }}">
                                        @error('staff_id')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <label>Role *</label>
                                        <select class="form-control @error('role') is-invalid @enderror" name="role">
                                            <option value="">Select a Role</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role }}"
                                                    {{ old('role', $staff_directory->role) == $role ? 'selected' : '' }}>
                                                    {{ $role }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('role')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="col-md-3 col-sm-3">
                                        <label>Designation *</label>
                                        <select class="form-control @error('designation') is-invalid @enderror"
                                            name="designation" id="designation">
                                            <option value="">Select a Designation</option>
                                            @foreach ($designations as $designation)
                                                <option value="{{ $designation }}"
                                                    {{ old('designation', $staff_directory->designation) == $designation ? 'selected' : '' }}>
                                                    {{ $designation }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('designation')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="col-md-3 col-sm-3">
                                        <label>Department *</label>
                                        <select class="form-control @error('department') is-invalid @enderror"
                                            name="department" id="department">
                                            <option value="">Select a Department</option>
                                            @foreach ($departments as $department)
                                                <option value="{{ $department }}"
                                                    {{ old('department', $staff_directory->department) == $department ? 'selected' : '' }}>
                                                    {{ $department }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('department')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-3 col-sm-3 form-group has-feedback">
                                        <input type="text"
                                            class="form-control has-feedback-left @error('date_of_birth') is-invalid @enderror"
                                            placeholder="First Name" name="first_name"
                                            value="{{ old('first_name', isset($staff_directory) ? $staff_directory->first_name : '') }}">
                                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                        @error('first_name')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-3 col-sm-3 form-group has-feedback">
                                        <input type="text" class="form-control" placeholder="Last Name" name="last_name"
                                            value="{{ old('last_name', isset($staff_directory) ? $staff_directory->last_name : '') }}">
                                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <input type="text" class="form-control" name="father_name"
                                            value="{{ old('father_name', isset($staff_directory) ? $staff_directory->father_name : '') }}"
                                            placeholder="Father Name">
                                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                        <input type="text" class="form-control"
                                            name="mother_name"value="{{ old('mother_name', isset($staff_directory) ? $staff_directory->mother_name : '') }}"
                                            placeholder="Mother Name">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-3 col-sm-3 form-group">
                                        <label>Email (Login Username) *</label>
                                        <div class="input-group">
                                            <input type="email"
                                                class="form-control @error('date_of_birth') is-invalid @enderror"
                                                placeholder="Email (Login Username)" name="email"
                                                value="{{ old('email', isset($staff_directory) ? $staff_directory->email : '') }}">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-envelope"></i>
                                                </span>
                                            </div>
                                            @error('email')
                                                <span class="invalid-feedback" style="color: red">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-3">
                                        <label>Gender *</label>
                                        <select class="form-control @error('date_of_birth') is-invalid @enderror"
                                            name="gender">
                                            <option value=""
                                                {{ old('gender', isset($staff_directory) ? $staff_directory->gender : '') == '' ? 'selected' : '' }}>
                                                Select..</option>
                                            <option value="male"
                                                {{ old('gender', isset($staff_directory) ? $staff_directory->gender : '') == 'male' ? 'selected' : '' }}>
                                                Male</option>
                                            <option value="female"
                                                {{ old('gender', isset($staff_directory) ? $staff_directory->gender : '') == 'female' ? 'selected' : '' }}>
                                                Female</option>
                                        </select>
                                        @error('gender')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <label>Date of Birth *</label>
                                        <input
                                            class="date-picker form-control @error('date_of_birth') is-invalid @enderror"
                                            placeholder="dd-mm-yyyy" type="date" name="date_of_birth"
                                            value="{{ old('date_of_birth', isset($staff_directory) ? $staff_directory->date_of_birth : '') }}">
                                        @error('date_of_birth')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <label>Date of Joining *</label>
                                        <input
                                            class="date-picker form-control @error('date_of_joining') is-invalid @enderror"
                                            placeholder="dd-mm-yyyy" type="date" name="date_of_joining"
                                            value="{{ old('date_of_joining', isset($staff_directory) ? $staff_directory->date_of_joining : '') }}">
                                    </div>
                                </div>

                                <div class="row mt-1">
                                    <div class="col-md-4 col-sm-4 form-group">
                                        <label>Phone *</label>
                                        <div class="input-group">
                                            <input type="tel" class="form-control" placeholder="Mobile Number"
                                                name="phone"
                                                value="{{ old('phone', isset($staff_directory) ? $staff_directory->phone : '') }}">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-phone"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 form-group">
                                        <label>Emergency Contact Number *</label>
                                        <div class="input-group">
                                            <input type="tel" class="form-control" placeholder="Mobile Number"
                                                name="emergency_contact_number"
                                                value="{{ old('emergency_contact_number', isset($staff_directory) ? $staff_directory->emergency_contact_number : '') }}">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-phone"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-2">
                                        <label>Photo *</label> <input type="file" class="form-control" name="photo">
                                    </div>
                                    <div class="col-md-2 col-sm-2">
                                        @if (isset($staff_directory) && $staff_directory->photo)
                                            <img src="{{ asset('photos/' . $staff_directory->photo) }}" alt="Image"
                                                width="100" height="100">
                                        @else
                                            No Photo Available
                                        @endif
                                    </div>
                                </div>

                                <div class="row mt-1">
                                    <div class="col-md-6 col-sm-6 form-group">
                                        <label>Address*</label>
                                        <textarea name="address" class="form-control @error('address') is-invalid @enderror" rows="2">{{ isset($staff_directory->address) ? $staff_directory->address : '' }}</textarea>
                                    </div>
                                    <div class="col-md-6 col-sm-6 form-group">
                                        <label>Permanent Address *</label>
                                        <textarea name="permanent_address" class="form-control @error('permanent_address') is-invalid @enderror"
                                            rows="2">{{ isset($staff_directory->permanent_address) ? $staff_directory->permanent_address : '' }}</textarea>
                                    </div>
                                </div>

                                <div class="row mt-1">
                                    <div class="col-md-6 col-sm-6 form-group">
                                        <label>Work Experience *</label>
                                        <textarea name="work_experience" class="form-control @error('work_experience') is-invalid @enderror" rows="2">{{ isset($staff_directory->work_experience) ? $staff_directory->work_experience : '' }}</textarea>
                                    </div>
                                    <div class="col-md-6 col-sm-6 form-group">
                                        <label>Note *</label>
                                        <textarea name="note" class="form-control @error('note') is-invalid @enderror" rows="2">{{ isset($staff_directory->note) ? $staff_directory->note : '' }}</textarea>
                                    </div>
                                </div>

                                <div class="row mt-1">
                                    <div class="col-md-6 col-sm-6 form-group">
                                        <label>Qualification *</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="qualification"
                                                value="{{ old('qualification', isset($staff_directory) ? $staff_directory->qualification : '') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 form-group">
                                        <label>PAN Number *</label>
                                        <div class="input-group">
                                            <input type="number"
                                                class="form-control @error('pan_number') is-invalid @enderror"
                                                name="pan_number"
                                                value="{{ old('pan_number', isset($staff_directory) ? $staff_directory->pan_number : '') }}">
                                            @error('pan_number')
                                                <span class="invalid-feedback" style="color: red">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="x_title mt-1">
                                    <h2>Add More Details</h2>
                                    <ul class="nav navbar-right panel_toolbox"></ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_title mt-1" style="background-color:#f2f2f2;">
                                    <h2>Payroll</h2>
                                    <ul class="nav navbar-right panel_toolbox"></ul>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="row mt-1">
                                    <div class="col-md-4 col-sm-4 form-group">
                                        <label>EPF No. *</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="epf_number"
                                                value="{{ old('epf_number', isset($staff_directory) ? $staff_directory->epf_number : '') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 form-group">
                                        <label>Basic Salary *</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="basic_salary"
                                                value="{{ old('basic_salary', isset($staff_directory) ? $staff_directory->basic_salary : '') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 form-group">
                                        <label>Work Shift *</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="work_shift"
                                                value="{{ old('work_shift', isset($staff_directory) ? $staff_directory->work_shift : '') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-1">
                                    <div class="col-md-12 col-sm-12 form-group">
                                        <label>Work Location *</label>
                                        <textarea name="work_location" class="form-control @error('work_location') is-invalid @enderror" rows="2">{{ isset($staff_directory->work_location) ? $staff_directory->work_location : '' }}</textarea>
                                    </div>

                                </div>

                                <div class="x_title mt-1" style="background-color:#f2f2f2;">
                                    <h2>Bank Account Details</h2>
                                    <ul class="nav navbar-right panel_toolbox"></ul>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="row mt-1">
                                    <div class="col-md-4 col-sm-4 form-group">
                                        <label>Account Title *</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="bank_account_title"
                                                value="{{ old('bank_account_title', isset($staff_directory) ? $staff_directory->bank_account_title : '') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 form-group">
                                        <label>Bank Account Number *</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="bank_account_number"
                                                value="{{ old('bank_account_number', isset($staff_directory) ? $staff_directory->bank_account_number : '') }}">
                                        </div>
                                        @error('bank_account_number')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-4 form-group">
                                        <label>Bank Name *</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="bank_name"
                                                value="{{ old('bank_name', isset($staff_directory) ? $staff_directory->bank_name : '') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-1">
                                    <div class="col-md-6 col-sm-6 form-group">
                                        <label>IFSC Code *</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="ifsc_code"
                                                value="{{ old('ifsc_code', isset($staff_directory) ? $staff_directory->ifsc_code : '') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 form-group">
                                        <label>Bank Branch Name *</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="bank_branch_name"
                                                value="{{ old('bank_branch_name', isset($staff_directory) ? $staff_directory->bank_branch_name : '') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="x_title mt-1" style="background-color:#f2f2f2;">
                                    <h2></h2>
                                    <ul class="nav navbar-right panel_toolbox"></ul>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="row mt-1">
                                    <div class="col-md-6 col-sm-6 form-group">
                                        <label>Facebook URL *</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="facebook_url"
                                                value="{{ old('facebook_url', isset($staff_directory) ? $staff_directory->facebook_url : '') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 form-group">
                                        <label>Twitter URL *</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="twitter_url"
                                                value="{{ old('twitter_url', isset($staff_directory) ? $staff_directory->twitter_url : '') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-1">
                                    <div class="col-md-6 col-sm-6 form-group">
                                        <label>Linkedin URL *</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="linkedin_url"
                                                value="{{ old('linkedin_url', isset($staff_directory) ? $staff_directory->linkedin_url : '') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 form-group">
                                        <label>Instagram URL *</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="instagram_url"
                                                value="{{ old('instagram_url', isset($staff_directory) ? $staff_directory->instagram_url : '') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="x_title mt-1" style="background-color:#f2f2f2;">
                                    <h2>Upload Documents</h2>
                                    <ul class="nav navbar-right panel_toolbox"></ul>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="row mt-1">
                                    <div class="col-md-6 col-sm-6" style="display: flex; align-items: center;">
                                        <label style="margin-right: 66px;">1. Resume *</label>
                                        <div style="flex: 1;">
                                            <input type="file" class="form-control" name="resume">
                                            @if (isset($staff_directory) && $staff_directory->resume)
                                                <p>{{ basename($staff_directory->resume) }}</p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6" style="display: flex; align-items: center;">
                                        <label style="margin-right: 33px;">2. Joining Letter *</label>
                                        <div style="flex: 1;">
                                            <input type="file" class="form-control" name="joining_letter">
                                            @if (isset($staff_directory) && $staff_directory->joining_letter)
                                                <p>{{ basename($staff_directory->joining_letter) }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-1">
                                    <div class="col-md-6 col-sm-6" style="display: flex; align-items: center;">
                                        <label style="margin-right: 10px;">3. Resignation Letter *</label>
                                        <div style="flex: 1;">
                                            <input type="file" class="form-control" name="resignation_letter">
                                            @if (isset($staff_directory) && $staff_directory->resignation_letter)
                                                <p>{{ basename($staff_directory->resignation_letter) }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6" style="display: flex; align-items: center;">
                                        <label style="margin-right: 10px;">4. Other Documents *</label>
                                        <div style="flex: 1;">
                                            <input type="file" class="form-control" name="other_documents">
                                            @if (isset($staff_directory) && $staff_directory->other_documents)
                                                <p>{{ basename($staff_directory->other_documents) }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-12 col-sm-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-secondary">
                                            @if (isset($staff_directory))
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
