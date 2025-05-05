@extends('layouts.app')

@section('content')
    <div>
        <h1>Edit Task Dependency</h1>

        <form method="POST" action="{{ route('task_dependencies.update', $taskDependency->id) }}">
            @csrf
            @method('PUT')

            <div>
                <label for="task_id">Task ID</label>
                <input type="text" id="task_id" name="task_id" value="{{ $taskDependency->task_id }}" required>
            </div>

            <div>
                <label for="dependent_task_id">Dependent Task ID</label>
                <input type="text" id="dependent_task_id" name="dependent_task_id" value="{{ $taskDependency->dependent_task_id }}" required>
            </div>

            <button type="submit">Save</button>
            <a href="{{ route('task_dependencies.index') }}">Cancel</a>
        </form>
    </div>
@endsection