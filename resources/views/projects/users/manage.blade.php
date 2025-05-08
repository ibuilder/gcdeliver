blade
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Manage Users for Project: {{ $project->name }}</h1>

    <form method="POST" action="{{ route('projects.users.updateAssignments', $project) }}">
        @csrf

        <h2>All Users</h2>

        @foreach ($users as $user)
            <div>
                <label>
                    <input type="checkbox" name="users[]" value="{{ $user->id }}"
                        {{ $project->users->contains($user) ? 'checked' : '' }}>
                    {{ $user->name }} ({{ $user->email }})
                </label>
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary mt-3">Update Assignments</button>
    </form>

    <p class="mt-3">
        <a href="{{ route('projects.show', $project) }}">Back to Project Details</a>
    </p>
</div>
@endsection