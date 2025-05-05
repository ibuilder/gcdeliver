<div>
    <div>
        <a href="<?php echo e(route('deliveries.index')); ?>">Deliveries</a> > Create
    </div>

    <h1>Create New Delivery</h1>

    <?php if($errors->any()): ?>
        <div>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('deliveries.store')); ?>">
        <?php echo csrf_field(); ?>

        <div>
            <label for="project_id">Project ID:</label>
            <input type="text" name="project_id" id="project_id" required>
        </div>
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div>
            <label for="date">Date:</label>
            <input type="date" name="date" id="date" required>
        </div>
        <div>
            <label for="time">Time:</label>
            <input type="time" name="time" id="time" required>
        </div>
        <div>
            <label for="location">Location:</label>
            <input type="text" name="location" id="location" required>
        </div>

        <button type="submit">Save</button>
        <a href="<?php echo e(route('deliveries.index')); ?>">Cancel</a>
    </form>
</div>
<?php /**PATH /home/user/gcdeliver/resources/views/deliveries/create.blade.php ENDPATH**/ ?>