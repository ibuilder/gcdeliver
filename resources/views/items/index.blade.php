@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Items for Project: {{ $project->name }}</h1>

    <a href="#" class="btn btn-primary mb-3">Create New Item</a>


    @if($items->isNotEmpty())
        <ul>
            @foreach($items as $item)
                <li>
                    <a href="{{ route('projects.items.show', [$project, $item]) }}">{{ $item->name }}</a> (Quantity: {{ $item->quantity }}, Status: {{ $item->status }})
                </li>
            @endforeach
        </ul>
    @else
        <p>No items found for this project.</p>
    @endif

</div>
@endsection
