@extends('layouts.app')

@section('content')
    <div>
        <h1>Edit Sub Contractor</h1>

        <form method="POST" action="{{ route('sub_contractors.update', $subContractor->id) }}">
            @csrf
            @method('PUT')

            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ $subContractor->name }}" required>
            </div>

            <div>
                <label for="address">Address</label>
                <input type="text" id="address" name="address" value="{{ $subContractor->address }}" required>
            </div>

            <div>
                <label for="contact_person">Contact Person</label>
                <input type="text" id="contact_person" name="contact_person" value="{{ $subContractor->contact_person }}" required>
            </div>

            <div>
                <label for="phone_number">Phone Number</label>
                <input type="text" id="phone_number" name="phone_number" value="{{ $subContractor->phone_number }}" required>
            </div>

             <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ $subContractor->email }}" required>
            </div>

            <button type="submit">Save</button>
            <a href="{{ route('sub_contractors.index') }}">Cancel</a>
        </form>
    </div>
@endsection