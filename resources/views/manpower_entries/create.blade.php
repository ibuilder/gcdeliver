<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Manpower Entry</title>
</head>
<body>
    <h1>Create Manpower Entry</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('manpower_entries.store') }}" method="POST">
        @csrf
        <label for="daily_report_id">Daily Report ID:</label>
        <input type="number" name="daily_report_id" id="daily_report_id" required><br>
        <label for="role">Role:</label>
        <input type="text" name="role" id="role" required><br>
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" id="quantity" required><br>
        <button type="submit">Create</button>
    </form>
</body>
</html>
