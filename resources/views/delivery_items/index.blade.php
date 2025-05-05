@extends('layouts.app')

@section('content')
    <div>
        <h1>Delivery Items</h1>
        <a href="{{ route('delivery_items.create') }}">Create Delivery Item</a>
    </div>

    <div>
        <table>
            <thead>
                <tr>
                    <th>Delivery ID</th>
                    <th>Item ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($deliveryItems as $deliveryItem)
                    <tr>
                        <td>{{ $deliveryItem->delivery_id }}</td>
                        <td>{{ $deliveryItem->item_id }}</td>
                        <td>
                            <a href="{{ route('delivery_items.show', $deliveryItem->id) }}">View</a>
                            <a href="{{ route('delivery_items.edit', $deliveryItem->id) }}">Edit</a>
                             <form action="{{ route('delivery_items.destroy', $deliveryItem->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE') <button type="submit" onclick="return confirm('Are you sure?')">Delete</button> </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
