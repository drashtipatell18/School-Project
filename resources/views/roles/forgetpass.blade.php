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
                            <h3 class="text-center">Forget Password</h3>

                            <form method="POST" action="{{ route('forget.password.email') }}" class="login">
                                @csrf
                                <div class="form-group">
                                    <input type="email" name="email"
                                        class="form-control _ge_de_ol @error('email') is-invalid @enderror" type="text"
                                        placeholder="Enter Email">
                                    @error('email')
                                        <div class="invalid-feedback error-message" style="color: red">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="_btn_04">{{ __('submit') }}</button>
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