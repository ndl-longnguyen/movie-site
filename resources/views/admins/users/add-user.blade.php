@extends('admins.locks.layout-admin')

@section('title')
    Add User
@endsection
@section('page-admin-content')
    <h1 class="text-center mt-3">Form add user</h1>
    <form action="{{ route('admin.add-user') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <label for="fullname" class="col-sm-2 col-form-label">Full name</label>
            <div class="col-sm-10">
                <input type="fullname" name="fullname" class="form-control @error('fullname') is-invalid @enderror"
                    id="fullname" value="{{ old('fullname') }}">
                @error('fullname')
                    <div id="" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="role" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    value="{{ old('email') }}">
                @error('email')
                    <div id="" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-10 offset-sm-2">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="role" name='role' value="1">
                    <label class="form-check-label" for="role">
                        Admin
                    </label>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                    id="password" value="{{ old('password') }}">
                @error('password')
                    <div id="" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                    name="password_confirmation" value="{{ old('password_confirmation') }}" id="password_confirmation">
                @error('password_confirmation')
                    <div id="" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="float-right">
            <button type="submit" class="ml-5 btn btn-primary ">Add user</button>
            <a href="{{ route('admin.show-dashboard-user') }}" class="ml-3 btn btn-secondary">Back</a>
        </div>
    </form>
@endsection
