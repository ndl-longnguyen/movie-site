@extends('home')

@section('title')
    All movie
@endsection
@section('page-content')
    <div class="container-movie">
        <div class="container-movie" style="min-height: 550px">
            <div class="movie-menu d-flex justify-content-start align-items-center flex-wrap">
                @foreach ($movies as $movie)
                    <div class="movie-list mr-3 px-1 mb-3 position-relative">
                        <a href="{{ route('view-detail', ['id' => $movie->id]) }}">
                            <img src="{{ asset('images/' . $movie->image) }}" alt=""
                                class="w-100 rounded-top rounded-bottom position-relative" />
                            <div class="position-absolute text-light pl-2" style="bottom: 0;">
                                <h5 class="m-0">{{ $movie->title }}</h5>
                                <p class="m-0 py-1">{{ $movie->view }} views</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div style="display: flex; justify-content: center;">
                {{ $movies->links() }}
            </div>
        </div>
    </div>
@endsection
