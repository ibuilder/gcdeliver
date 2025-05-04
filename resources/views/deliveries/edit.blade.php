<div>
    <form method="POST" action="{{ route('deliveries.update', $delivery->id) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="project_id">Project ID</label>
            <input type="text" name="project_id" id="project_id" value="{{ $delivery->project_id }}" required>
        </div>

        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ $delivery->title }}" required>
        </div>

        <div>
            <label for="date">Date</label>
            <input type="date" name="date" id="date" value="{{ $delivery->date }}" required>
        </div>

        <div>
            <label for="time">Time</label>
            <input type="time" name="time" id="time" value="{{ $delivery->time }}" required>
        </div>
        <div>
            <label for="location">Location</label>
            <input type="text" name="location" id="location" value="{{ $delivery->location }}" required>
        </div>
        <button type="submit">Update</button>
        <a href="{{ route('deliveries.index') }}">Cancel</a>
    </form>
</div>
