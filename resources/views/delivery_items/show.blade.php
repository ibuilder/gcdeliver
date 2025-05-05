@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Delivery Item Details</h1>

    <p><strong>Delivery ID:</strong> {{ $deliveryItem->delivery_id }}</p>
    <p><strong>Item ID:</strong> {{ $deliveryItem->item_id }}</p>

    <div>
        <a href="{{ route('delivery_items.index') }}">Go Back</a>
    </div>
</div>
@endsection



