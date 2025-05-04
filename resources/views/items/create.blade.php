@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Item</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('items.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="specifications">Specifications:</label>
                <textarea name="specifications" id="specifications" class="form-control" required></textarea>
            </div>
            <div class="form-group"> <label for="lead_time">Lead Time:</label> <input type="text" name="lead_time" id="lead_time" class="form-control" required> </div>
            <div class="form-group"> <label for="status">Status:</label> <input type="text" name="status" id="status" class="form-control" required> </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
