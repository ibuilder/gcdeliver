<div>
    <a href="{{ route('daily_reports.create') }}">Create Daily Report</a>

    <form method="GET" action="{{ route('daily_reports.index') }}">
        <input type="text" name="search" placeholder="Filter all columns..." value="{{ request('search') }}">
    </form>

    <table>
         <thead>
        <tr>
            <th>
                <a href="{{ route('daily_reports.index', ['sort' => 'id', 'direction' => ($sort === 'id' && $direction === 'asc') ? 'desc' : 'asc']) }}">
                    ID
                    @if ($sort === 'id')
                        @if ($direction === 'asc')
                            &#9650;
                        @else
                            &#9660;
                        @endif
                    @endif
                </a>
            </th>
            <th>
                <a href="{{ route('daily_reports.index', ['sort' => 'project_id', 'direction' => ($sort === 'project_id' && $direction === 'asc') ? 'desc' : 'asc']) }}">
                    Project ID
                    @if ($sort === 'project_id')
                        @if ($direction === 'asc')
                            &#9650;
                        @else
                            &#9660;
                        @endif
                    @endif
                </a>
            </th>
            <th>
                <a href="{{ route('daily_reports.index', ['sort' => 'report_date', 'direction' => ($sort === 'report_date' && $direction === 'asc') ? 'desc' : 'asc']) }}">
                    Date
                    @if ($sort === 'report_date')
                        @if ($direction === 'asc')
                            &#9650;
                        @else
                            &#9660;
                        @endif
                    @endif
                </a>
            </th>
            <th>
                <a href="{{ route('daily_reports.index', ['sort' => 'weather_conditions', 'direction' => ($sort === 'weather_conditions' && $direction === 'asc') ? 'desc' : 'asc']) }}">
                    Weather Conditions
                    @if ($sort === 'weather_conditions')
                        @if ($direction === 'asc')
                            &#9650;
                        @else
                            &#9660;
                        @endif
                    @endif
                </a></th>
            <th>
                <a href="{{ route('daily_reports.index', ['sort' => 'notes', 'direction' => ($sort === 'notes' && $direction === 'asc') ? 'desc' : 'asc']) }}">
                    Notes
                    @if ($sort === 'notes')
                        @if ($direction === 'asc')
                            &#9650;
                        @else
                            &#9660;
                        @endif
                    @endif
                </a></th>
            <th>Weather Conditions</th>
            <th>Notes</th>
        </tr>
        </thead>
        <tbody>
        @foreach($daily_reports as $daily_report)
            <tr onclick="window.location='{{ route('daily_reports.show', $daily_report->id) }}';">
                <td>{{ $daily_report->id }}</td>
                <td>{{ $daily_report->project_id }}</td>
                <td>{{ $daily_report->report_date }}</td>
                 <td>{{ $daily_report->weather_conditions }}</td>
                 <td>{{ $daily_report->notes }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>