@extends('admins.locks.layout-admin')


@section('page-admin-content')
    <a href="{{ route('admin.show-add-user') }}" class="btn btn-primary mt-2">Add User</a>
    <div>
        <h1 class="text-center mt-3">List user</h1>
        <table class="table table-bordered mt-1">
            <thead>
                <tr>
                    <th width="5%" scope="col">STT</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Roles</th>
                    <th width="15%" scope="col">Create at</th>
                    <th width="15%" scope="col">Update at</th>
                    <th width="8%" scope="col">Edit</th>
                    <th width="8%" scope="col">Delete</th>
                </tr>
            </thead>
            @php
                $a = 1;
            @endphp
            <tbody>
                @if (!empty($users->items()))
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $a++ }}</th>
                            <td>{{ $user->fullname }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->is_admin == 0 ? 'User' : 'Admin' }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>{{ $user->updated_at }}</td>
                            <td><a class="btn btn-warning"
                                    href="{{ route('admin.show-update-user', ['id' => $user->id]) }}">Edit</a>
                            </td>
                            <td><a class="btn btn-danger" onclick="return confirm('Are you sure?');"
                                    href="{{ route('admin.delete-user', ['id' => $user->id]) }}">Delete</a></td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6"> No user</td>
                    </tr>
                @endif
            </tbody>
        </table>
        <div class="float-right">
            {{ $users->links() }}
        </div>
    </div>
@endsection
