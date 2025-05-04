<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects</title>
</head>
<body>
    <h1>Projects</h1>
    <a href="{{ route('projects.create') }}">Create Project</a>
    
    <form action="{{ route('projects.index') }}" method="GET">
        <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}">
        <button type="submit">Search</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>
                    <a href="{{ route('projects.index', ['sort' => 'id', 'search' => request('search')]) }}">
                        ID
                    </a>
                </th>
                <th>
                    <a href="{{ route('projects.index', ['sort' => 'name', 'search' => request('search')]) }}">
                        Name
                    </a>
                </th>
                <th>Description</th>
                <th>
                    <a href="{{ route('projects.index', ['sort' => 'start_date', 'search' => request('search')]) }}">
                        Start Date
                    </a>
                </th>
                <th>
                    <a href="{{ route('projects.index', ['sort' => 'end_date', 'search' => request('search')]) }}">
                        End Date
                    </a>
                </th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->description }}</td>
                    <td>{{ $project->start_date }}</td>
                    <td>{{ $project->end_date }}</td>
                    <td>
                        <a href="{{ route('projects.show', $project->id) }}">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
