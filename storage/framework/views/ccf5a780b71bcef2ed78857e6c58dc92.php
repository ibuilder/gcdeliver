<?php $__env->startSection('content'); ?>
    <h1>Create Item Partner</h1>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('item_partners.store')); ?>">
        <?php echo csrf_field(); ?>
        <div>
            <label for="item_id">Item ID:</label>
            <input type="number" name="item_id" id="item_id" required>
        </div>
        <div>
            <label for="partner_id">Partner ID:</label>
            <input type="number" name="partner_id" id="partner_id" required>
        </div>
        <button type="submit">Create</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/user/gcdeliver/resources/views/item_partners/create.blade.php ENDPATH**/ ?>