<div>
    <h1>Daily Report Details</h1>

    <p><strong>ID:</strong> {{ $daily_report->id }}</p>
    <p><strong>Project ID:</strong> {{ $daily_report->project_id }}</p>
    <p><strong>Report Date:</strong> {{ $daily_report->report_date }}</p>
    <p><strong>Weather Conditions:</strong> {{ $daily_report->weather_conditions }}</p>
    <p><strong>Notes:</strong> {{ $daily_report->notes }}</p>
    <p><strong>Manpower Information:</strong> {{ $daily_report->manpower_information }}</p>
    
    <a href="{{ route('daily_reports.edit', $daily_report->id) }}">
        <button>Edit</button>
    </a>

    <a href="{{ route('daily_reports.index') }}">
        <button>Back</button>
    </a>
</div>
