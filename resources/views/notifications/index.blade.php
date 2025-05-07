<div>
    <h1>Unread Notifications</h1>

    @if ($notifications->isEmpty())
        <p>No unread notifications.</p>
    @else
        <ul>
            @foreach ($notifications as $notification)
                <li>
                    <div>
                        <p><strong>{{ $notification->data['title'] }}</strong></p>
                        <p><a href="{{ $notification->data['link'] }}">View Details</a></p>
                    </div>
                    <form method="POST" action="{{ route('notifications.markAsRead', $notification->id) }}">
                        @csrf
                        @method('PATCH') {{-- Using PATCH for updating resource status --}}
                        <input type="hidden" name="notification_id" value="{{ $notification->id }}">
                        <button type="submit">Mark as Read</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
</div>