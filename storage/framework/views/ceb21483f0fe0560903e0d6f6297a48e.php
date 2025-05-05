<?php $__env->startSection('content'); ?>
    <div>
        <h1>Delivery Items</h1>
        <a href="<?php echo e(route('delivery_items.create')); ?>">Create Delivery Item</a>
    </div>

    <div>
        <table>
            <thead>
                <tr>
                    <th>Delivery ID</th>
                    <th>Item ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $deliveryItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deliveryItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($deliveryItem->delivery_id); ?></td>
                        <td><?php echo e($deliveryItem->item_id); ?></td>
                        <td>
                            <a href="<?php echo e(route('delivery_items.show', $deliveryItem->id)); ?>">View</a>
                            <a href="<?php echo e(route('delivery_items.edit', $deliveryItem->id)); ?>">Edit</a>
                             <form action="<?php echo e(route('delivery_items.destroy', $deliveryItem->id)); ?>" method="POST" style="display: inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?> <button type="submit" onclick="return confirm('Are you sure?')">Delete</button> </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/user/gcdeliver/resources/views/delivery_items/index.blade.php ENDPATH**/ ?>