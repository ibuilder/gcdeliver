<?php $__env->startSection('content'); ?>
    <div>
        <h1>Edit Team</h1>

        <form method="POST" action="<?php echo e(route('teams.update', $team->id)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?php echo e($team->name); ?>" required>
            </div>

            <button type="submit">Save</button>
            <a href="<?php echo e(route('teams.index')); ?>">Cancel</a>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/user/gcdeliver/resources/views/teams/edit.blade.php ENDPATH**/ ?>