@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $project->name }}</h1>

        <p>{{ $project->description }}</p>

        @can('manage-projects')
            <a href="{{ route('projects.edit', $project) }}">Edit Project</a>
        @endcan

        @can('manage-projects')
            <form action="{{ route('projects.destroy', $project) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure?')">
                    Delete Project
                </button>
            </form>
        @endcan

        <h2>Project Items</h2>
        @if($project->items->isNotEmpty())
            <ul>
                @foreach($project->items as $item)
                    <li>
                        <a href="{{ route('items.show', $item) }}">{{ $item->name }}</a> 
                        (Quantity: {{ $item->quantity }}, Unit: {{ $item->unit }}, Status: {{ $item->status }})
                        

                    </li>
                @endforeach
            </ul>
        @else
            <p>No items associated with this project.</p>
        @endif

        <h2>Project Deliveries</h2>
        @if($project->deliveries->isNotEmpty())
            <ul>
                @foreach($project->deliveries as $delivery)
                    <li>                        
                        <a href="{{ route('deliveries.show', $delivery) }}">Delivery ID: {{ $delivery->id }}</a> (Date: {{ $delivery->delivery_date }}, Status: {{ $delivery->status }})

                    </li>
                @endforeach
            </ul>
        @else
            <p>No deliveries associated with this project.</p>
        @endif
        
        <h2>Project Schedules</h2>
        @if($project->schedules->isNotEmpty())
            <ul>
                @foreach($project->schedules as $schedule)
                    <li>                        
                        <a href="{{ route('schedules.show', $schedule) }}">                            
                        {{ $schedule->name ?? 'Schedule ID: '.$schedule->id }}                        
                        </a>
                        @if ($schedule->start_date && $schedule->end_date)
                            (Start: {{ $schedule->start_date }}, End: {{ $schedule->end_date }})                            
                        @endif
                    </li>
                @endforeach
            </ul>
        @else
            <p>No schedules associated with this project.</p>
        @endif
        
        <h2>Assigned Users</h2>
        @if($project->users->isNotEmpty())
            <ul>
                @foreach($project->users as $user)
                    <li>{{ $user->name }} ({{ $user->email }})</li>
                @endforeach
            </ul>
        @else
            <p>No users assigned.</p>
        @endif
        <h2>Project Users</h2>
        @if($project->users->isNotEmpty())
            <ul>
                @foreach($project->users as $user)
                    <li>
                        <a href="{{ route('users.show', $user) }}">{{ $user->name }}</a>
                        ({{ $user->email }})
                    </li>
                    
                @endforeach
            </ul>
        @else
            <p>No users associated with this project.</p>
        @endif

        <a href="{{ url()->previous() }}">Go Back</a>
    </div>
@endsection
