@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <form method="POST" action="{{ route('post_reset', ['token' => $token]) }}">
                    @csrf
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align"> New Password*</label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" name="newpassword" value=""
                                class="form-control @error('newpassword') is-invalid @enderror">
                            @error('newpassword')
                                <span class="invalid-feedback" style="color: red">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align"> Confirm Password*</label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" name="confirmpassword" value=""
                                class="form-control @error('confirmpassword') is-invalid @enderror">
                            @error('confirmpassword')
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
                                Submit
                            </button>
                        </div>
                    </div>


                </form>

            </div>

        </div>
    </div>
@endsection
