@extends('layouts.app')

@section('content')
    <div>
        <h1>Schedules</h1>
        <a href="{{ route('schedules.create') }}">Create Schedule</a>

        <form action="{{ route('schedules.index') }}" method="GET">
    <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}">
    <button type="submit">Search</button>
</form>

        <table>
            <thead>
                <tr>
                    <th><a href="{{ route('schedules.index', ['sort' => request('sort') == 'id' ? '-id' : 'id', 'search' => request('search')]) }}">ID</a>
                    </th>
                    <th><a
                            href="{{ route('schedules.index', ['sort' => request('sort') == 'task_name' ? '-task_name' : 'task_name', 'search' => request('search')]) }}">Task
                            Name</a></th>
                    <th><a
                            href="{{ route('schedules.index', ['sort' => request('sort') == 'start_date' ? '-start_date' : 'start_date', 'search' => request('search')]) }}">Start
                            Date</a></th>
                    <th><a
                            href="{{ route('schedules.index', ['sort' => request('sort') == 'end_date' ? '-end_date' : 'end_date', 'search' => request('search')]) }}">End
                            Date</a></th>
                    <th><a
                            href="{{ route('schedules.index', ['sort' => request('sort') == 'duration' ? '-duration' : 'duration', 'search' => request('search')]) }}">Duration</a>
                    </th>
                    <th><a
                            href="{{ route('schedules.index', ['sort' => request('sort') == 'progress' ? '-progress' : 'progress', 'search' => request('search')]) }}">Progress</a>
                    </th>
                    <th>Project ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($schedules as $schedule)
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
