<div>
    <nav>
        <ol>
            <li><a href="{{ route('users.index') }}">Users</a></li>
            <li><a href="{{ route('users.show', $user->id) }}">{{$user->name}}</a></li>
            <li>Edit</li>
        </ol>
    </nav>
    <h1>Edit User</h1>

    <form method="POST" action="{{ route('users.update', $user->id) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}" required>
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}" required>
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
        </div>

        <div>
            <label for="role">Role</label>
            <input type="text" id="role" name="role" value="{{$user->role}}" required>
        </div>

        <button type="submit">Update</button>
        <a href="{{ route('users.index') }}">Cancel</a>
    </form>
</div>
