@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Manage Dependencies for Schedule: {{ $schedule->name }}</h1>

        <h2>Current Dependencies</h2>
        @if ($schedule->dependencies->count() > 0)
            <ul>
                @foreach ($schedule->dependencies as $dependency)
                    <li>
                        {{ $dependency->name }}
                        <form action="{{ route('projects.schedules.dependencies.remove', [$project->id, $schedule->id, $dependency->id]) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @else
            <p>This schedule has no dependencies.</p>
        @endif

        <h2>Add New Dependencies</h2>
        @if ($otherSchedules->count() > 0)
            <ul>
                @foreach ($otherSchedules as $otherSchedule)
                    <li>
                        {{ $otherSchedule->name }}
                        <form action="{{ route('projects.schedules.dependencies.add', [$project->id, $schedule->id]) }}" method="POST" style="display: inline;">
                            @csrf
                            <input type="hidden" name="dependent_schedule_id" value="{{ $otherSchedule->id }}">
                            <button type="submit" class="btn btn-success btn-sm">Add as Dependency</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No other schedules available to add as dependencies.</p>
        @endif

        <a href="{{ route('projects.schedules.show', [$project, $schedule]) }}" class="btn btn-secondary">Back to Schedule Details</a>
    </div>
@endsection