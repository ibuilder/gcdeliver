<div>
    <h1>Item Details</h1>

    <p><strong>ID:</strong> {{ $item->id }}</p>
    <p><strong>Project:</strong> {{ $item->project->name }}</p>
    <p><strong>Name:</strong> {{ $item->name }}</p>
    <p><strong>Description:</strong> {{ $item->description }}</p>
    <p><strong>Spec Section:</strong> {{ $item->spec_section }}</p>
    <p><strong>Unit:</strong> {{ $item->unit }}</p>
    <p><strong>Quantity:</strong> {{ $item->quantity }}</p>
    <p><strong>Unit Price:</strong> {{ $item->unit_price }}</p>
    <p><strong>Lead Time:</strong> {{ $item->lead_time }}</p>
    <p><strong>Status:</strong> {{ $item->status }}</p>

    <a href="{{ route('items.edit', $item->id) }}">Edit</a>

    <button onclick="window.history.back()">Go Back</button>
</div>
