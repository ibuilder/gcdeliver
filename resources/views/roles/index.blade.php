@extends('layouts.app')

@section('content')
    <div>
        <h1>Roles</h1>
        <a href="{{ route('roles.create') }}">Create New Role</a>
    </div>

    <div>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td>
                            <a href="{{ route('roles.show', $role->id) }}">View</a>
                            <a href="{{ route('roles.edit', $role->id) }}">Edit</a>
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

