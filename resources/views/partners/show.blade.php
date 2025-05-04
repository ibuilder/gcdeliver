<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('partners.index') }}">Partners</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $partner->name }}</li>
        </ol>
    </nav>
    <h1>Partner Details</h1>

    <p><strong>ID:</strong> {{ $partner->id }}</p>
    <p><strong>Name:</strong> {{ $partner->name }}</p>
    <p><strong>Address:</strong> {{ $partner->address }}</p>
    <p><strong>Contact Person:</strong> {{ $partner->contact_person }}</p>
    <p><strong>Phone Number:</strong> {{ $partner->phone_number }}</p>
    <p><strong>Email:</strong> {{ $partner->email }}</p>

    <a href="{{ route('partners.edit', $partner->id) }}">Edit</a>
    <a href="{{ url()->previous() }}">Go Back</a>
</div>
