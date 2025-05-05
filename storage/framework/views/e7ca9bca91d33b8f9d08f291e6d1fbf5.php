<?php $__env->startSection('content'); ?>
    <div>
        <div>
            <a href="<?php echo e(route('item_partners.index')); ?>">Item Partners</a>
        </div>
        <h1>Edit Item Partner</h1>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('item_partners.update', $itemPartner->id)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div>
                <label for="item_id">Item ID:</label>
                <input type="number" name="item_id" id="item_id" value="<?php echo e(old('item_id', $itemPartner->item_id)); ?>" required>
            </div>
            <div> <label for="partner_id">Partner ID:</label> <input type="number" name="partner_id" id="partner_id" value="<?php echo e(old('partner_id', $itemPartner->partner_id)); ?>" required> </div>
            <button type="submit">Update</button>
            <a href="<?php echo e(route('item_partners.index')); ?>">Cancel</a>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/user/gcdeliver/resources/views/item_partners/edit.blade.php ENDPATH**/ ?>