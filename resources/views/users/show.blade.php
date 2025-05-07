@extends('layouts.app')

@section('content')
    <div>
        <h1>User: {{ $user->name }}</h1>

        <p><strong>ID:</strong> {{ $user->id }}</p>
        <p><strong>Name:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Created At:</strong> {{ $user->created_at }}</p>

        @can('manage-users')
        <div>
            <a href="{{ route('users.edit', $user) }}">Edit User</a>

            <form method="POST" action="{{ route('users.destroy', $user) }}">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure you want to delete this user?')">
                    Delete User
                </button>
            </form>
        </div>
        @else
        <div>
            
        </div>
        @endcan

        <div>
            <a href="{{ route('users.index') }}">
                <button>Back to Users</button>
            </a>
        </div>
    </div>
@endsection




