<div>
    <div>
        <a href="{{ route('schedules.index') }}">Schedules</a> > Create
    </div>

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
            <label for="project_id">Project ID</label>
            <input type="number" name="project_id" id="project_id" required>
        </div>
        <div>
            <label for="task_name">Task Name</label>
            <input type="text" name="task_name" id="task_name" required>
        </div>
        <div>
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" id="start_date" required>
        </div>
        <div>
            <label for="end_date">End Date</label>
            <input type="date" name="end_date" id="end_date" required>
        </div>
        <div>
            <label for="duration">Duration</label>
            <input type="text" name="duration" id="duration" required>
        </div>
         <div><label for="progress">Progress</label>
            <input type="number" name="progress" id="progress" required>
        </div>
        <button type="submit">Save</button>
         <a href="{{ route('schedules.index') }}">Cancel</a>
    </form>
</div>
