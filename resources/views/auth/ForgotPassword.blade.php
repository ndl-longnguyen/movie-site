@extends('lock.layout')

@section('title')
    Forgot Password
@endsection

@section('content')
    @if (session('smg'))
        <div class="alert alert-success d-flex align-items-center" id="show-msg" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                <use xlink:href="#check-circle-fill" />
            </svg>
            <div>
                {{ session('smg') }}
            </div>
        </div>
    @endif
    <div class="sign-in-up" style="height: 100vh">

        <div class="container">
            <div class="d-flex justify-content-center h-100">
                <div class="card" style="height: auto;">
                    <div class="card-header">
                        <h3>Forgot Password</h3>
                        <div class="d-flex justify-content-end social_icon">
                            <span><i class="fab fa-facebook-square"></i></span>
                            <span><i class="fab fa-google-plus-square"></i></span>
                            <span><i class="fab fa-twitter-square"></i></span>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('handle-forgot-password') }}" method="POST">
                            <input type="hidden" name="email" value="{{ request()->email }}">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" id="password" value="{{ old('password') }}"
                                    placeholder="Enter new password">
                                @error('password')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation" id="password_confirmation"
                                    value="{{ old('password_confirmation') }}" placeholder="Enter new confirm password">
                                @error('password_confirmation')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Change Password" class="btn float-right login_btn">
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
