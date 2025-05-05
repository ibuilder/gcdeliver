<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Dashboard</h1>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Project Summary</div>
                    <div class="card-body">
                        <p>Total Projects: <?php echo e($summary_data['total_projects']); ?></p>
                        <p>Projects In Progress: <?php echo e($summary_data['projects_in_progress']); ?></p>
                        <p>Completed Projects: <?php echo e($summary_data['completed_projects']); ?></p>
                        <p>Total Deliveries: <?php echo e($summary_data['total_deliveries']); ?></p>
                        <p>Total Schedules: <?php echo e($summary_data['total_schedules']); ?></p>
                        <p>Total Daily Reports: <?php echo e($summary_data['total_daily_reports']); ?></p>
                        
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Critical Tasks</div>                    
                    <div class="card-body">
                        <?php if($critical_tasks->isEmpty()): ?>
                            <p>No critical tasks at the moment</p>
                        <?php else: ?>
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
                                    <?php $__currentLoopData = $critical_tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                                    <tr>
                                        <td><?php echo e($task->task_name); ?></td>
                                        <td><?php echo e($task->start_date); ?></td>
                                        <td><?php echo e($task->end_date); ?></td>
                                        <td><?php echo e($task->duration); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Upcoming Deliveries</div>
                   <div class="card-body">
                        <?php if($upcoming_deliveries->isEmpty()): ?>
                            <p>No upcoming deliveries at the moment</p>
                        <?php else: ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Location</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $upcoming_deliveries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $delivery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($delivery->title); ?></td>
                                        <td><?php echo e($delivery->date); ?></td>
                                        <td><?php echo e($delivery->location); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Late Procurement Items</div>
                    <div class="card-body">
                        <?php if($late_items->isEmpty()): ?>
                            <p>No late procurement items at the moment</p>
                        <?php else: ?>
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
                                    <?php $__currentLoopData = $late_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($item->name); ?></td>
                                        <td><?php echo e($item->description); ?></td>
                                        <td><?php echo e($item->spec_section); ?></td>
                                        <td><?php echo e($item->lead_time); ?></td>
                                        <td><?php echo e($item->project->name); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/user/gcdeliver/resources/views/dashboard.blade.php ENDPATH**/ ?>