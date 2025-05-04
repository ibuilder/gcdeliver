<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Schedule</title>
</head>
<body>
    <h1>Create New Schedule</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('schedules.store') }}">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div><label for="description">Description</label>
            <textarea name="description" id="description" required></textarea>
        </div>
        <div><label for="start_date">Start Date</label>
            <input type="date" name="start_date" id="start_date" required></div>
        <div><label for="end_date">End Date</label>
            <input type="date" name="end_date" id="end_date" required></div>
        <div><label for="project_id">Project ID</label>
            <input type="number" name="project_id" id="project_id" required></div>
        <button type="submit">Create Schedule</button>
    </form>
</body>
</html>
