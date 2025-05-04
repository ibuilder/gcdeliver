<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deliveries</title>
</head>
<body>
    <h1>Deliveries</h1>

     <div>
         <a href="{{ route('deliveries.create') }}">Create Delivery</a>
     </div>

    <form action="{{ route('deliveries.index') }}" method="GET">
        <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}">
        <button type="submit">Search</button>
    </form>

    <table>
        <thead>
            <tr>
                 <th>
                    <a href="{{ route('deliveries.index', ['sort' => (request('sort') === 'id-asc' ? 'id-desc' : 'id-asc')]) }}">ID</a>
                </th>
                <th>
                    <a href="{{ route('deliveries.index', ['sort' => (request('sort') === 'title-asc' ? 'title-desc' : 'title-asc')]) }}">Title</a>
                </th>
                <th><a href="{{ route('deliveries.index', ['sort' => (request('sort') === 'date-asc' ? 'date-desc' : 'date-asc')]) }}">Scheduled Date</a></th>
                <th><a href="{{ route('deliveries.index', ['sort' => (request('sort') === 'time-asc' ? 'time-desc' : 'time-asc')]) }}">Time Slot</a></th>

                <th>Location</th>
                <th>Unload Duration</th>
            </tr>
        </thead>
        <tbody>
            @foreach($deliveries as $delivery)
                <tr>
                  <td>{{ $delivery->id }}</td>
                   <td>{{ $delivery->title }}</td>
                  <td>{{ $delivery->date }}</td>
                  <td>{{ $delivery->time_slot }}</td>
                  <td>{{ $delivery->location }}</td>
                  <td>{{ $delivery->unload_duration }}</td>
                   <td>
                        <a href="{{ route('deliveries.show', $delivery->id) }}">View</a>
                    </td>
                   
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
