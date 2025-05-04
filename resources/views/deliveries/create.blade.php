<div>
    <div>
        <a href="{{ route('deliveries.index') }}">Deliveries</a> > Create
    </div>

    <h1>Create New Delivery</h1>

    @if ($errors->any())
        <div>
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
            <label for="project_id">Project ID:</label>
            <input type="text" name="project_id" id="project_id" required>
        </div>
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div>
            <label for="date">Date:</label>
            <input type="date" name="date" id="date" required>
        </div>
        <div>
            <label for="time">Time:</label>
            <input type="time" name="time" id="time" required>
        </div>
        <div>
            <label for="location">Location:</label>
            <input type="text" name="location" id="location" required>
        </div>

        <button type="submit">Save</button>
        <a href="{{ route('deliveries.index') }}">Cancel</a>
    </form>
</div>
