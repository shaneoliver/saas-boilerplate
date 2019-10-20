@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-12 col-md-3">
            <nav class="nav nav-pills flex-column">
                <a class="nav-link{{ is_active_page('admin/user') }}" href="{{ route('admin.user.index') }}">Users</a>
                <a class="nav-link{{ is_active_page('admin/plan') }}" href="{{ route('admin.plan.index') }}">Plans</a>
            </nav>
        </div>
        <div class="col-12 col-md-9">
            @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            @yield('admin.content')
        </div>
    </div>

@endsection