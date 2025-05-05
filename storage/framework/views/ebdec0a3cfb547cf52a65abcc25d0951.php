<?php $__env->startSection('content'); ?>
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('manpower_entries.index')); ?>">Manpower Entries</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
        <h1>Edit Manpower Entry</h1>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('manpower_entries.update', $manpowerEntry->id)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div>
                <label for="daily_report_id">Daily Report ID:</label>
                <input type="number" name="daily_report_id" id="daily_report_id" value="<?php echo e(old('daily_report_id', $manpowerEntry->daily_report_id)); ?>" required>
            </div>
            <div>
                <label for="role">Role:</label>
                <input type="text" name="role" id="role" value="<?php echo e(old('role', $manpowerEntry->role)); ?>" required>
            </div>
            <div>
                <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" id="quantity" value="<?php echo e(old('quantity', $manpowerEntry->quantity)); ?>" required>
            </div>

            <button type="submit">Save Changes</button>
            <a href="<?php echo e(route('manpower_entries.index')); ?>">Cancel</a>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/user/gcdeliver/resources/views/manpower_entries/edit.blade.php ENDPATH**/ ?>