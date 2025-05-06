@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            @if ($user->profile_image)
                <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Profile Image" class="rounded-circle" width="100" height="100">
            @endif


            <h2 class="card-title">{{ $user->name }}</h2>
            <p class="card-text">{{ $user->email }}</p>
            @if (Auth::check() && Auth::user()->id === $user->id)
                <p>
                    <a href="{{ route('user.edit', ['user' => $user->id]) }}">Edit Profile</a>
                </p>
            @endif
        </div>
    </div>
</div>
@endsection