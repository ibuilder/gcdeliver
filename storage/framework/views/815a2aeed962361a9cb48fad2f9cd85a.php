<?php $__env->startSection('content'); ?>
    <div>
        <nav>
            <ol>
                <li><a href="<?php echo e(route('roles.index')); ?>">Roles</a></li>
                <li><?php echo e($role->name); ?></li>
            </ol>
        </nav>
        <h1>Role Details</h1>

        <p><strong>Name:</strong> <?php echo e($role->name); ?></p>

        <a href="<?php echo e(route('roles.index')); ?>">Back</a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/user/gcdeliver/resources/views/roles/show.blade.php ENDPATH**/ ?>