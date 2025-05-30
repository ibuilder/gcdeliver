@extends('layouts.app')

@section('content')
    <div>
        <div>
            <a href="{{ route('roles.index') }}">Roles</a> / Create
        </div>

        <h1>Create New Role</h1>

        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('roles.store') }}">
            @csrf
            <div>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required>
            </div>
            <button type="submit">Create</button>
            <a href="{{ route('roles.index') }}">Cancel</a>
        </form>
    </div>
@endsection
