php
@extends('layouts.app')

@section('content')
    <div>
        <h1>Task Dependencies</h1>
        <a href="{{ route('task_dependencies.create') }}">Create New Task Dependency</a>
    </div>

    <div>
        <table>
            <thead>
                <tr>
                    <th>Task ID</th>
                    <th>Dependent Task ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($taskDependencies as $taskDependency)
                    <tr>
                        <td>{{ $taskDependency->task_id }}</td>
                        <td>{{ $taskDependency->dependent_task_id }}</td>
                        <td>
                            <a href="{{ route('task_dependencies.show', $taskDependency->id) }}">View</a>
                            <a href="{{ route('task_dependencies.edit', $taskDependency->id) }}">Edit</a>
                            <form action="{{ route('task_dependencies.destroy', $taskDependency->id) }}" method="POST" style="display: inline;">
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