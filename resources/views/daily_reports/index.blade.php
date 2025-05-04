<div>
    <a href="{{ route('daily_reports.create') }}">Create Daily Report</a>

    <input type="text" id="filterInput" placeholder="Filter all columns...">

    <table id="dailyReportsTable">
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
            <th><a href="{{ route('daily_reports.index', ['sort' => 'report_date', 'direction' => ($sort === 'report_date' && $direction === 'asc') ? 'desc' : 'asc']) }}">
                    Date
                    @if ($sort === 'report_date')
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const filterInput = document.getElementById('filterInput');
        const table = document.getElementById('dailyReportsTable');
        const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');

        filterInput.addEventListener('input', function () {
            const filter = filterInput.value.toUpperCase();
            for (let i = 0; i < rows.length; i++) {
                let rowData = '';
                const cells = rows[i].getElementsByTagName('td');
                for (let j = 0; j < cells.length; j++) {
                    rowData += cells[j].textContent.toUpperCase() + ' ';
                }
                if (rowData.indexOf(filter) > -1) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        });
    });
</script>