@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Projects</h1>
    <div class="filters-sort-controls">
        <label for="filter-status">Filter by Status:</label>
        <select id="filter-status">
            <option value="">All</option>
            <option value="active">Active</option>
            <option value="completed">Completed</option>
            <!-- Add more options as needed -->
        </select>

        <label for="filter-start-date">Start Date:</label>
        <input type="date" id="filter-start-date">

        <label for="filter-end-date">End Date:</label>
        <input type="date" id="filter-end-date">

        <label for="sort-field">Sort by:</label>
        <select id="sort-field"> <option value="name">Name</option> <option value="start_date">Start Date</option> <option value="end_date">End Date</option> </select>
        <label for="sort-direction">Sort Direction:</label>
        <select id="sort-direction"> <option value="asc">Ascending</option> <option value="desc">Descending</option> </select>
        <button id="apply-filters-sort">Apply</button>
    </div>
    <div id="projects-list">
        @foreach($projects as $project)
            <a href="{{ route('projects.show', $project->id) }}">
                <div>
                    <h2>{{ $project->name }}</h2>
                    <p>{{ $project->description }}</p>
                    <p>Status: {{ $project->status ?? 'N/A' }}</p>
                    <p>Start Date: {{ $project->start_date ?? 'N/A' }}, End Date: {{ $project->end_date ?? 'N/A' }}</p>
                </div>
            </a>
        @endforeach
    </div>
</div>
<style>
    #projects-list {
        padding: 20px;
    }

    #projects-list div {
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 10px;
    }
</style>
</div>
@endsection

<script>
    function fetchProjects(url) {
        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                const projectsListDiv = document.getElementById('projects-list');
                projectsListDiv.innerHTML = '';
                data.data.forEach(project => {
                    const anchorTag = document.createElement('a');
                    anchorTag.href = `/projects/${project.id}`;
                    anchorTag.innerHTML = `<h2>${project.name}</h2>
                                           <p>${project.description}</p>
                                           <p>Status: ${project.status || 'N/A'}</p>
                                           <p>Start Date: ${project.start_date || 'N/A'}, End Date: ${project.end_date || 'N/A'}</p>`;
                    projectsListDiv.appendChild(anchorTag);
                });

                let paginationDiv = document.getElementById('pagination-links');
                if (!paginationDiv) {
                    paginationDiv = document.createElement('div');
                    paginationDiv.id = 'pagination-links';
                    projectsListDiv.parentNode.insertBefore(paginationDiv, projectsListDiv.nextSibling);
                }
                paginationDiv.innerHTML = '';
                data.links.forEach(link => {
                    if (link.url) {
                        const linkTag = document.createElement('a');
                        linkTag.href = link.url;
                        linkTag.innerHTML = link.label;
                        linkTag.addEventListener('click', (event) => {
                            fetchProjects(link.url);
                            event.preventDefault();
                        });
                        paginationDiv.appendChild(linkTag);
                    }
                });
            })
            .catch(error => {
                console.error('Error fetching projects:', error);
            });
    }

    
    const filterStatus = document.getElementById('filter-status');
    const filterStartDate = document.getElementById('filter-start-date');
    const filterEndDate = document.getElementById('filter-end-date');
    const sortField = document.getElementById('sort-field');
    const sortDirection = document.getElementById('sort-direction');
    const applyFiltersSortButton = document.getElementById('apply-filters-sort');

    applyFiltersSortButton.addEventListener('click', () => {
        const status = filterStatus.value;
        const startDate = filterStartDate.value;
        const endDate = filterEndDate.value;
        const sortBy = sortField.value;
        const sortDir = sortDirection.value;

        const url = new URL('/api/projects', window.location.origin);
        const params = new URLSearchParams();
        if (status) params.append('filter[status]', status);
        if (startDate) params.append('filter[delivery_date_from]', startDate);
        if (endDate) params.append('filter[delivery_date_to]', endDate);
        if (sortBy) params.append('sort', (sortDir === 'desc' ? '-' : '') + sortBy);
        url.search = params.toString();
        fetchProjects(url.toString());
    });
    

    document.addEventListener('DOMContentLoaded', function () {
        // const url = new URL('/api/projects', window.location.origin);
        // const params = new URLSearchParams();
        // if (filterStatus.value) params.append('filter[status]', filterStatus.value);
        // if (sortField.value) params.append('sort', (sortDirection.value === 'desc' ? '-' : '') + sortField.value);
        // url.search = params.toString();
        // fetchProjects(url.toString());
    });
</script>
