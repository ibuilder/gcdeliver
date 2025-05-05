<?php $__env->startSection('content'); ?>
    <div>
        <h1>Create New Specification</h1>
        <a href="<?php echo e(route('specifications.index')); ?>">Specifications</a> / Create
    </div>

    <div>
        <?php if($errors->any()): ?>
            <div>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('specifications.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div>
                <label for="description">Description</label>
                <textarea name="description" id="description"></textarea>
            </div>
             <div>
                <label for="project_id">Project Id</label>
                <input type="number" name="project_id" id="project_id" required>
            </div>
            <button type="submit">Create Specification</button>
            <a href="<?php echo e(route('specifications.index')); ?>">Cancel</a>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/user/gcdeliver/resources/views/specifications/create.blade.php ENDPATH**/ ?>