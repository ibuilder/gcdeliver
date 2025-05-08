@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Project</h1>

        <form method="POST" action="{{ route('projects.update', $project) }}">
            @csrf
            @method('PUT')

            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $project->name) }}" required>
                @error('name')
                    <div>{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="description">Description</label>
                <textarea id="description" name="description" required>{{ old('description', $project->description) }}</textarea>
                @error('description')
                    <div>{{ $message }}</div>
                @enderror
            </div>
           <button type="submit">Update Project</button>

            @can('manage-projects')
                <a href="{{ route('projects.users.manage', $project) }}">Manage Users</a>
            @endcan




        </form>
    </div>
@endsection


