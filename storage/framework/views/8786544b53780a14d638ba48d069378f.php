<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Delivery Item</div>

                    <div class="card-body">
                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <form method="POST" action="<?php echo e(route('delivery_items.update', $deliveryItem->id)); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>

                            <div class="form-group">
                                <label for="delivery_id">Delivery ID</label>
                                <input type="number" class="form-control" id="delivery_id" name="delivery_id" value="<?php echo e(old('delivery_id', $deliveryItem->delivery_id)); ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="item_id">Item ID</label>
                                <input type="number" class="form-control" id="item_id" name="item_id" value="<?php echo e(old('item_id', $deliveryItem->item_id)); ?>" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="<?php echo e(route('delivery_items.index')); ?>" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/user/gcdeliver/resources/views/delivery_items/edit.blade.php ENDPATH**/ ?>