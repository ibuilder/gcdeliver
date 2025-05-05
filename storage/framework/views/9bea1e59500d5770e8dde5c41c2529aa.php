<div>
    <div>
        <a href="<?php echo e(route('schedules.index')); ?>">Schedules</a> > Create
    </div>

    <h1>Create New Schedule</h1>

    <?php if($errors->any()): ?>
        <div>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('schedules.store')); ?>">
        <?php echo csrf_field(); ?>

        <div>
            <label for="project_id">Project ID</label>
            <input type="number" name="project_id" id="project_id" required>
        </div>
        <div>
            <label for="task_name">Task Name</label>
            <input type="text" name="task_name" id="task_name" required>
        </div>
        <div>
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" id="start_date" required>
        </div>
        <div>
            <label for="end_date">End Date</label>
            <input type="date" name="end_date" id="end_date" required>
        </div>
        <div>
            <label for="duration">Duration</label>
            <input type="text" name="duration" id="duration" required>
        </div>
         <div><label for="progress">Progress</label>
            <input type="number" name="progress" id="progress" required>
        </div>
        <button type="submit">Save</button>
         <a href="<?php echo e(route('schedules.index')); ?>">Cancel</a>
    </form>
</div>
<?php /**PATH /home/user/gcdeliver/resources/views/schedules/create.blade.php ENDPATH**/ ?>