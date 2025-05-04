@extends('layouts.app')

@section('content')
    <h1>Create Item Partner</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('item_partners.store') }}">
        @csrf
        <div>
            <label for="item_id">Item ID:</label>
            <input type="number" name="item_id" id="item_id" required>
        </div>
        <div>
            <label for="partner_id">Partner ID:</label>
            <input type="number" name="partner_id" id="partner_id" required>
        </div>
        <button type="submit">Create</button>
    </form>
@endsection
