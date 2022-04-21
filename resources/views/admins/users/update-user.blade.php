@extends('admins.locks.layout-admin')

@section('title')
    Update User
@endsection
@section('page-admin-content')
    <div class="ml-5 mr-5">
        <div>
            <h1 class="text-center mt-3">Form update user</h1>
            <form action="{{ route('admin.update-user') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <label for="fullname" class="col-sm-2 col-form-label">Full name</label>
                    <div class="col-sm-10">
                        <input type="fullname" name="fullname" class="form-control @error('fullname') is-invalid @enderror"
                            id="fullname" value="{{ old('fullname') ?? $user->fullname }}">
                        @error('fullname')
                            <div id="" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            id="email" value="{{ old('email') ?? $user->email }}">
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
                            <input class="form-check-input" {{ $user->is_admin == '0' ? '' : 'checked' }} type="checkbox"
                                id="role" name='role' value="1">
                            <label class="form-check-label" for="role">
                                Admin
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label"></label>
                    <p class="col-sm-10">
                        <a class="btn btn-primary" data-toggle="collapse" href="#collapseShow" role="button"
                            aria-expanded="false" aria-controls="collapseShow">
                            Change Password
                        </a>
                    </p>
                </div>

                <div class="collapse" id="collapseShow">
                    <div class="row mb-3">
                        <label for="newpassword" class="col-sm-2 col-form-label">New Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control @error('newpassword') is-invalid @enderror"
                                name="newpassword" id="newpassword" value="{{ old('newpassword') }}">
                            @error('newpassword')
                                <div id="" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="newpassword_confirmation" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-10">
                            <input type="password"
                                class="form-control @error('newpassword_confirmation') is-invalid @enderror"
                                name="newpassword_confirmation" id="newpassword_confirmation"
                                value="{{ old('newpassword_confirmation') }}">
                            @error('newpassword_confirmation')
                                <div id="" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div style="float: right;">
                    <button type="submit" class="ml-5 btn btn-primary ">Update</button>
                    <a href="{{ route('admin.index') }}" class="ml-3 btn btn-secondary">Back</a>
                </div>

            </form>
        </div>
    </div>
@endsection
