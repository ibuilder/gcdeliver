<div>
    <div>
        <a href="{{ route('projects.index') }}">Projects</a>
        / {{ $project->name }}
    </div>
    
    <h1>Project Details</h1>

    <p><strong>ID:</strong> {{ $project->id }}</p>
    <p><strong>Name:</strong> {{ $project->name }}</p>
    <p><strong>Description:</strong> {{ $project->description }}</p>
    <p><strong>Location:</strong> {{ $project->location }}</p>
    <p><strong>Start Date:</strong> {{ $project->start_date }}</p>
    <p><strong>End Date:</strong> {{ $project->end_date }}</p>
    
    <a href="{{ route('projects.edit', $project->id) }}">Edit</a>
    <a href="{{ url()->previous() }}">Go Back</a>
</div>
