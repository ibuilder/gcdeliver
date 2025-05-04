<div>
    <div>
        <a href="{{ route('deliveries.index') }}">Deliveries</a> / {{ $delivery->title }}
    </div>
    <h1>Delivery Details</h1>
    
    <p><strong>ID:</strong> {{ $delivery->id }}</p>
    <p><strong>Project:</strong> {{ $delivery->project->name }}</p>
    <p><strong>Title:</strong> {{ $delivery->title }}</p>
    <p><strong>Date:</strong> {{ $delivery->date }}</p>
    <p><strong>Time:</strong> {{ $delivery->time_slot }}</p>
    <p><strong>Location:</strong> {{ $delivery->location }}</p>

    <h2>Items</h2>
    <ul>
        @foreach ($delivery->items as $item)
        <li>{{$item->name}}</li>
        @endforeach
    </ul>
    <div>
        <a href="{{ route('deliveries.edit', $delivery->id) }}">Edit</a>
        <a href="{{ route('deliveries.index') }}">Go Back</a>
    </div>
</div>
