<?php $__env->startSection('content'); ?>
<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('activity_dependencies.index')); ?>">Activity Dependencies</a></li>
            <li class="breadcrumb-item active" aria-current="page">Activity Dependency <?php echo e($activityDependency->id); ?></li>
        </ol>
    </nav>
    <h1>Activity Dependency Details</h1>

    <p><strong>ID:</strong> <?php echo e($activityDependency->id); ?></p>
    <p><strong>Activity ID:</strong> <?php echo e($activityDependency->activity_id); ?></p>
    <p><strong>Dependent Activity ID:</strong> <?php echo e($activityDependency->dependent_activity_id); ?></p>
    
    <div>
    <a href="<?php echo e(route('activity_dependencies.edit', $activityDependency->id)); ?>">Edit</a>
    </div>

    <a href="<?php echo e(route('activity_dependencies.index')); ?>">Go Back</a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/user/gcdeliver/resources/views/activity_dependencies/show.blade.php ENDPATH**/ ?>