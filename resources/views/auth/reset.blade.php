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
                                <img src="https://app.gemoo.com/share/image-annotation/634844321402281984?codeId=v670K0Ro8qjA9&origin=imageurlgenerator">
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
