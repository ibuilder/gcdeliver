<div>
    <h1>Schedule Details</h1>

    <p><strong>ID:</strong> {{ $schedule->id }}</p>
    <p><strong>Project:</strong> {{ $schedule->project->name }}</p>
    <p><strong>Task Name:</strong> {{ $schedule->task_name }}</p>
    <p><strong>Start Date:</strong> {{ $schedule->start_date }}</p>
    <p><strong>End Date:</strong> {{ $schedule->end_date }}</p>
    <p><strong>Duration:</strong> {{ $schedule->duration }}</p>
    <p><strong>Progress:</strong> {{ $schedule->progress }}</p>

    <a href="{{ route('schedules.edit', $schedule->id) }}">Edit</a>
    <a href="{{ route('schedules.index') }}">Back</a>
</div>
