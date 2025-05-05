<div>
    <div>
        <a href="<?php echo e(route('schedules.index')); ?>">Schedules</a> >
        <a href="<?php echo e(route('schedules.show', $schedule->id)); ?>"><?php echo e($schedule->task_name); ?></a> >
        Edit
    </div>
    <h1>Edit Schedule</h1>

    <form method="POST" action="<?php echo e(route('schedules.update', $schedule->id)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div>
            <label for="project_id">Project ID</label>
            <input type="number" name="project_id" id="project_id" value="<?php echo e(old('project_id', $schedule->project_id)); ?>" required>
        </div>

        <div>
            <label for="task_name">Task Name</label>
            <input type="text" name="task_name" id="task_name" value="<?php echo e(old('task_name', $schedule->task_name)); ?>" required>
        </div>

        <div>
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" id="start_date" value="<?php echo e(old('start_date', $schedule->start_date)); ?>" required>
        </div>

        <div>
            <label for="end_date">End Date</label>
            <input type="date" name="end_date" id="end_date" value="<?php echo e(old('end_date', $schedule->end_date)); ?>" required>
        </div>

        <div>
            <label for="duration">Duration</label>
            <input type="number" name="duration" id="duration" value="<?php echo e(old('duration', $schedule->duration)); ?>" required>
        </div>

        <div>
            <label for="progress">Progress</label>
            <input type="number" name="progress" id="progress" value="<?php echo e(old('progress', $schedule->progress)); ?>" required>
        </div>
        <button type="submit">Update</button>
        <a href="<?php echo e(route('schedules.index')); ?>">Cancel</a>
    </form>
</div>
<?php /**PATH /home/user/gcdeliver/resources/views/schedules/edit.blade.php ENDPATH**/ ?>