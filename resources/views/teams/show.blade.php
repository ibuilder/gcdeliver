@extends('layouts.app')

@section('content')
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('teams.index') }}">Teams</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $team->name }}</li>
            </ol>
        </nav>
        <h1>Team Details</h1>

        <p><strong>Name:</strong> {{ $team->name }}</p>

        <a href="{{ route('teams.index') }}">Go Back</a>
    </div>
@endsection