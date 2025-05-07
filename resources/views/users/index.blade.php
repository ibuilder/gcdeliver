@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Users</h1>

    @can('manage-users')
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Create New User</a>
    @endcan

    @if ($users->isNotEmpty())
    <ul class="list-group">
        @foreach ($users as $user)
        <li class="list-group-item">
            @can('manage-users')
                <a href="{{ route('users.show', $user) }}">{{ $user->name }}</a>
            @else
                {{ $user->name }}
            @endcan
            - {{ $user->email }}
        </li>
        @endforeach
    </ul>
    @else
    <p>No users found.</p>
    @endif
</div>
@endsection
