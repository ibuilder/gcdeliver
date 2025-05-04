<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deliveries</title>
</head>
<body>
    <h1>Deliveries</h1>

    <a href="{{ route('deliveries.create') }}">Create Delivery</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Scheduled Date</th>
                <th>Time Slot</th>
                <th>Location</th>
                <th>Unload Duration</th>
            </tr>
        </thead>
        <tbody>
            @foreach($deliveries as $delivery)
                <tr>
                    <td>{{ $delivery->id }}</td>
                    <td>{{ $delivery->scheduled_date }}</td>
                    <td>{{ $delivery->time_slot }}</td>
                    <td>{{ $delivery->location }}</td>
                    <td>{{ $delivery->unload_duration }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
