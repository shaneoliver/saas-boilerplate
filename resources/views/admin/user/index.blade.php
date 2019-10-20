@extends('admin.base')

@section('admin.content')
    <h2>{{ __('Users')}}</h2>

    <div class="table-responsive">
        <table class="table table-striped">
            <caption>List of users</caption>
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Member Since</td>
                    <td>&nbsp;</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>    
                        <td>{{ $user->email }}</td>
                        <td align="right">{{ $user->member_since }}</td>
                        <td>
                            <button class="btn btn-outline-secondary btn-sm">Impersonate</button>
                        </td>
                    </tr>   
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $users->links() }}
    </div>

@endsection
