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
                    <h3>{{ isset($users) ? 'Edit User' : 'Add User' }}</h3>
                </div>
                <div class="button-container">
                    <a href="{{ route('users') }}"><button type="button" class="btn btn-primary btn-sm mt-1">View
                            Users </button></a>
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
                            <h2>{{ isset($users) ? 'Edit a Record' : 'Create a new Record' }}</h2>
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                                method="POST"
                                action="{{ isset($users) ? '/admin/user/update/' . $users->id : '/admin/user/insert' }}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"> Name*</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" name="name" value="<?php echo isset($users) ? $users->name : ''; ?>"
                                            class="form-control @error('name') is-invalid @enderror">
                                        @error('name')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Role *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select id="role" name="role"
                                            class="form-control @error('role') is-invalid @enderror">
                                            <option value="">Select</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role }}"
                                                    @if (old('role', isset($users->role) ? $users->role : '') == $role) selected @endif>
                                                    {{ $role }}</option>
                                            @endforeach
                                        </select>
                                        @error('role')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Email *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="<?php echo isset($users->email) ? $users->email : ''; ?>">
                                        @error('email')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                @if (!isset($users))
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">PassWord *</label>
                                        <div class="col-md-6 col-sm-6">
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                value="<?php echo isset($users->password) ? $users->password : ''; ?>">
                                            @error('password')
                                                <span class="invalid-feedback" style="color: red">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                @endif

                                @if (isset($users) && $users->image)
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Old Image *</label>
                                        <input type="hidden" value="{{ $users->image }}">
                                        <img src="{{ asset('images/' . $users->image) }}" alt="Image" width="100">
                                    </div>
                                @endif

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Image *</label>
                                    <input type="file" class="form-control col-md-3 col-sm-3 ml-2" name="image">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert" style="color: red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <button type="submit" class="btn btn-primary">
                                            @if (isset($users))
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
