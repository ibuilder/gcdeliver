<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Delivery Item Details</h1>

    <p><strong>Delivery ID:</strong> <?php echo e($deliveryItem->delivery_id); ?></p>
    <p><strong>Item ID:</strong> <?php echo e($deliveryItem->item_id); ?></p>

    <div>
        <a href="<?php echo e(route('delivery_items.index')); ?>">Go Back</a>
    </div>
</div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/user/gcdeliver/resources/views/delivery_items/show.blade.php ENDPATH**/ ?>