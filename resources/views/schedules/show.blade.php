@extends('layouts.app')

@section('content')
    <h1>Schedule for Project: {{ $project->name }}</h1>

    <p><strong>ID:</strong> {{ $schedule->id }}</p>
    <p><strong>Name:</strong> {{ $schedule->name }}</p>
    <p><strong>Start Date:</strong> {{ $schedule->start_date }}</p>
    <p><strong>End Date:</strong> {{ $schedule->end_date }}</p>

    @can('manage-projects')
        <a href="{{ route('projects.schedules.edit', [$project, $schedule]) }}">Edit Schedule</a>
    @endcan
    
    @can('manage-projects')
        <form method="POST" action="{{ route('projects.schedules.destroy', [$project, $schedule]) }}">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Are you sure you want to delete this schedule?')">Delete Schedule</button>
        </form>
    @endcan
    
    <h2>Dependencies</h2>
    @if ($schedule->dependencies->isNotEmpty())
        <ul>
            @foreach ($schedule->dependencies as $dependency)
                <li>{{ $dependency->name }}</li>
            @endforeach
        </ul>
    @else
        <p>No dependencies yet.</p>
    @endif
    <a href="{{ route('projects.schedules.dependencies.show', [$project, $schedule]) }}">Manage Dependencies</a>
    
    <h2>Assigned Users</h2>
    @if ($schedule->users->isNotEmpty())
        <ul>
            @foreach ($schedule->users as $user)
                <li>{{ $user->name }}</li>
            @endforeach
        </ul>
    @else
        <p>No users assigned yet.</p>
    @endif
    <a href="{{ route('projects.schedules.resources.show', [$project, $schedule]) }}">Manage Resources</a>
    
    <h2>Comments</h2>
    @if ($schedule->comments->isNotEmpty())
        <ul>
            @foreach ($schedule->comments as $comment)
                <li>
                    <p>{{ $comment->body }}</p>
                    <p>By: {{ $comment->user->name }}</p>
                </li>
            @endforeach
        </ul>
    @else
        <p>No comments yet.</p>
    @endif
    <form action="{{ route('comments.store') }}" method="POST">
        @csrf
        <textarea name="body" placeholder="Add a comment"></textarea>
        <input type="hidden" name="commentable_id" value="{{ $schedule->id }}">
        <input type="hidden" name="commentable_type" value="App\Models\Schedule">
        <button type="submit">Post Comment</button>
    </form>

    <a href="{{ route('projects.schedules.index', $project) }}">Back to Schedules</a>

@endsection

