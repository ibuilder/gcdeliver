<div>
    <div>
        <a href="{{ route('deliveries.index') }}">Deliveries</a> / <a href="{{ route('deliveries.show', $delivery->id) }}">{{ $delivery->title }}</a> / Edit
    </div>
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
        <div>
            <label for="estimated_delivery_date">Estimated Delivery Date</label>
            <input type="date" name="estimated_delivery_date" id="estimated_delivery_date" value="{{ $delivery->estimated_delivery_date }}">
        </div>
        <div>
            <label for="actual_delivery_date">Actual Delivery Date</label>
            <input type="date" name="actual_delivery_date" id="actual_delivery_date" value="{{ $delivery->actual_delivery_date }}">
        </div>
        <div>
            <label for="tracking_number">Tracking Number</label>
            <input type="text" name="tracking_number" id="tracking_number" value="{{ $delivery->tracking_number }}">
        </div>

        <button type="submit">Update</button>
        <a href="{{ route('deliveries.index') }}">Cancel</a>
    </form>
</div>
