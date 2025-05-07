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

    <a href="{{ route('projects.schedules.index', $project) }}">Back to Schedules</a>

@endsection

