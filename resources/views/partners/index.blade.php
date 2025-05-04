@extends('layouts.app')

@section('content')
    <h1>Partners</h1>

    <form action="{{ route('partners.index') }}" method="GET">
        <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}">
        <button type="submit">Search</button>
    </form>

    <table>
        <thead>
            <tr>
                <th><a href="{{ route('partners.index', ['sort' => 'id', 'search' => request('search')]) }}">ID</a></th>
                <th><a href="{{ route('partners.index', ['sort' => 'name', 'search' => request('search')]) }}">Name</a></th>
                <th><a href="{{ route('partners.index', ['sort' => 'address', 'search' => request('search')]) }}">Address</a></th>
                <th><a href="{{ route('partners.index', ['sort' => 'contact_person', 'search' => request('search')]) }}">Contact Person</a></th>
                <th><a href="{{ route('partners.index', ['sort' => 'phone_number', 'search' => request('search')]) }}">Phone Number</a></th>
                <th><a href="{{ route('partners.index', ['sort' => 'email', 'search' => request('search')]) }}">Email</a></th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($partners as $partner)
                <tr>
                    <td>{{ $partner->id }}</td>
                    <td>{{ $partner->name }}</td>
                    <td>{{ $partner->address }}</td>
                    <td>{{ $partner->contact_person }}</td>
                    <td>{{ $partner->phone_number }}</td>
                    <td>{{ $partner->email }}</td>
                    <td>
                        <a href="{{ route('partners.show', $partner->id) }}">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('partners.create') }}">Create Partner</a>

    {{ $partners->links() }}
@endsection