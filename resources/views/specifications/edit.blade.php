@extends('layouts.app')

@section('content')
    <div>
        <h1>Edit Specification</h1>

        <form method="POST" action="{{ route('specifications.update', $specification->id) }}">
            @csrf
            @method('PUT')

            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ $specification->name }}" required>
            </div>

            <div>
                <label for="description">Description</label>
                <textarea id="description" name="description" required>{{ $specification->description }}</textarea>
            </div>

            <div>
                <label for="project_id">Project ID</label>
                <input type="number" id="project_id" name="project_id" value="{{ $specification->project_id }}" required>
            </div>

            <button type="submit">Save Changes</button>
            <a href="{{ route('specifications.index') }}">Cancel</a>
        </form>
    </div>
@endsection