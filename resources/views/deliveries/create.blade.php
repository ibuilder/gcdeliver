@extends('layouts.app')

@section('content')
    <div>
        <h1>Create New Delivery for Project: {{ $project->name }}</h1>

        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('projects.deliveries.store', $project) }}">
            @csrf

            <input type="hidden" name="project_id" id="project_id" value="{{ $project->id }}">

            <div>
                <label for="delivery_date">Delivery Date:</label>
                <input type="date" name="delivery_date" id="delivery_date" required>
            </div>

            <div>
                <label for="status">Status:</label>
                <input type="text" name="status" id="status" required>
            </div>

            <button type="submit">Create Delivery</button>
        </form>
    </div>
@endsection
