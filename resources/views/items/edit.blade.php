@extends('layouts.app')

@section('content')
    <h1>Edit Item: {{ $item->name }} for Project: {{ $project->name }}</h1>

    <form method="POST" action="{{ route('projects.items.update', [$project, $item]) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $item->name) }}">
        </div>
        <div>
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" id="quantity" value="{{ old('quantity', $item->quantity) }}">
        </div>
        <div>
            <label for="unit">Unit</label>
            <input type="text" name="unit" id="unit" value="{{ old('unit', $item->unit) }}">
        </div>
        <div>
            <label for="status">Status</label>
            <input type="text" name="status" id="status" value="{{ old('status', $item->status) }}">
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
        <button type="submit">Update Item</button>
        <a href="{{ route('projects.items.show', [$project, $item]) }}">Cancel</a>
        </div>
@endsection
