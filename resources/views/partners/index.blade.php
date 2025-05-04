@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Partners</h1>

        <a href="{{ route('partners.create') }}" class="btn btn-primary">Create Partner</a>
    </div>

        <form action="{{ route('partners.index') }}" method="GET" class="mb-3">
            <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}" class="form-control">
        </form>

    <table class="table">
        <thead>
            <tr class="table-dark">
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
            @forelse ($partners as $partner)
                <tr>
                    <td>{{ $partner->id }}</td>
                    <td>{{ $partner->name }}</td>
                    <td>{{ $partner->address }}</td>
                    <td>{{ $partner->contact_person }}</td>
                    <td>{{ $partner->phone_number }}</td>
                    <td>{{ $partner->email }}</td>
                    <td>
                        <a href="{{ route('partners.show', $partner->id) }}" class="btn btn-sm btn-info">View</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No partners found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $partners->appends(request()->except('page'))->links() }}
@endsection