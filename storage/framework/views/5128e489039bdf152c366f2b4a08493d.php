<!-- resources/views/activity_dependencies/create.blade.php -->



<?php $__env->startSection('content'); ?>
    <h1>Create Activity Dependency</h1>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('activity_dependencies.store')); ?>">
        <?php echo csrf_field(); ?>

        <label for="activity_id">Activity ID:</label>
        <input type="number" name="activity_id" id="activity_id" required><br>
        <label for="dependent_activity_id">Dependent Activity ID:</label>
        <input type="number" name="dependent_activity_id" id="dependent_activity_id" required><br>
        <button type="submit">Create Activity Dependency</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/user/gcdeliver/resources/views/activity_dependencies/create.blade.php ENDPATH**/ ?>