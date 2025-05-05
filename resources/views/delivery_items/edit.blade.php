@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Delivery Item</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('delivery_items.update', $deliveryItem->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="delivery_id">Delivery ID</label>
                                <input type="number" class="form-control" id="delivery_id" name="delivery_id" value="{{ old('delivery_id', $deliveryItem->delivery_id) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="item_id">Item ID</label>
                                <input type="number" class="form-control" id="item_id" name="item_id" value="{{ old('item_id', $deliveryItem->item_id) }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('delivery_items.index') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
