<?php $__env->startSection('content'); ?>
    <div>
        <h1>Edit Sub Contractor</h1>

        <form method="POST" action="<?php echo e(route('sub_contractors.update', $subContractor->id)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?php echo e($subContractor->name); ?>" required>
            </div>

            <div>
                <label for="address">Address</label>
                <input type="text" id="address" name="address" value="<?php echo e($subContractor->address); ?>" required>
            </div>

            <div>
                <label for="contact_person">Contact Person</label>
                <input type="text" id="contact_person" name="contact_person" value="<?php echo e($subContractor->contact_person); ?>" required>
            </div>

            <div>
                <label for="phone_number">Phone Number</label>
                <input type="text" id="phone_number" name="phone_number" value="<?php echo e($subContractor->phone_number); ?>" required>
            </div>

             <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo e($subContractor->email); ?>" required>
            </div>

            <button type="submit">Save</button>
            <a href="<?php echo e(route('sub_contractors.index')); ?>">Cancel</a>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/user/gcdeliver/resources/views/sub_contractors/edit.blade.php ENDPATH**/ ?>