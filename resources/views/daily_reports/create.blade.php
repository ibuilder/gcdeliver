blade
<div class="container">
    <h1>Create Daily Report</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('daily_reports.store') }}">
        @csrf
        <div class="form-group">
            <label for="project_id">Project ID:</label>
            <input type="number" name="project_id" id="project_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" name="date" id="date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="weather_conditions">Weather Conditions:</label>
            <textarea name="weather_conditions" id="weather_conditions" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="notes">Notes:</label>
            <textarea name="notes" id="notes" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="manpower_information">Manpower Information:</label>
            <textarea name="manpower_information" id="manpower_information" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Create Daily Report</button>
    </form>
</div>