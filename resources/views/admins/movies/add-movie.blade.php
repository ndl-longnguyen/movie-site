@extends('admins.locks.layout-admin')

@section('title')
    Add Movie
@endsection
@section('page-admin-content')
    <h1 class="text-center mt-3">Form add movie</h1>
    <form action="{{ route('admin.add-movie') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <label for="title" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title"
                    value="{{ old('title') }}">
                @error('title')
                    <div id="" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="role" class="col-sm-2 col-form-label">Director</label>
            <div class="col-sm-10">
                <input type="text" name="director" class="form-control @error('director') is-invalid @enderror" id="director"
                    value="{{ old('director') }}">
                @error('director')
                    <div id="" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="role" class="col-sm-2 col-form-label">Performer</label>
            <div class="col-sm-10">
                <input type="text" name="performer" class="form-control @error('performer') is-invalid @enderror"
                    id="performer" value="{{ old('performer') }}">
                @error('performer')
                    <div id="" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="role" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
                <input type="text" name="category" class="form-control @error('category') is-invalid @enderror"
                    id="category" value="{{ old('category') }}">
                @error('category')
                    <div id="" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="role" class="col-sm-2 col-form-label">Premiere</label>
            <div class="col-sm-10">
                <input type="datetime-local" name="premiere" class="form-control @error('premiere') is-invalid @enderror"
                    id="premiere" value="{{ old('premiere') }}">
                @error('premiere')
                    <div id="" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="role" class="col-sm-2 col-form-label">Time</label>
            <div class="col-sm-10">
                <input type="text" name="time" class="form-control @error('time') is-invalid @enderror" id="time"
                    value="{{ old('time') }}">
                @error('time')
                    <div id="" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="role" class="col-sm-2 col-form-label">Image</label>
            <div class="col-sm-10">
                <input type="file" name="image" class=" @error('image') is-invalid @enderror" id="image"
                    value="{{ old('image') }}">
                @error('image')
                    <div id="" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="role" class="col-sm-2 col-form-label">Video</label>
            <div class="col-sm-10">
                <input type="file" name="video" class=" @error('video') is-invalid @enderror" id="video"
                    value="{{ old('video') }}">
                @error('video')
                    <div id="" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="float-right">
            <button type="submit" class="ml-5 btn btn-primary ">Add movie</button>
            <a href="{{ route('admin.show-dashboard-movie') }}" class="ml-3 btn btn-secondary">Back</a>
        </div>
    </form>
@endsection
