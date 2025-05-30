@extends('layouts.app')

@section('content')
    <h1>Deliveries for Project: {{ $project->name }}</h1>    

    <form action="{{ route('projects.deliveries.index', $project) }}" method="GET">
        <input type="text" name="search" value="{{ $search ?? '' }}">
        <button type="submit">Search</button>
    </form>

    <div>
        <a href="{{ route('projects.deliveries.create', $project) }}">Create New Delivery</a>
    </div>
    
    @if ($deliveries->isNotEmpty())
        <ul>
            @foreach ($deliveries as $delivery)
                <li>                    
                    <a href="{{ route('projects.deliveries.show', [$project, $delivery]) }}">Delivery ID: {{ $delivery->id }}</a>
                    (Date: {{ $delivery->delivery_date }}, Status: {{ $delivery->status }})                 
                </li>
            @endforeach
        </ul>
    @else
        <p>No deliveries found for this project.</p>
    @endif
@endsection

<
