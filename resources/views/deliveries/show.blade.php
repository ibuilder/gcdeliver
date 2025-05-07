@extends('layouts.app')
 
@section('content')
    <h1>Delivery for Project: {{ $project->name }}</h1>
    
    <p><strong>ID:</strong> {{ $delivery->id }}</p>
    <p><strong>Delivery Date:</strong> {{ $delivery->delivery_date }}</p>
    <p><strong>Status:</strong> {{ $delivery->status }}</p>
 
    @can('manage-projects')
        <a href="{{ route('projects.deliveries.edit', [$project, $delivery]) }}">Edit Delivery</a>
        <form method="POST" action="{{ route('projects.deliveries.destroy', [$project, $delivery]) }}">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Are you sure you want to delete this delivery?')">Delete Delivery</button>
        </form>
    @endcan
    
    <a href="{{ route('projects.deliveries.index', $project) }}">Back to Deliveries</a>
@endsection
