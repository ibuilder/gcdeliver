@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create New Item for Project: {{ $project->name }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('projects.items.store', $project) }}" method="POST">
        @csrf
        <input type="hidden" name="project_id" value="{{ $project->id }}">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
      
        
        <div class="form-group">
            <label for="unit">Unit:</label>
            <input type="text" name="unit" id="unit" class="form-control" required>
        </div>
       
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" id="quantity" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="stock_level">Stock Level:</label>
            <input type="number" name="stock_level" id="stock_level" class="form-control">
        </div>
        <div class="form-group">
            <label for="reorder_point">Reorder Point:</label>
            <input type="number" name="reorder_point" id="reorder_point" class="form-control">
        </div>
        

        <button type="submit" class="btn btn-primary">Create Item</button>
       
    </form>
</div>
@endsection
