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
                        <form action="{{ route('send-token-forgot-password') }}" method="POST">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i><i
                                            class="fa-solid fa-envelope"></i> </span>
                                </div>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" value="{{ old('email') ?? session('email') }}"
                                    placeholder="Enter your email">
                                @error('email')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Send" class="btn float-right login_btn">
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
