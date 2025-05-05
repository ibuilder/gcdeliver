<?php $__env->startSection('content'); ?>
    <div>
        <h1>Create New Sub Contractor</h1>

        <?php if($errors->any()): ?>
            <div>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('sub_contractors.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div>
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" required>
            </div>
            <div>
                <label for="contact_person">Contact Person:</label>
                <input type="text" name="contact_person" id="contact_person" required>
            </div>
            <div>
                <label for="phone_number">Phone Number:</label>
                <input type="text" name="phone_number" id="phone_number" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <button type="submit">Create Sub Contractor</button>
            <a href="<?php echo e(url()->previous()); ?>">Cancel</a>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/user/gcdeliver/resources/views/sub_contractors/create.blade.php ENDPATH**/ ?>