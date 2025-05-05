<div>
    <?php if(empty($notifications)): ?>
        <p>No new notifications</p>
    <?php else: ?>
    <ul>
        <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($notification->data['message']); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <?php endif; ?>
    <a href="#">Clear all notifications</a>
</div><?php /**PATH /home/user/gcdeliver/resources/views/layouts/notifications.blade.php ENDPATH**/ ?>