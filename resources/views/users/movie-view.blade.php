@extends('home')

@section('title')
    {{ $movie->title }}
@endsection
@section('page-content')
    <style>
        body {
            background-color: black
        }

    </style>

    <div style="margin-top: 60px">
        <div class="d-flex ml-2">
            <div>
                <video id="myVideo" width="1000" controls controlsList="nodownload" autoplay preload="metadata">
                    <source src="{{ asset('videos/' . $movie->video) }}" type="video/mp4">
                </video>
            </div>
            <div class="ml-3">
                <form class="comment d-inline-block">
                    <input type="text" name="comment" id="comment" style="max-width: 350px; width: 350px;">
                    <input type="hidden" name="id" id="id" value="{{ $movie->id }}">
                    <div class="btn btn-primary" id="send-comment">Send</div>
                </form>
                <div class="" id="show-comment">
                    @foreach ($comments as $comment)
                        <div class="d-flex text-light">
                            <p class="mr-1 text-secondary">{{ date('M-d H:i', strtotime($comment->created_at)) }}</p>
                            <strong>{{ $comment->fullname }} </strong>
                            <p class="ml-1">{{ $comment->comment }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="d-flex; ml-2">
            <p class="text-light text-capitalize h5">{{ $movie->title }}</p>
            <p class="text-muted d-inline" id="show-views">{{ $movie->view }}</p>
            <p class="text-muted d-inline"> views - {{ date('Y-M-d H:i', strtotime($movie->created_at)) }}</p>
        </div>
    </div>




    {{-- send comment with Ajax --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#send-comment').on('click', function() {
                $value = $('#comment').val();
                $id = $('#id').val();
                $.ajax({
                    type: 'get',
                    url: '{{ URL::to('comment') }}',
                    data: {
                        'comment': $value,
                        'id': $id,
                    },
                    dataType: "json",
                    success: function() {}
                });
                $('#comment').val("");
            });

            $.ajaxSetup({
                headers: {
                    'csrftoken': '{{ csrf_token() }}'
                }
            });
        });
    </script>

    {{-- handle views movie --}}
    <script>
        var lengthData = 0;
        var playedTime = 0;
        var isIncreased = true;

        var video = document.getElementById("myVideo")

        //get length video
        video.onloadedmetadata = function() {
            lengthData = video.duration;
        }

        //get length video played
        video.addEventListener('timeupdate', function() {
            //set startTime to currentTime
            if (!this._startTime) this._startTime = this.currentTime;

            playedTime = this.currentTime - this._startTime;

            if (playedTime <= 0) isIncreased = true;

            if (playedTime >= (lengthData / 2) && isIncreased) {
                isIncreased = false;
                load();
            }
        });

        function load() {
            $id = $('#id').val();

            $.ajax({
                type: 'get',
                url: '{{ URL::to('add/view') }}',
                data: {
                    'id': $id,
                },
                success: function() {}
            });

            $.ajaxSetup({
                headers: {
                    'csrftoken': '{{ csrf_token() }}'
                }
            });
        }
    </script>
@endsection
