<?php $__env->startSection('content'); ?>
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('sub_contractors.index')); ?>">Sub Contractors</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo e($subContractor->name); ?></li>
            </ol>
        </nav>
        <h1>Sub Contractor Details</h1>

        <p><strong>Name:</strong> <?php echo e($subContractor->name); ?></p>
        <p><strong>Address:</strong> <?php echo e($subContractor->address); ?></p>
        <p><strong>Contact Person:</strong> <?php echo e($subContractor->contact_person); ?></p>
        <p><strong>Phone Number:</strong> <?php echo e($subContractor->phone_number); ?></p>
        <p><strong>Email:</strong> <?php echo e($subContractor->email); ?></p>

        <a href="<?php echo e(route('sub_contractors.index')); ?>">Go Back</a>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/user/gcdeliver/resources/views/sub_contractors/show.blade.php ENDPATH**/ ?>