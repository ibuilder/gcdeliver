<div>
    <nav>
        <ol>
            <li><a href="{{ route('partners.index') }}">Partners</a></li>
            <li><a href="{{ route('partners.show', $partner->id) }}">{{ $partner->name }}</a></li>
            <li>Edit</li>
        </ol>
    </nav>
    <h1>Edit Partner</h1>

    <form method="POST" action="{{ route('partners.update', $partner->id) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ $partner->name }}" required>
        </div>

        <div>
            <label for="address">Address</label>
            <input type="text" id="address" name="address" value="{{ $partner->address }}" required>
        </div>

        <div>
            <label for="contact_person">Contact Person</label>
            <input type="text" id="contact_person" name="contact_person" value="{{ $partner->contact_person }}" required>
        </div>

        <div>
            <label for="phone_number">Phone Number</label>
            <input type="text" id="phone_number" name="phone_number" value="{{ $partner->phone_number }}" required>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ $partner->email }}" required>
        </div>
        <button type="submit">Save</button>
        <a href="{{ route('partners.index') }}">Cancel</a>
    </form>
</div>
