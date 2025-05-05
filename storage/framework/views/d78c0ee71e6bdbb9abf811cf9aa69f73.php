<?php $__env->startSection('content'); ?>
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('specifications.index')); ?>">Specifications</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo e($specification->name); ?></li>
            </ol>
        </nav>
        <h1>Specification Details</h1>

        <p><strong>Name:</strong> <?php echo e($specification->name); ?></p>
        <p><strong>Description:</strong> <?php echo e($specification->description); ?></p>
        <p><strong>Project ID:</strong> <?php echo e($specification->project_id); ?></p>

        <a href="<?php echo e(route('specifications.index')); ?>">Go Back</a>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/user/gcdeliver/resources/views/specifications/show.blade.php ENDPATH**/ ?>