@extends('layouts.app')

@section('content')
    <div>
        <h1>Schedules</h1>

        <form action="{{ route('schedules.index') }}" method="GET">
            <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}">
            <button type="submit">Search</button>
            <select name="sort">
                <option value="">Sort By</option>
                <option value="id" {{ request('sort') == 'id' ? 'selected' : '' }}>ID</option>
                <option value="task_name" {{ request('sort') == 'task_name' ? 'selected' : '' }}>Task Name</option>
                <option value="start_date" {{ request('sort') == 'start_date' ? 'selected' : '' }}>Start Date</option>
                <option value="end_date" {{ request('sort') == 'end_date' ? 'selected' : '' }}>End Date</option>
                <option value="duration" {{ request('sort') == 'duration' ? 'selected' : '' }}>Duration</option>
                <option value="progress" {{ request('sort') == 'progress' ? 'selected' : '' }}>Progress</option>
            </select>
                    <a href="{{ route('schedules.create') }}">Create Schedule</a>

        <button type="submit">Sort</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th><a href="{{ route('schedules.index', ['sort' => request('sort') == 'id' ? '-id' : 'id', 'search' => request('search')]) }}">ID</a></th>
                    <th><a href="{{ route('schedules.index', ['sort' => request('sort') == 'task_name' ? '-task_name' : 'task_name', 'search' => request('search')]) }}">Task Name</a></th>
                    <th><a href="{{ route('schedules.index', ['sort' => request('sort') == 'start_date' ? '-start_date' : 'start_date', 'search' => request('search')]) }}">Start Date</a></th>
                    <th><a href="{{ route('schedules.index', ['sort' => request('sort') == 'end_date' ? '-end_date' : 'end_date', 'search' => request('search')]) }}">End Date</a></th>
                    <th><a href="{{ route('schedules.index', ['sort' => request('sort') == 'duration' ? '-duration' : 'duration', 'search' => request('search')]) }}">Duration</a></th>
                    <th><a href="{{ route('schedules.index', ['sort' => request('sort') == 'progress' ? '-progress' : 'progress', 'search' => request('search')]) }}">Progress</a></th>
                    <th>Project ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($schedules as $schedule)
                <tr>
                    <td>{{ $schedule->id }}</td>
                    <td>{{ $schedule->task_name }}</td>
                    <td>{{ $schedule->start_date }}</td>
                    <td>{{ $schedule->end_date }}</td>
                    <td>{{ $schedule->duration }}</td>
                    <td>{{ $schedule->progress }}</td>
                    <td>{{ $schedule->project_id }}</td>
                    <td><a href="{{ route('schedules.show', $schedule->id) }}">View</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
            {{ $schedules->appends(request()->query())->links() }}
    </div>
@endsection
