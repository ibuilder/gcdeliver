@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create</li>
    </ol>
</nav>
<div class="container">
    <h1>Create User</h1>

    <form method="POST" action="{{ route('users.store') }}">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            <input type="text" name="role" id="role" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
    </form>

</div>
@endsection
