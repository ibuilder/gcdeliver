@extends('layouts.app')

@section('content')
    <div>
        <h1>Teams</h1>
        <a href="{{ route('teams.create') }}">Create New Team</a>
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
                @foreach($teams as $team)
                    <tr>
                        <td>{{ $team->name }}</td>
                        <td>
                            <a href="{{ route('teams.show', $team->id) }}">View</a>
                            <a href="{{ route('teams.edit', $team->id) }}">Edit</a>
                            <form action="{{ route('teams.destroy', $team->id) }}" method="POST" style="display: inline;">
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