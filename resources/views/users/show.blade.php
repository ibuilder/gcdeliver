<div>
    <h1>User Details</h1>

    <p><strong>ID:</strong> {{ $user->id }}</p>
    <p><strong>Name:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Role:</strong> {{ $user->role->name }}</p>

    <div>
        <a href="{{ route('users.edit', $user->id) }}">
            <button>Edit</button>
        </a>
    </div>
    <div>
        <a href="{{ url()->previous() }}">
            <button>Back</button>
        </a>
    </div>
</div>







