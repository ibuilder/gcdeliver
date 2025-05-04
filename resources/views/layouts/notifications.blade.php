<div>
    @if (empty($notifications))
        <p>No new notifications</p>
    @else
    <ul>
        @foreach ($notifications as $notification)
            <li>{{ $notification->data['message'] }}</li>
        @endforeach
    </ul>
    @endif
    <a href="#">Clear all notifications</a>
</div>