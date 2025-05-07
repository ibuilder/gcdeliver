@extends('layouts.app')

@section('content')
    <div>
        <h1>Edit User: {{ $user->name }}</h1>

        <form method="POST" action="{{ route('users.update', $user) }}">
            @csrf
            @method('PUT')

            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                @error('name')
                    <div>{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                @error('email')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            
            <div>
                <button type="submit">Update User</button>
                <a href="{{ route('users.show', $user) }}">Cancel</a>
            </div>

            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>
@endsection

        <button type="submit">Update</button>
        <a href="{{ route('users.index') }}">Cancel</a>
    </form>
</div>
