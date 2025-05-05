@extends('layouts.app')

@section('content')
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('task_dependencies.index') }}">Task Dependencies</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dependency Details</li>
            </ol>
        </nav>
        <h1>Task Dependency Details</h1>

        <p><strong>Task ID:</strong> {{ $taskDependency->task_id }}</p>
        <p><strong>Dependent Task ID:</strong> {{ $taskDependency->dependent_task_id }}</p>

        <a href="{{ route('task_dependencies.index') }}">Go Back</a>
    </div>
@endsection