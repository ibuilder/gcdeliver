<div>
    <div>
        <a href="<?php echo e(route('deliveries.index')); ?>">Deliveries</a> / <a href="<?php echo e(route('deliveries.show', $delivery->id)); ?>"><?php echo e($delivery->title); ?></a> / Edit
    </div>
    <form method="POST" action="<?php echo e(route('deliveries.update', $delivery->id)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div>
            <label for="project_id">Project ID</label>
            <input type="text" name="project_id" id="project_id" value="<?php echo e($delivery->project_id); ?>" required>
        </div>

        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="<?php echo e($delivery->title); ?>" required>
        </div>

        <div>
            <label for="date">Date</label>
            <input type="date" name="date" id="date" value="<?php echo e($delivery->date); ?>" required>
        </div>

        <div>
            <label for="time">Time</label>
            <input type="time" name="time" id="time" value="<?php echo e($delivery->time); ?>" required>
        </div>
        <div>
            <label for="location">Location</label>
            <input type="text" name="location" id="location" value="<?php echo e($delivery->location); ?>" required>
        </div>
        <button type="submit">Update</button>
        <a href="<?php echo e(route('deliveries.index')); ?>">Cancel</a>
    </form>
</div>
<?php /**PATH /home/user/gcdeliver/resources/views/deliveries/edit.blade.php ENDPATH**/ ?>