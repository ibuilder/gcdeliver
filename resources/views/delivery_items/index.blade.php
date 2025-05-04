<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Items</title>
</head>
<body>
    <h1>Delivery Items</h1>

    <a href="{{ route('delivery_items.create') }}">Create Delivery Item</a>

    <table>
        <thead>
            <tr>
                <th>Delivery ID</th>
                <th>Item ID</th>
            </tr>
        </thead>
    </table>
</body>
</html>
