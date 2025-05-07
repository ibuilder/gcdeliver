@extends('layouts.app')

@section('content')
    <h1>Manage Resources for Schedule: {{ $schedule->name }} (Project: {{ $project->name }})</h1>

    <h2>Assigned Users</h2>
    @if ($schedule->users->isNotEmpty())
        <ul>
            @foreach ($schedule->users as $user)
                <li>
                    {{ $user->name }}
                    @can('manage-projects')
                        <form method="POST" action="{{ route('projects.schedules.resources.remove', [$project, $schedule, $user]) }}" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Remove</button>
                        </form>
                    @endcan
                </li>
            @endforeach
        </ul>
    @else
        <p>No users assigned to this schedule yet.</p>
    @endif

    <h2>Assign Users</h2>
    @if ($users->isNotEmpty())
        <ul>
            @foreach ($users as $user)
                @if (!$schedule->users->contains($user))
                    <li>
                        {{ $user->name }}
                        @can('manage-projects')
                            <form method="POST" action="{{ route('projects.schedules.resources.assign', [$project, $schedule, $user]) }}" style="display: inline-block;">
                                @csrf
                                <button type="submit">Assign</button>
                            </form>
                        @endcan
                    </li>
                @endif
            @endforeach
        </ul>
    @else
        <p>No users available to assign.</p>
    @endif

    <a href="{{ route('projects.schedules.show', [$project, $schedule]) }}">Back to Schedule Details</a>
@endsection