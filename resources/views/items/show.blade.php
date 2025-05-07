@extends('layouts.app')

@section('content')
    <div>
        <h1>Item: {{ $item->name }} for Project: {{ $project->name }}</h1>

        <p><strong>Name:</strong> {{ $item->name }}</p>
        <p><strong>Quantity:</strong> {{ $item->quantity }}</p>
        <p><strong>Unit:</strong> {{ $item->unit }}</p>
        <p><strong>Status:</strong> {{ $item->status }}</p>

        <p><strong>ID:</strong> {{ $item->id }}</p>
        <p><strong>Description:</strong> {{ $item->description }}</p>
        <p><strong>Spec Section:</strong> {{ $item->spec_section }}</p>
        <p><strong>Unit Price:</strong> {{ $item->unit_price }}</p>
        <p><strong>Lead Time:</strong> {{ $item->lead_time }}</p>
        <p><strong>Stock Level:</strong> {{ $item->stock_level }}</p>
        <p><strong>Reorder Point:</strong> {{ $item->reorder_point }}</p>

        <a href="{{ route('projects.items.index', $project) }}">Back to Items for Project: {{ $project->name }}</a>

        @can('manage-projects')
            <a href="{{ route('projects.items.edit', [$project, $item]) }}">Edit Item</a>
        @endcan

        @can('manage-projects')
            <form method="POST" action="{{ route('projects.items.destroy', [$project, $item]) }}">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure you want to delete this item?')">Delete Item</button>
            </form>
        @endcan
        
        
    </div>
@endsection
