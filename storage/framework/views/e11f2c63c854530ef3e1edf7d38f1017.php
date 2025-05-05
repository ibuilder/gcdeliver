<?php $__env->startSection('content'); ?>
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('item_partners.index')); ?>">Item Partners</a></li>
                <li class="breadcrumb-item active" aria-current="page">Details</li>
            </ol>
        </nav>
        <h1>Item Partner Details</h1>

        <p><strong>Item ID:</strong> <?php echo e($itemPartner->item_id); ?></p>
        <p><strong>Partner ID:</strong> <?php echo e($itemPartner->partner_id); ?></p>
        <a href="<?php echo e(route('item_partners.index')); ?>">Go Back</a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/user/gcdeliver/resources/views/item_partners/show.blade.php ENDPATH**/ ?>