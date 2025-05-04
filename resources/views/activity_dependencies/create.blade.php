<!-- resources/views/activity_dependencies/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Create Activity Dependency</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('activity_dependencies.store') }}">
        @csrf

        <label for="activity_id">Activity ID:</label>
        <input type="number" name="activity_id" id="activity_id" required><br>
        <label for="dependent_activity_id">Dependent Activity ID:</label>
        <input type="number" name="dependent_activity_id" id="dependent_activity_id" required><br>
        <button type="submit">Create Activity Dependency</button>
    </form>
@endsection
