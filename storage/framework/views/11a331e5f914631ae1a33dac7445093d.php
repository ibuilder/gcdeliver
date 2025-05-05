<div>
    <nav>
        <ol>
            <li><a href="<?php echo e(route('schedules.index')); ?>">Schedules</a></li>
            <li><?php echo e($schedule->task_name); ?></li>
        </ol>
    </nav>
    <h1>Schedule Details</h1>

    <p><strong>ID:</strong> <?php echo e($schedule->id); ?></p>
    <p><strong>Project:</strong> <?php echo e($schedule->project->name); ?></p>
    <p><strong>Task Name:</strong> <?php echo e($schedule->task_name); ?></p>
    <p><strong>Start Date:</strong> <?php echo e($schedule->start_date); ?></p>
    <p><strong>End Date:</strong> <?php echo e($schedule->end_date); ?></p>
    <p><strong>Duration:</strong> <?php echo e($schedule->duration); ?></p>
    <p><strong>Progress:</strong> <?php echo e($schedule->progress); ?></p>

    <a href="<?php echo e(route('schedules.edit', $schedule->id)); ?>">Edit</a>
    <a href="<?php echo e(route('schedules.index')); ?>">Back</a>
</div>
<?php /**PATH /home/user/gcdeliver/resources/views/schedules/show.blade.php ENDPATH**/ ?>