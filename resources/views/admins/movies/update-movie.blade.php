@extends('admins.locks.layout-admin')

@section('title')
    Update Movie
@endsection
@section('page-admin-content')
    <h1 class="text-center mt-3">Form update movie</h1>
    <form action="{{ route('admin.update-movie') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <label for="title" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title"
                    value="{{ old('title') ?? $movie->title }}">
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
                    value="{{ old('director') ?? $movie->director }}">
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
                    id="performer" value="{{ old('performer') ?? $movie->performer }}">
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
                    id="category" value="{{ old('category') ?? $movie->category }}">
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
                    id="premiere" value="{{ date('Y-m-d\TH:i', strtotime(old('premiere') ?? $movie->premiere)) }}">
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
                    value="{{ old('time') ?? $movie->time }}">
                @error('time')
                    <div id="" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label font-weight-bold ">Image</label>
            <div class="col-sm-4">
                <img style="width: 200px;" src="{{ asset('images/' . (old('image') ?? $movie->image)) }}" alt="">
                <p> {{ old('image') ?? $movie->image }}</p>
            </div>

            <label class="col-sm-2 col-form-label font-weight-bold">Video</label>
            <div class="col-sm-4">
                <video width="200" controls>
                    <source src="{{ asset('videos/' . $movie->video) }}" type="video/mp4">
                </video>
                <p> {{ old('video') ?? $movie->video }}</p>
            </div>

        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label"></label>
            <p class="col-sm-10">
                <a class="btn btn-primary" data-toggle="collapse" href="#collapseShow" role="button" aria-expanded="false"
                    aria-controls="collapseShow">
                    Change Video
                </a>
            </p>
        </div>

        <div class="collapse" id="collapseShow">
            <div class="row mb-3">
                <label for="role" class="col-sm-2 col-form-label">Video</label>
                <div class="col-sm-10">
                    <input type="file" name="video" class=" @error('video') is-invalid @enderror" id="video"
                        value="{{ old('video') ?? $movie->video }}">
                    @error('video')
                        <div id="" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>


        <div class="row mb-3">
            <label class="col-sm-2 col-form-label"></label>
            <p class="col-sm-10">
                <a class="btn btn-primary" data-toggle="collapse" href="#collapseShow1" role="button" aria-expanded="false"
                    aria-controls="collapseShow1">
                    Change Image
                </a>
            </p>
        </div>

        <div class="collapse" id="collapseShow1">
            <div class="row mb-3">
                <label for="role" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-3">
                    <input type="file" name="image" class=" @error('image') is-invalid @enderror" id="image"
                        value="{{ old('image') ?? $movie->image }}">
                    @error('image')
                        <div id="" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>




        <div class="float-right">
            <button type="submit" class="btn btn-primary ">Update movie</button>
            <a href="{{ route('admin.show-dashboard-movie') }}" class="ml-3 btn btn-secondary">Back</a>
        </div>
    </form>
    </div>
@endsection
