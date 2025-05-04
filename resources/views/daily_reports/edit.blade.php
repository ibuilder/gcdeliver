<div>
    <h1>Edit Daily Report</h1>

    <form method="POST" action="{{ route('daily_reports.update', $dailyReport->id) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="project_id">Project ID:</label>
            <input type="text" id="project_id" name="project_id" value="{{ old('project_id', $dailyReport->project_id) }}" required>
            @error('project_id')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="report_date">Report Date:</label>
            <input type="date" id="report_date" name="report_date" value="{{ old('report_date', $dailyReport->report_date) }}" required>
            @error('report_date')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="weather_conditions">Weather Conditions:</label>
            <input type="text" id="weather_conditions" name="weather_conditions" value="{{ old('weather_conditions', $dailyReport->weather_conditions) }}" required>
            @error('weather_conditions')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="notes">Notes:</label>
            <textarea id="notes" name="notes" required>{{ old('notes', $dailyReport->notes) }}</textarea>
            @error('notes')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="manpower_information">Manpower Information:</label>
            <textarea id="manpower_information" name="manpower_information" required>{{ old('manpower_information', $dailyReport->manpower_information) }}</textarea>
            @error('manpower_information')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Save Changes</button>
        <a href="{{ route('daily_reports.index') }}">Cancel</a>
    </form>
</div>
