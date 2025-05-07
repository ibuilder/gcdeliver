@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create New Project</h1>

        <div>
            <a href="{{ route('projects.index') }}">Projects</a> > Create
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('projects.store') }}" method="POST">
            @csrf

            <div>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="description">Description:</label>
                <textarea name="description" id="description"></textarea>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">Save Project</button>
            <a href="{{ route('projects.index') }}"><button type="button">Cancel</button></a>
        </form>
    </div>
@endsection
