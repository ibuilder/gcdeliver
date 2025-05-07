@extends('layouts.app')

@section('content')
    <div>
        <h1>Create New Schedule for Project: {{ $project->name }}</h1>

        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('projects.schedules.store', $project) }}">
            @csrf

            <div>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required>
            </div>
            <div>
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}" required>
            </div>
            <div>
                <label for="end_date">End Date</label>
                <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}" required>
            </div>
            <input type="hidden" name="project_id" value="{{ $project->id }}">
            <button type="submit">Create Schedule</button>
            
        </form>
    </div>
@endsection
