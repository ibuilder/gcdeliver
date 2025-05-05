@extends('layouts.app')

@section('content')
    <div>
        <h1>Item Partners</h1>
        <a href="{{ route('item_partners.create') }}">Create Item Partner</a>
    </div>

    <div>
        <table>
            <thead>
                <tr>
                    <th>Item ID</th>
                    <th>Partner ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($itemPartners as $itemPartner)
                    <tr>
                        <td>{{ $itemPartner->item_id }}</td>
                        <td>{{ $itemPartner->partner_id }}</td>
                        <td>
                            <a href="{{ route('item_partners.show', $itemPartner->id) }}">View</a>
                            <a href="{{ route('item_partners.edit', $itemPartner->id) }}">Edit</a>
                            <form action="{{ route('item_partners.destroy', $itemPartner->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection



