<div>
    <div>
        <a href="{{ route('items.index') }}">Items</a> /
        <a href="{{ route('items.show', $item->id) }}">{{ $item->name }}</a> /
        <span>Edit</span>
    </div>
    <h1>Edit Item</h1>
    <form method="POST" action="{{ route('items.update', $item->id) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="project_id">Project ID</label>
            <input type="text" name="project_id" id="project_id" value="{{ $item->project_id }}">
        </div>
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ $item->name }}">
        </div>
        <div>
            <label for="description">Description</label>
            <input type="text" name="description" id="description" value="{{ $item->description }}">
        </div>
        <div>
            <label for="spec_section">Spec Section</label>
            <input type="text" name="spec_section" id="spec_section" value="{{ $item->spec_section }}">
        </div>
        <div>
            <label for="unit">Unit</label>
            <input type="text" name="unit" id="unit" value="{{ $item->unit }}">
        </div>
        <div>
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" id="quantity" value="{{ $item->quantity }}">
        </div>
        <div><label for="unit_price">Unit Price</label><input type="number" name="unit_price" id="unit_price" value="{{ $item->unit_price }}"></div><div><label for="lead_time">Lead Time</label><input type="number" name="lead_time" id="lead_time" value="{{ $item->lead_time }}"></div><div><label for="status">Status</label><input type="text" name="status" id="status" value="{{ $item->status }}"></div>
        <button type="submit">Save</button>
        <a href="{{ route('items.index') }}">Cancel</a>
    </form>
</div>
