@extends('lock.layout')

@section('title')
    Sign Out
@endsection

@section('content')
    <div class="sign-in-up" style="height: 100vh">
        <div class="container">
            <div class="d-flex justify-content-center h-100">
                <div class="card" style="height: auto;">
                    <div class="card-header">
                        <h3>Sign Up</h3>
                        <div class="d-flex justify-content-end social_icon">
                            <span><i class="fab fa-user"></i></span>
                            <span><i class="fab fa-google-plus-square"></i></span>
                            <span><i class="fab fa-twitter-square"></i></span>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('handleRegister') }}" method="POST">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="fullname" name="fullname"
                                    class="form-control @error('fullname') is-invalid @enderror" id="fullname"
                                    value="{{ old('fullname') ?? session('fullname') }}"
                                    placeholder="Enter your full name">
                                @error('fullname')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i><i
                                            class="fa-solid fa-envelope"></i> </span>
                                </div>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" value="{{ old('email') ?? session('email') }}" placeholder="email">
                                @error('email')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                {{-- <input type="password" class="form-control" placeholder="password"> --}}
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" id="password" value="{{ old('password') }}" placeholder="password">
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
                                    value="{{ old('password_confirmation') }}" placeholder="password_confirmation">
                                @error('password_confirmation')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Register" class="btn float-right login_btn">
                            </div>
                            @csrf
                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center links">
                            If you already have an account?<a href="{{ route('login') }}">Sign In</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
