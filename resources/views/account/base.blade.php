@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-12 col-md-3">
            <nav class="nav nav-pills flex-column">
                <h6>Account Settings</h6>
                <a class="nav-link{{ is_active_page('account') }}" href="{{ route('account.index') }}">Account</a>
                <a class="nav-link{{ is_active_page('*/profile') }}" href="{{ route('account.profile.index') }}">Profile</a>
                <a class="nav-link{{ is_active_page('*/security') }}" href="{{ route('account.security.index') }}">Security</a>
                <a class="nav-link{{ is_active_page('*/subscription') }}" href="{{ route('account.billing.index') }}">Billing</a>

                <h6 class="mt-5">Billing</h6>

                <a class="nav-link" href="#">Change Plan</a>
                <a class="nav-link" href="#">Update Card</a>
                <a class="nav-link" href="#">Invoices</a>
                <a class="nav-link" href="#">Cancel Subscription</a>


            </nav>
        </div>
        <div class="col-12 col-md-9">
            @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            @yield('account.content')
        </div>
    </div>

@endsection