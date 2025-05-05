@extends('layouts.app')

@section('content')
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('specifications.index') }}">Specifications</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $specification->name }}</li>
            </ol>
        </nav>
        <h1>Specification Details</h1>

        <p><strong>Name:</strong> {{ $specification->name }}</p>
        <p><strong>Description:</strong> {{ $specification->description }}</p>
        <p><strong>Project ID:</strong> {{ $specification->project_id }}</p>

        <a href="{{ route('specifications.index') }}">Go Back</a>
    </div>
@endsection