@extends('layouts.app')

@section('content')
    <h1>Partners</h1>

    <a href="{{ route('partners.create') }}">Create Partner</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Contact Information</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($partners as $partner)
                    <tr>
                        <td>{{ $partner->id }}</td>
                        <td>{{ $partner->name }}</td>
                        <td>{{ $partner->contact_information }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection