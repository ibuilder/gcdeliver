<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Partners</title>
</head>
<body>
    <h1>Item Partners</h1>
    <a href="{{ route('item_partners.create') }}">Create Item Partner</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Item ID</th>
                <th>Partner ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach($itemPartners as $itemPartner)
            <tr>
                <td>{{ $itemPartner->id }}</td>
                <td>{{ $itemPartner->item_id }}</td>
                <td>{{ $itemPartner->partner_id }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>



