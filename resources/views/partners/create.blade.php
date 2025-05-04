@extends('layouts.app')

@section('content')
<h1>Create New Partner</h1>

<div>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('partners.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div>
            <label for="contact_information">Contact Information</label>
            <input type="text" name="contact_information" id="contact_information" required>
        </div>
        <button type="submit">Create Partner</button>
    </form>

</div>
@endsection
