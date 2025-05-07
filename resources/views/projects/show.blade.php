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
        
        <h2>Comments</h2>
        @if ($project->comments->isNotEmpty())
            <ul>
                @foreach ($project->comments as $comment)
                    <li>
                        <p>{{ $comment->body }}</p>
                        <p>by {{ $comment->user->name }}</p>
                    </li>
                @endforeach
            </ul>
        @endif
        <form action="{{ route('comments.store') }}" method="POST">
            @csrf
            <textarea name="body" required></textarea>
            <input type="hidden" name="commentable_id" value="{{ $project->id }}">
            <input type="hidden" name="commentable_type" value="App\Models\Project">            <button type="submit">Add Comment</button>
        </form>

        <h2>Files</h2>
        @if ($project->files->isNotEmpty())
            <ul>
                @foreach ($project->files as $file)
                    <li>
                        <a href="{{ route('files.download', $file) }}">{{ $file->file_name }}</a>
                    </li>
                @endforeach
            </ul>
        @endif
        <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" required>
            <input type="hidden" name="fileable_id" value="{{ $project->id }}">
            <input type="hidden" name="fileable_type" value="App\Models\Project">
            <button type="submit">Upload File</button>
        </form>


        <a href="{{ url()->previous() }}">Go Back</a>
    </div>
@endsection
