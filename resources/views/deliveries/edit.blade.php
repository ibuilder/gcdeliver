@extends('layouts.app')

@section('content')
    <h1>Edit Delivery for Project: {{ $project->name }}</h1>

    <form method="POST" action="{{ route('projects.deliveries.update', [$project, $delivery]) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="delivery_date">Delivery Date</label>
            <input type="date" name="delivery_date" id="delivery_date" value="{{ old('delivery_date', $delivery->delivery_date) }}" required>
            @error('delivery_date')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="status">Status</label>
            <input type="text" name="status" id="status" value="{{ old('status', $delivery->status) }}">
            @error('status')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Update</button>
        <a href="{{ route('projects.deliveries.show', [$project, $delivery]) }}">Cancel</a>
    </form>
@endsection
