<div>
    <h1>Edit Project</h1>

    <form method="POST" action="{{ route('projects.update', $project->id) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ $project->name }}" required>
        </div>

        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description" required>{{ $project->description }}</textarea>
        </div>

        <div>
            <label for="location">Location</label>
            <input type="text" id="location" name="location" value="{{ $project->location }}" required>
        </div>
        <div>
            <label for="start_date">Start Date</label>
            <input type="date" id="start_date" name="start_date" value="{{ $project->start_date }}" required>
        </div>
        <div>
            <label for="end_date">End Date</label>
            <input type="date" id="end_date" name="end_date" value="{{ $project->end_date }}" required>
        </div>
        <button type="submit">Save</button>
        <a href="{{ route('projects.index') }}">Cancel</a>
    </form>
</div>
