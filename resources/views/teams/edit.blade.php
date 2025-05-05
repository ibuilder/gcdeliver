@extends('layouts.app')

@section('content')
    <div>
        <h1>Edit Team</h1>

        <form method="POST" action="{{ route('teams.update', $team->id) }}">
            @csrf
            @method('PUT')

            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ $team->name }}" required>
            </div>

            <button type="submit">Save</button>
            <a href="{{ route('teams.index') }}">Cancel</a>
        </form>
    </div>
@endsection