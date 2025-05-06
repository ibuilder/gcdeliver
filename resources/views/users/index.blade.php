@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>User List</h1>

        @can('manage-users')
            <p>As an admin, you can manage users.</p>
        @endcan

        <ul>
            @foreach ($users as $user)
                <li>
                    {{ $user->name }} - {{ $user->email }}
                    @can('manage-users')
                     <!-- Placeholder for a delete button -->
                     <button>Delete</button>
                    @endcan
                </li>
            @endforeach
        </ul>
    </div>
@endsection
@endsection
