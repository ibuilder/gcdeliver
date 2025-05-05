@extends('layouts.app')

@section('content')
    <div>
        <h1>Create New Team</h1>

        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('teams.store') }}" method="POST">
            @csrf
            <div>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required>
            </div>
            <button type="submit">Create Team</button>
            <a href="{{ url()->previous() }}">Cancel</a>
        </form>
    </div>
@endsection