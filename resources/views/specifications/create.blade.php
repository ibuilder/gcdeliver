@extends('layouts.app')

@section('content')
    <div>
        <h1>Create New Specification</h1>
        <a href="{{ route('specifications.index') }}">Specifications</a> / Create
    </div>

    <div>
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('specifications.store') }}" method="POST">
            @csrf
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div>
                <label for="description">Description</label>
                <textarea name="description" id="description"></textarea>
            </div>
             <div>
                <label for="project_id">Project Id</label>
                <input type="number" name="project_id" id="project_id" required>
            </div>
            <button type="submit">Create Specification</button>
            <a href="{{ route('specifications.index') }}">Cancel</a>
        </form>
    </div>
@endsection