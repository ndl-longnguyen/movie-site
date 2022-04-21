@extends('admins.locks.layout-admin')

@section('page-admin-content')

    <a href="{{ route('admin.show-add-movie') }}" class="btn btn-primary mt-2">Add Movie</a>
    <div>
        <h1 class="text-center mt-3">List Movie</h1>
        <table class="table table-bordered mt-1">
            <thead>
                <tr>
                    <th width="5%" scope="col">STT</th>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">Director</th>
                    <th scope="col">Performer</th>
                    <th scope="col">Category</th>
                    <th scope="col">Premiere</th>
                    <th scope="col">Time</th>
                    <th width="15%" scope="col">Create at</th>
                    <th width="15%" scope="col">Update at</th>
                    <th width="5%" scope="col">Edit</th>
                    <th width="5%" scope="col">Delete</th>
                </tr>
            </thead>
            @php
                $a = 1;
            @endphp
            <tbody>
                @if (!empty($movies->items()))
                    @foreach ($movies as $movie)
                        <tr>
                            <th scope="row">{{ $a++ }}</th>
                            <td>{{ $movie->title }}</td>
                            <td><img src="{{ asset('images/' . $movie->image) }}" style="width: 100px" alt=""></td>
                            <td>{{ $movie->director }}</td>
                            <td>{{ $movie->performer }}</td>
                            <td>{{ $movie->category }}</td>
                            <td>{{ $movie->premiere }}</td>
                            <td>{{ $movie->time }} minute</td>
                            <td>{{ $movie->created_at }}</td>
                            <td>{{ $movie->updated_at }}</td>
                            <td><a class="btn btn-warning "
                                    href="{{ route('admin.show-update-movie', ['id' => $movie->id]) }}">Edit</a>
                            </td>
                            <td><a class="btn btn-danger" onclick="return confirm('Are you sure?');"
                                    href="{{ route('admin.delete-movie', ['id' => $movie->id]) }}">Delete</a></td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="12">No movies</td>
                    </tr>
                @endif
            </tbody>
        </table>
        <div class="float-right">
            {{ $movies->links() }}
        </div>
    </div>
@endsection
