<?php $__env->startSection('content'); ?>
    <div>
        <h1>Create Task Dependency</h1>

        <?php if($errors->any()): ?>
            <div>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('task_dependencies.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div>
                <label for="task_id">Task ID:</label>
                <input type="number" name="task_id" id="task_id" required>
            </div>
            <div>
                <label for="dependent_task_id">Dependent Task ID:</label>
                <input type="number" name="dependent_task_id" id="dependent_task_id" required>
            </div>
            <button type="submit">Create Task Dependency</button>
            <a href="<?php echo e(url()->previous()); ?>">Cancel</a>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/user/gcdeliver/resources/views/task_dependencies/create.blade.php ENDPATH**/ ?>