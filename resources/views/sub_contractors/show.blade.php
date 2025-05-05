@extends('layouts.app')

@section('content')
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('sub_contractors.index') }}">Sub Contractors</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $subContractor->name }}</li>
            </ol>
        </nav>
        <h1>Sub Contractor Details</h1>

        <p><strong>Name:</strong> {{ $subContractor->name }}</p>
        <p><strong>Address:</strong> {{ $subContractor->address }}</p>
        <p><strong>Contact Person:</strong> {{ $subContractor->contact_person }}</p>
        <p><strong>Phone Number:</strong> {{ $subContractor->phone_number }}</p>
        <p><strong>Email:</strong> {{ $subContractor->email }}</p>

        <a href="{{ route('sub_contractors.index') }}">Go Back</a>
    </div>
@endsection