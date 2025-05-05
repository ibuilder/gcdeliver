@extends('layouts.app')

@section('content')
    <div>
        <div>
            <a href="{{ route('item_partners.index') }}">Item Partners</a>
        </div>
        <h1>Edit Item Partner</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('item_partners.update', $itemPartner->id) }}">
            @csrf
            @method('PUT')

            <div>
                <label for="item_id">Item ID:</label>
                <input type="number" name="item_id" id="item_id" value="{{ old('item_id', $itemPartner->item_id) }}" required>
            </div>
            <div> <label for="partner_id">Partner ID:</label> <input type="number" name="partner_id" id="partner_id" value="{{ old('partner_id', $itemPartner->partner_id) }}" required> </div>
            <button type="submit">Update</button>
            <a href="{{ route('item_partners.index') }}">Cancel</a>
        </form>
    </div>
@endsection
