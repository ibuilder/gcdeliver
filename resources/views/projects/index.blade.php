@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Projects</h1>

        <form action="{{ route('projects.index') }}" method="GET">
            <input type="text" name="search" value="{{ $search ?? '' }}">
            <button type="submit">Search</button>
        </form>


        @can('manage-projects')
            <a href="{{ route('projects.create') }}">Create New Project</a>            
        @endcan
        
        <ul>
            @forelse ($projects as $project)
                <li>
                    <a href="{{ route('projects.show', $project) }}">{{ $project->name }}</a>
                </li>
            @empty
                <li>No projects found.</li>
            @endforelse
        </ul>
        
    </div>
@endsection
