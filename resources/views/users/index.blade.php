@extends('layouts.app')

@section('content')
    {{-- This view will display the list of users --}}

    <form action="{{ route('users.index') }}" method="GET">
        <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}">
        <button type="submit">Search</button>
    </form>

    <br>
    <table>
        <thead>
            <tr>
                <th>
                    <a href="{{ route('users.index', ['sort' => 'id', 'search' => request('search')]) }}">ID</a>
                </th>
                <th>
                    <a href="{{ route('users.index', ['sort' => 'name', 'search' => request('search')]) }}">Name</a>
                </th>
                <th>
                    <a href="{{ route('users.index', ['sort' => 'email', 'search' => request('search')]) }}">Email</a>
                </th>
                <th>
                    <a href="{{ route('users.index', ['sort' => 'role', 'search' => request('search')]) }}">Role</a>
                </th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role_id }}</td>
                    <td>
                        <a href="{{ route('users.show', $user->id) }}">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('users.create') }}">Create User</a>
    <br>
@endsection
