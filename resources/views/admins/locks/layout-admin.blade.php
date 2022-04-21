@extends('home')

@section('title')
    Dashboard
@endsection
@section('narbar-admin')
    <div style="display: flex; margin-top: 55px">

        <div style="width: 15%; box-shadow: 5px 0px 5px #cccc;" class="nav flex-column nav-pills" id="v-pills-tab"
            role="tablist" aria-orientation="vertical">
            <a style="height: 50px; height: 50px;"
                class="nav-link {{ str_contains(URL::current(), route('admin.show-dashboard-user')) ? 'active' : '' }}"
                href="{{ route('admin.show-dashboard-user') }}">User</a>
            <a style="height: 50px; height: 50px;"
                class="nav-link {{ str_contains(URL::current(), route('admin.show-dashboard-movie')) ? 'active' : '' }}"
                href="{{ route('admin.show-dashboard-movie') }}">Movie</a>
        </div>

        <div style="min-height: 600px; width: 80%; " class="ml-5 mr-5">
            @yield('page-admin-content')
        </div>
    </div>
@endsection
