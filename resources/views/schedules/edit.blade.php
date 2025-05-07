@extends('layouts.app')

@section('content')
    <div>
        <h1>Edit Schedule for Project: {{ $project->name }}</h1>

        <div>
            <form method="POST" action="{{ route('projects.schedules.update', [$project, $schedule]) }}">
                @csrf
                @method('PUT')

                <div>
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $schedule->name) }}">
                    @error('name')
                        <div>{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="start_date">Start Date</label>
                    <input type="date" name="start_date" id="start_date" value="{{ old('start_date', $schedule->start_date) }}">
                    @error('start_date')
                        <div>{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="end_date">End Date</label>
                    <input type="date" name="end_date" id="end_date" value="{{ old('end_date', $schedule->end_date) }}">
                    @error('end_date')
                        <div>{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit">Update Schedule</button>
                <a href="{{ route('projects.schedules.show', [$project, $schedule]) }}">Cancel</a>
            </form>
        </div>
    </div>
@endsection
