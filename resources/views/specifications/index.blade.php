@extends('layouts.app')

@section('content')
    <div>
        <h1>Specifications</h1>
        <a href="{{ route('specifications.create') }}">Create New Specification</a>
    </div>

    <div>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Project ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($specifications as $specification)
                    <tr>
                        <td>{{ $specification->name }}</td>
                        <td>{{ $specification->description }}</td>
                        <td>{{ $specification->project_id }}</td>
                        <td>
                            <a href="{{ route('specifications.show', $specification->id) }}">View</a>
                            <a href="{{ route('specifications.edit', $specification->id) }}">Edit</a>
                            <form action="{{ route('specifications.destroy', $specification->id) }}" method="POST" style="display: inline;">
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