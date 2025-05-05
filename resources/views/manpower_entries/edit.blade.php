@extends('layouts.app')

@section('content')
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('manpower_entries.index') }}">Manpower Entries</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
        <h1>Edit Manpower Entry</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('manpower_entries.update', $manpowerEntry->id) }}">
            @csrf
            @method('PUT')

            <div>
                <label for="daily_report_id">Daily Report ID:</label>
                <input type="number" name="daily_report_id" id="daily_report_id" value="{{ old('daily_report_id', $manpowerEntry->daily_report_id) }}" required>
            </div>
            <div>
                <label for="role">Role:</label>
                <input type="text" name="role" id="role" value="{{ old('role', $manpowerEntry->role) }}" required>
            </div>
            <div>
                <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" id="quantity" value="{{ old('quantity', $manpowerEntry->quantity) }}" required>
            </div>

            <button type="submit">Save Changes</button>
            <a href="{{ route('manpower_entries.index') }}">Cancel</a>
        </form>
    </div>
@endsection
