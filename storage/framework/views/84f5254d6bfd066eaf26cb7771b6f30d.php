<?php $__env->startSection('content'); ?>
    <div>
        <h1>Item Partners</h1>
        <a href="<?php echo e(route('item_partners.create')); ?>">Create Item Partner</a>
    </div>

    <div>
        <table>
            <thead>
                <tr>
                    <th>Item ID</th>
                    <th>Partner ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $itemPartners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemPartner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($itemPartner->item_id); ?></td>
                        <td><?php echo e($itemPartner->partner_id); ?></td>
                        <td>
                            <a href="<?php echo e(route('item_partners.show', $itemPartner->id)); ?>">View</a>
                            <a href="<?php echo e(route('item_partners.edit', $itemPartner->id)); ?>">Edit</a>
                            <form action="<?php echo e(route('item_partners.destroy', $itemPartner->id)); ?>" method="POST" style="display: inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/user/gcdeliver/resources/views/item_partners/index.blade.php ENDPATH**/ ?>