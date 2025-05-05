<div>
    <div>
        <a href="<?php echo e(route('deliveries.index')); ?>">Deliveries</a> / <?php echo e($delivery->title); ?>

    </div>
    <h1>Delivery Details</h1>
    
    <p><strong>ID:</strong> <?php echo e($delivery->id); ?></p>
    <p><strong>Project:</strong> <?php echo e($delivery->project->name); ?></p>
    <p><strong>Title:</strong> <?php echo e($delivery->title); ?></p>
    <p><strong>Date:</strong> <?php echo e($delivery->date); ?></p>
    <p><strong>Time:</strong> <?php echo e($delivery->time_slot); ?></p>
    <p><strong>Location:</strong> <?php echo e($delivery->location); ?></p>

    <h2>Items</h2>
    <ul>
        <?php $__currentLoopData = $delivery->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($item->name); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <div>
        <a href="<?php echo e(route('deliveries.edit', $delivery->id)); ?>">Edit</a>
        <a href="<?php echo e(route('deliveries.index')); ?>">Go Back</a>
    </div>
</div>
<?php /**PATH /home/user/gcdeliver/resources/views/deliveries/show.blade.php ENDPATH**/ ?>