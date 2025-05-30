@extends('layouts.app')

@section('content')
    <div>
        <h1>Create New Sub Contractor</h1>

        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('sub_contractors.store') }}" method="POST">
            @csrf
            <div>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div>
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" required>
            </div>
            <div>
                <label for="contact_person">Contact Person:</label>
                <input type="text" name="contact_person" id="contact_person" required>
            </div>
            <div>
                <label for="phone_number">Phone Number:</label>
                <input type="text" name="phone_number" id="phone_number" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <button type="submit">Create Sub Contractor</button>
            <a href="{{ url()->previous() }}">Cancel</a>
        </form>
    </div>
@endsection