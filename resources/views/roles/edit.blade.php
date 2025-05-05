@extends('layouts.app')

@section('content')
    <div>
        <div>
            <a href="{{ route('roles.index') }}">Roles</a> / Edit
        </div>
        <h1>Edit Role</h1>

        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('roles.update', $role->id) }}">
            @csrf
            @method('PUT')

            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $role->name) }}" required>
            </div>
            <button type="submit">Save Changes</button>
            <a href="{{ route('roles.index') }}">Cancel</a>
        </form>
    </div>
@endsection
