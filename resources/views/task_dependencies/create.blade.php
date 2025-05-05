@extends('layouts.app')

@section('content')
    <div>
        <h1>Create Task Dependency</h1>

        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('task_dependencies.store') }}" method="POST">
            @csrf
            <div>
                <label for="task_id">Task ID:</label>
                <input type="number" name="task_id" id="task_id" required>
            </div>
            <div>
                <label for="dependent_task_id">Dependent Task ID:</label>
                <input type="number" name="dependent_task_id" id="dependent_task_id" required>
            </div>
            <button type="submit">Create Task Dependency</button>
            <a href="{{ url()->previous() }}">Cancel</a>
        </form>
    </div>
@endsection