@extends('layouts.app')

@section('content')
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('item_partners.index') }}">Item Partners</a></li>
                <li class="breadcrumb-item active" aria-current="page">Details</li>
            </ol>
        </nav>
        <h1>Item Partner Details</h1>

        <p><strong>Item ID:</strong> {{ $itemPartner->item_id }}</p>
        <p><strong>Partner ID:</strong> {{ $itemPartner->partner_id }}</p>
        <a href="{{ route('item_partners.index') }}">Go Back</a>
    </div>
@endsection
