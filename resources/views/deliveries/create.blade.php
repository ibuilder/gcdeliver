<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Delivery</title>
</head>
<body>
    <h1>Create New Delivery</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('deliveries.store') }}">
        @csrf

        <div>
            <label for="scheduled_date">Scheduled Date:</label>
            <input type="date" name="scheduled_date" id="scheduled_date" required>
        </div>
        <div><label for="time_slot">Time Slot:</label><input type="text" name="time_slot" id="time_slot" required></div>
        <div><label for="location">Location:</label><textarea name="location" id="location" required></textarea></div>
        <div><label for="unload_duration">Unload Duration:</label><input type="text" name="unload_duration" id="unload_duration" required></div>

        <button type="submit">Create Delivery</button>
    </form>
</body>
</html>
