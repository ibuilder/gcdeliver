@extends('layouts.app')

@section('content')
    <div>
        <h1>Activity Dependencies</h1>
        <a href="{{ route('activity_dependencies.create') }}">Create Activity Dependency</a>
    </div>

    <div>
        <table>
            <thead>
                <tr>
                    <th>Activity ID</th>
                    <th>Dependent Activity ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($activityDependencies as $dependency)
                    <tr>
                        <td>{{ $dependency->activity_id }}</td>
                        <td>{{ $dependency->dependent_activity_id }}</td>
                        <td>
                            <a href="{{ route('activity_dependencies.show', $dependency->id) }}">View</a>
                            <a href="{{ route('activity_dependencies.edit', $dependency->id) }}">Edit</a>
                            <form action="{{ route('activity_dependencies.destroy', $dependency->id) }}" method="POST" style="display: inline;">
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
