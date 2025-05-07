@extends('layouts.app')

@section('content')
    <div>
        <h1>Schedules for Project: {{ $project->name }}</h1>
        <a href="{{ route('projects.schedules.create', $project) }}">Create New Schedule</a>

        @if ($schedules->isNotEmpty())
            <ul>
                @foreach ($schedules as $schedule)
                    <li>
                        <a href="{{ route('projects.schedules.show', [$project, $schedule]) }}">{{ $schedule->name ?? 'Schedule ' . $schedule->id }}</a>
                        (Start: {{ $schedule->start_date }}, End: {{ $schedule->end_date }})
                    </li>
                @endforeach
            </ul>
        @else
            <p>No schedules found for this project.</p>
        @endif
    </div>
@endsection
