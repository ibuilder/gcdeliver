<?php $__env->startSection('content'); ?>
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('teams.index')); ?>">Teams</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo e($team->name); ?></li>
            </ol>
        </nav>
        <h1>Team Details</h1>

        <p><strong>Name:</strong> <?php echo e($team->name); ?></p>

        <a href="<?php echo e(route('teams.index')); ?>">Go Back</a>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/user/gcdeliver/resources/views/teams/show.blade.php ENDPATH**/ ?>