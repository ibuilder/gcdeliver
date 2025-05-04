<div>
    <h1>Create Daily Report</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>  
    @endif

    <form method="POST" action="{{ route('daily_reports.store') }}">
        @csrf
        <div>
            <label for="project_id">Project ID</label>
            <input type="number" name="project_id" id="project_id" required>
        </div>
        <div>
            <label for="report_date">Report Date</label>
            <input type="date" name="report_date" id="report_date" required>
        </div>
        <div>
            <label for="weather_conditions">Weather Conditions</label>
            <textarea name="weather_conditions" id="weather_conditions"></textarea>
        </div>
        <div>
            <label for="notes">Notes</label>
            <textarea name="notes" id="notes"></textarea>
        </div>
        <div>
            <label for="manpower_information">Manpower Information</label>
            <textarea name="manpower_information" id="manpower_information"></textarea>
        </div>        
        <button type="submit">Create Daily Report</button>
        <a href="{{ route('daily_reports.index') }}">Cancel</a>
    </form>
</div>

        <button type="submit" class="btn btn-primary">Create Daily Report</button>
    </form>
</div>