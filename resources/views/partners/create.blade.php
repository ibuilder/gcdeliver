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
</div>

<form action="{{ route('partners.store') }}" method="POST">
    @csrf
    @include('partners._form')
    <button type="submit">Create Partner</button>
</form>
@endsection
