@extends('home')
@section('title')
    Movie Detail
@endsection
@section('page-content')
    @if (!empty($movie))
        <style>
            .line-footer p {
                color: #ccc
            }

        </style>
        <div class="container-movie-play">
            <img src=" {{ asset('images/' . $movie->image) }}" alt="" class="position-relative" />
            <div class="movie-play">
                <div class="movie-content">
                    <img src=" {{ asset('images/' . $movie->image) }}" alt="" class="position-relative" />
                    <div class="position-absolute text-light pl-3" style="bottom: 0;">
                    </div>
                    <div class="movie-name">
                        <h4 class="text-uppercase">{{ $movie->title }}</h4>
                        <h6 class="mb-0">{{ date('Y', strtotime($movie->premiere)) }}</h6>
                    </div>
                </div>
                <a href="{{ route('view-movie', ['id' => $movie->id]) }}" class="btn-play-movie btn btn-primary">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16"
                        class="mr-2" height="20" width="20" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11.596 8.697l-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 010 1.393z">
                        </path>
                    </svg>
                    Watch now
                </a>
                <div class="movie-detail">
                    <h2 class="font-weight-bold text-uppercase">{{ $movie->title }}</h2>
                    <p class="font-weight-bold">Director: <span class="font-weight-light">{{ $movie->director }}</span>
                    </p>
                    <p class="font-weight-bold">Performer: <span class="font-weight-light"> {{ $movie->performer }}</span>
                    </p>
                    <p class="font-weight-bold">Category: <span class="font-weight-light">{{ $movie->category }}</span>
                    </p>
                    <p class="font-weight-bold">Premiere: <span
                            class="font-weight-light">{{ date('Y-M-d H:i', strtotime($movie->premiere)) }}</span>
                    </p>
                    <p class="font-weight-bold">Time: <span class="font-weight-light">{{ $movie->time }} minute</span>
                    </p>
                    <p class="font-weight-bold">Views: <span span class="font-weight-light"
                            id="show-views">{{ $movie->view }}</span>
                    </p>
                </div>
            </div>
        </div>
    @else
        <style>
            .line-footer p {
                color: rgb(25, 25, 24)
            }

        </style>
        <center>
            <div style="min-height: 390px; margin-top: 200px">
                <h1 class="mt-5">{{ __('message.movie.no') }}</h1>
            </div>
        </center>
    @endif
@endsection
