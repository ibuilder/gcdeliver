<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('daily_reports.index') }}">Daily Reports</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $daily_report->report_date }}</li>
        </ol>
    </nav>
    <h1>Daily Report Details</h1>

    <p><strong>ID:</strong> {{ $daily_report->id }}</p>
    <p><strong>Project ID:</strong> {{ $daily_report->project_id }}</p>
    <p><strong>Report Date:</strong> {{ $daily_report->report_date }}</p>
    <p><strong>Weather Conditions:</strong> {{ $daily_report->weather_conditions }}</p>
    <p><strong>Notes:</strong> {{ $daily_report->notes }}</p>
    <p><strong>Manpower Information:</strong> {{ $daily_report->manpower_information }}</p>

    <h2>Files</h2>
    @if ($daily_report->files->isNotEmpty())
        <ul>
            @foreach ($daily_report->files as $file)
                <li><a href="{{ route('files.download', $file) }}">{{ $file->file_name }}</a></li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file">
        <input type="hidden" name="fileable_id" value="{{ $daily_report->id }}">
        <input type="hidden" name="fileable_type" value="App\Models\DailyReport">
        <button type="submit">Upload File</button>
    </form>

    <a href="{{ route('daily_reports.edit', $daily_report->id) }}">
        <button>Edit</button>
    </a>
    <a href="{{ route('daily_reports.index') }}">
        <button>Back</button>
    </a>
</div>
