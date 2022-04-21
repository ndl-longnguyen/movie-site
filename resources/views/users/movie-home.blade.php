@extends('home')

@section('page-content')
    <div class="container-movie">
        <div class="movie-slider">
            @foreach ($hotMovies as $movie)
                <a href="{{ route('view-detail', ['id' => $movie->id]) }}">
                    <div class="movie-item">
                        <div class="movie">
                            <img src="{{ asset('images/' . $movie->image) }}" alt="" class="zoom position-relative" />
                            <div class="position-absolute text-light pl-3" style="bottom: 0;">
                                <h2>{{ $movie->title }}</h2>
                                <P>{{ $movie->view }} views</P>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div id="trending" class="container-movie">
            <p class="font-weight-bold heading-movie">
                TRENDING</p>
            <div class="trending-movie-slider movie-menu d-flex justify-content-start align-items-center flex-wrap">
                @foreach ($movieTrending as $movie)
                    <div class="movie-list mr-3 px-1 mb-3 position-relative">
                        <a href="{{ route('view-detail', ['id' => $movie->id]) }}">
                            <img src="{{ asset('images/' . $movie->image) }}" alt=""
                                class="w-100 rounded-top rounded-bottom position-relative" />
                            <div class="movie-hot">
                                Hot
                            </div>
                            <div class="position-absolute text-light pl-2" style="bottom: 0;">
                                <h5 class="m-0">{{ $movie->title }}</h5>
                                <p class="m-0 py-1">{{ $movie->view }} views</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <div id="new" class="container-movie">
            <p class="font-weight-bold heading-movie">NEW
            </p>
            <div class="trending-movie-slider movie-menu d-flex justify-content-start align-items-center flex-wrap">
                @foreach ($newMovies as $movie)
                    <div class="movie-list mr-3 px-1 mb-3 position-relative">
                        <a href="{{ route('view-detail', ['id' => $movie->id]) }}">
                            <img src="{{ asset('images/' . $movie->image) }}" alt=""
                                class="w-100 rounded-top rounded-bottom position-relative" />
                            <div class="movie-hot">
                                New
                            </div>
                            <div class="position-absolute text-light pl-2" style="bottom: 0;">
                                <h5 class="m-0">{{ $movie->title }}</h5>
                                <p class="m-0 py-1">{{ $movie->view }} views</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="container-movie">
            <p class="font-weight-bold heading-movie">All
                Movie <a style="font-size: 14px" href="{{ route('show-all-movie') }}">See all</a></p>
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
        </div>
    </div>
@endsection
