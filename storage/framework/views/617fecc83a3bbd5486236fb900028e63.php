<?php $__env->startSection('content'); ?>
    <div>
        <h1>Edit Task Dependency</h1>

        <form method="POST" action="<?php echo e(route('task_dependencies.update', $taskDependency->id)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div>
                <label for="task_id">Task ID</label>
                <input type="text" id="task_id" name="task_id" value="<?php echo e($taskDependency->task_id); ?>" required>
            </div>

            <div>
                <label for="dependent_task_id">Dependent Task ID</label>
                <input type="text" id="dependent_task_id" name="dependent_task_id" value="<?php echo e($taskDependency->dependent_task_id); ?>" required>
            </div>

            <button type="submit">Save</button>
            <a href="<?php echo e(route('task_dependencies.index')); ?>">Cancel</a>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/user/gcdeliver/resources/views/task_dependencies/edit.blade.php ENDPATH**/ ?>