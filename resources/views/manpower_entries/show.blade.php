@extends('layouts.app')

@section('content')
    <div>
        <nav>
            <ol>
                <li><a href="{{ route('manpower_entries.index') }}">Manpower Entries</a></li>
                <li>Show</li>
            </ol>
        </nav>
        <h1>Manpower Entry Details</h1>

        <p><strong>Daily Report ID:</strong> {{ $manpowerEntry->daily_report_id }}</p>
        <p><strong>Role:</strong> {{ $manpowerEntry->role }}</p>
        <p><strong>Quantity:</strong> {{ $manpowerEntry->quantity }}</p>

        <a href="{{ route('manpower_entries.index') }}">Go Back</a>
    </div>
@endsection

