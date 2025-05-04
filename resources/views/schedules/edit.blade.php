<div>
    <h1>Edit Schedule</h1>

    <form method="POST" action="{{ route('schedules.update', $schedule->id) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="project_id">Project ID</label>
            <input type="number" name="project_id" id="project_id" value="{{ old('project_id', $schedule->project_id) }}" required>
        </div>

        <div>
            <label for="task_name">Task Name</label>
            <input type="text" name="task_name" id="task_name" value="{{ old('task_name', $schedule->task_name) }}" required>
        </div>

        <div>
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" id="start_date" value="{{ old('start_date', $schedule->start_date) }}" required>
        </div>

        <div>
            <label for="end_date">End Date</label>
            <input type="date" name="end_date" id="end_date" value="{{ old('end_date', $schedule->end_date) }}" required>
        </div>

        <div>
            <label for="duration">Duration</label>
            <input type="number" name="duration" id="duration" value="{{ old('duration', $schedule->duration) }}" required>
        </div>

        <div>
            <label for="progress">Progress</label>
            <input type="number" name="progress" id="progress" value="{{ old('progress', $schedule->progress) }}" required>
        </div>
        <button type="submit">Update</button>
        <a href="{{ route('schedules.index') }}">Cancel</a>
    </form>
</div>
