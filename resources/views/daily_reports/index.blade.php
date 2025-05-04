blade
<div>
    <a href="{{ route('daily_reports.create') }}">Create Daily Report</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Project ID</th>
                <th>Date</th>
                <th>Weather Conditions</th>
                <th>Notes</th>
                <th>Manpower Information</th>
            </tr>
        </thead>
        <tbody>
            @foreach($daily_reports as $daily_report)
            <tr>
                <td>{{ $daily_report->id }}</td>
                <td>{{ $daily_report->project_id }}</td>
                <td>{{ $daily_report->date }}</td>
                <td>{{ $daily_report->weather_conditions }}</td>
                <td>{{ $daily_report->notes }}</td>
                <td>{{ $daily_report->manpower_information }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>