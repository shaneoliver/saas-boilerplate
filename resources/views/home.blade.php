@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <h1>Todo</h1>
        <ul class="list-group">
            <h3>Admin</h3>
            <li class="list-group-item">Create roles</li>
            <li class="list-group-item">Guard admin pages</li>
            <li class="list-group-item">Show all users</li>
            <li class="list-group-item">User impersonation</li>
            <hr>
            <h3>Billing</h3>
            <li class="list-group-item">Change plan</li>
            <li class="list-group-item">Update card</li>
            <li class="list-group-item">View/download invoices</li>
            <li class="list-group-item">Cancel subscription/resume</li>
            <li class="list-group-item">Hook up extra verification routes stuff?</li>
            <hr>
            <h3>Profile</h3>
            <li class="list-group-item">Upload profile photo</li>
          </ul>
    </div>
</div>
@endsection
