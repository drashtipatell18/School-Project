@extends('layouts.app')

@section('content')
    <section class="form-02-main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="_lk_de">
                        <div class="form-03-main">
                            <div class="logo">
                                <img src="assets/images/user.png">
                            </div>
                            <h3 class="text-center">Change Password</h3>

                            <form method="POST" action="{{ route('changePassword') }}" class="login">
                                @csrf
                                <div class="form-group">
                                    <input type="password" name="current_password" value=""
                                        class="form-control @error('current_password') is-invalid @enderror"
                                        placeholder="Current Password">
                                    @error('current_password')
                                        <span class="invalid-feedback" style="color: red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                                        name="new_password" value="" placeholder="New Password">
                                    @error('new_password')
                                        <span class="invalid-feedback" style="color: red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password"
                                        class="form-control @error('confirm_password') is-invalid @enderror"
                                        name="confirm_password" value="" placeholder="Confirm Password">
                                    @error('confirm_password')
                                        <span class="invalid-feedback" style="color: red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="_btn_04">{{ __('Change Password') }}</button>
                                </div>
                            </form>

                            <div class="form-group pt-0">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
