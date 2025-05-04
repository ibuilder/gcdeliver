@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Items</h1>

        <input type="text" id="searchInput" placeholder="Search..." class="form-control mb-3">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th><a href="{{ route('items.index', ['sort' => 'id', 'order' => (request('sort') == 'id' && request('order') == 'asc') ? 'desc' : 'asc']) }}">ID</a></th>
                    <th><a href="{{ route('items.index', ['sort' => 'name', 'order' => (request('sort') == 'name' && request('order') == 'asc') ? 'desc' : 'asc']) }}">Name</a></th>
                    <th><a href="{{ route('items.index', ['sort' => 'spec_section', 'order' => (request('sort') == 'spec_section' && request('order') == 'asc') ? 'desc' : 'asc']) }}">Specifications</a></th>
                    <th><a href="{{ route('items.index', ['sort' => 'lead_time', 'order' => (request('sort') == 'lead_time' && request('order') == 'asc') ? 'desc' : 'asc']) }}">Lead Time</a></th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->spec_section }}</td>
                        <td>{{ $item->lead_time }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="{{ route('items.show', $item->id) }}" class="btn btn-info btn-sm">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('items.create') }}" class="btn btn-primary mb-3">Create Item</a>

        <div class="d-flex justify-content-center">
            {{ $items->appends(request()->except('page'))->links() }}
        </div>
    </div>
@endsection
