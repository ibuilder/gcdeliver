<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedules</title>
</head>
<body>
    <h1>Schedules</h1>
    <a href="{{ route('schedules.create') }}">Create Schedule</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Project ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach($schedules as $schedule)
            <tr>
                <td>{{ $schedule->id }}</td>
                <td>{{ $schedule->name }}</td>
                <td>{{ $schedule->description }}</td>
                <td>{{ $schedule->start_date }}</td>
                <td>{{ $schedule->end_date }}</td>
                <td>{{ $schedule->project_id }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
