<?php $__env->startSection('content'); ?>
    <div>
        <h1>Schedules</h1>
        <a href="<?php echo e(route('schedules.create')); ?>">Create Schedule</a>

        <form action="<?php echo e(route('schedules.index')); ?>" method="GET">
    <input type="text" name="search" placeholder="Search..." value="<?php echo e(request('search')); ?>">
    <button type="submit">Search</button>
</form>

        <table>
            <thead>
                <tr>
                    <th><a href="<?php echo e(route('schedules.index', ['sort' => request('sort') == 'id' ? '-id' : 'id', 'search' => request('search')])); ?>">ID</a>
                    </th>
                    <th><a
                            href="<?php echo e(route('schedules.index', ['sort' => request('sort') == 'task_name' ? '-task_name' : 'task_name', 'search' => request('search')])); ?>">Task
                            Name</a></th>
                    <th><a
                            href="<?php echo e(route('schedules.index', ['sort' => request('sort') == 'start_date' ? '-start_date' : 'start_date', 'search' => request('search')])); ?>">Start
                            Date</a></th>
                    <th><a
                            href="<?php echo e(route('schedules.index', ['sort' => request('sort') == 'end_date' ? '-end_date' : 'end_date', 'search' => request('search')])); ?>">End
                            Date</a></th>
                    <th><a
                            href="<?php echo e(route('schedules.index', ['sort' => request('sort') == 'duration' ? '-duration' : 'duration', 'search' => request('search')])); ?>">Duration</a>
                    </th>
                    <th><a
                            href="<?php echo e(route('schedules.index', ['sort' => request('sort') == 'progress' ? '-progress' : 'progress', 'search' => request('search')])); ?>">Progress</a>
                    </th>
                    <th>Project ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($schedule->id); ?></td>
                        <td><?php echo e($schedule->task_name); ?></td>
                        <td><?php echo e($schedule->start_date); ?></td>
                        <td><?php echo e($schedule->end_date); ?></td>
                        <td><?php echo e($schedule->duration); ?></td>
                        <td><?php echo e($schedule->progress); ?></td>
                        <td><?php echo e($schedule->project_id); ?></td>
                        <td><a href="<?php echo e(route('schedules.show', $schedule->id)); ?>">View</a></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php echo e($schedules->appends(request()->query())->links()); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/user/gcdeliver/resources/views/schedules/index.blade.php ENDPATH**/ ?>