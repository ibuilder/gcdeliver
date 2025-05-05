<?php $__env->startSection('content'); ?>
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('task_dependencies.index')); ?>">Task Dependencies</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dependency Details</li>
            </ol>
        </nav>
        <h1>Task Dependency Details</h1>

        <p><strong>Task ID:</strong> <?php echo e($taskDependency->task_id); ?></p>
        <p><strong>Dependent Task ID:</strong> <?php echo e($taskDependency->dependent_task_id); ?></p>

        <a href="<?php echo e(route('task_dependencies.index')); ?>">Go Back</a>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/user/gcdeliver/resources/views/task_dependencies/show.blade.php ENDPATH**/ ?>