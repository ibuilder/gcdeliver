@extends('layouts.app')

@section('content')
<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('activity_dependencies.index') }}">Activity Dependencies</a></li>
            <li class="breadcrumb-item active" aria-current="page">Activity Dependency {{ $activityDependency->id }}</li>
        </ol>
    </nav>
    <h1>Activity Dependency Details</h1>

    <p><strong>ID:</strong> {{ $activityDependency->id }}</p>
    <p><strong>Activity ID:</strong> {{ $activityDependency->activity_id }}</p>
    <p><strong>Dependent Activity ID:</strong> {{ $activityDependency->dependent_activity_id }}</p>
    
    <div>
    <a href="{{ route('activity_dependencies.edit', $activityDependency->id) }}">Edit</a>
    </div>

    <a href="{{ route('activity_dependencies.index') }}">Go Back</a>
</div>
@endsection
