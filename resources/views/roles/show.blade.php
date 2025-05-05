@extends('layouts.app')

@section('content')
    <div>
        <nav>
            <ol>
                <li><a href="{{ route('roles.index') }}">Roles</a></li>
                <li>{{ $role->name }}</li>
            </ol>
        </nav>
        <h1>Role Details</h1>

        <p><strong>Name:</strong> {{ $role->name }}</p>

        <a href="{{ route('roles.index') }}">Back</a>
    </div>
@endsection
