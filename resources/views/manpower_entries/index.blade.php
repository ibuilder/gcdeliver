@extends('layouts.app')

@section('content')
    <div>
        <h1>Manpower Entries</h1>
        <a href="{{ route('manpower_entries.create') }}">Create New Manpower Entry</a>
    </div>

    <div>
        <table>
            <thead>
                <tr>
                    <th>Daily Report ID</th>
                    <th>Role</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($manpowerEntries as $manpowerEntry)
                    <tr>
                        <td>{{ $manpowerEntry->daily_report_id }}</td>
                        <td>{{ $manpowerEntry->role }}</td>
                        <td>{{ $manpowerEntry->quantity }}</td>
                        <td>
                            <a href="{{ route('manpower_entries.show', $manpowerEntry->id) }}">View</a>
                            <a href="{{ route('manpower_entries.edit', $manpowerEntry->id) }}">Edit</a>
                            <form action="{{ route('manpower_entries.destroy', $manpowerEntry->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
