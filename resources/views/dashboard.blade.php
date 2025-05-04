@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dashboard</h1>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Project Summary</div>
                    <div class="card-body">
                        <p>Total Projects: {{ $summary_data['total_projects'] }}</p>
                        <p>Projects In Progress: {{ $summary_data['projects_in_progress'] }}</p>
                        <p>Completed Projects: {{ $summary_data['completed_projects'] }}</p>
                        <p>Total Deliveries: {{ $summary_data['total_deliveries'] }}</p>
                        <p>Total Schedules: {{ $summary_data['total_schedules'] }}</p>
                        <p>Total Daily Reports: {{ $summary_data['total_daily_reports'] }}</p>
                        
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Critical Tasks</div>                    
                    <div class="card-body">
                        @if($critical_tasks->isEmpty())
                            <p>No critical tasks at the moment</p>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Task Name</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Duration</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($critical_tasks as $task)   
                                    <tr>
                                        <td>{{ $task->task_name }}</td>
                                        <td>{{ $task->start_date }}</td>
                                        <td>{{ $task->end_date }}</td>
                                        <td>{{ $task->duration }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Upcoming Deliveries</div>
                   <div class="card-body">
                        @if($upcoming_deliveries->isEmpty())
                            <p>No upcoming deliveries at the moment</p>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Location</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($upcoming_deliveries as $delivery)
                                    <tr>
                                        <td>{{ $delivery->title }}</td>
                                        <td>{{ $delivery->date }}</td>
                                        <td>{{ $delivery->location }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Late Procurement Items</div>
                    <div class="card-body">
                        @if($late_items->isEmpty())
                            <p>No late procurement items at the moment</p>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Spec Section</th>
                                        <th>Lead Time</th>
                                        <th>Project</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($late_items as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->spec_section }}</td>
                                        <td>{{ $item->lead_time }}</td>
                                        <td>{{ $item->project->name }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection