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

    <h2>Files</h2>
    @if ($delivery->files->isNotEmpty())
        <ul>
            @foreach ($delivery->files as $file)
                <li><a href="{{ route('files.download', $file) }}">{{ $file->file_name }}</a></li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" required>
        <input type="hidden" name="fileable_id" value="{{ $delivery->id }}">
        <input type="hidden" name="fileable_type" value="App\Models\Delivery">
        <button type="submit">Upload File</button>
    </form>
    <a href="{{ route('projects.deliveries.index', $project) }}">Back to Deliveries</a>
@endsection
