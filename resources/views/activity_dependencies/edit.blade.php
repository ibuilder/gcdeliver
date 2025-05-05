@extends('layouts.app')

@section('content')
    <h1>Edit Activity Dependency</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('activity_dependencies.update', $activityDependency->id) }}">
        @csrf
        @method('PUT')

        <label for="activity_id">Activity ID:</label>
        <input type="number" name="activity_id" id="activity_id" value="{{ old('activity_id', $activityDependency->activity_id) }}" required><br>

        <label for="dependent_activity_id">Dependent Activity ID:</label>
        <input type="number" name="dependent_activity_id" id="dependent_activity_id" value="{{ old('dependent_activity_id', $activityDependency->dependent_activity_id) }}" required><br>

        <button type="submit">Update Activity Dependency</button>
        <a href="{{ route('activity_dependencies.index') }}">Cancel</a>
    </form>
@endsection

