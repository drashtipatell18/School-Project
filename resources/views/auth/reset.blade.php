@extends('layouts.app')

@section('content')
<style>
    .form-control {
        width: 100%;
        min-height:28px !important;
    }
    .text-center{
        text-align: center;
    }
</style>
    <section class="form-02-main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="_lk_de">
                        <div class="form-03-main">
                            <div class="logo">
                                <img src="data:image/png;base64,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">
                            </div>
                            <h3 class="text-center">Reset Password</h3>

                            <form method="POST" action="{{ route('post_reset', ['token' => $token]) }}" class="login">
                                @csrf
                                <div class="form-group">
                                    <input type="password" name="newpassword" value=""
                                        class="form-control @error('newpassword') is-invalid @enderror"
                                        placeholder="New Password">
                                    @error('newpassword')
                                        <span class="invalid-feedback" style="color: red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control @error('confirmpassword') is-invalid @enderror"
                                        name="confirmpassword" value="" placeholder="Confirm Password">
                                    @error('confirmpassword')
                                        <span class="invalid-feedback" style="color: red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                              
                                <div class="form-group">
                                    <button type="submit" class="_btn_04">{{ __('Submit') }}</button>
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
