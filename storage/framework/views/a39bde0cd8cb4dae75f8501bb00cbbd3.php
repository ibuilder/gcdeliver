<?php $__env->startSection('content'); ?>
    <div>
        <div>
            <a href="<?php echo e(route('roles.index')); ?>">Roles</a> / Edit
        </div>
        <h1>Edit Role</h1>

        <?php if($errors->any()): ?>
            <div>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('roles.update', $role->id)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?php echo e(old('name', $role->name)); ?>" required>
            </div>
            <button type="submit">Save Changes</button>
            <a href="<?php echo e(route('roles.index')); ?>">Cancel</a>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/user/gcdeliver/resources/views/roles/edit.blade.php ENDPATH**/ ?>