<?php $__env->startSection('content'); ?>
    <div>
        <nav>
            <ol>
                <li><a href="<?php echo e(route('manpower_entries.index')); ?>">Manpower Entries</a></li>
                <li>Show</li>
            </ol>
        </nav>
        <h1>Manpower Entry Details</h1>

        <p><strong>Daily Report ID:</strong> <?php echo e($manpowerEntry->daily_report_id); ?></p>
        <p><strong>Role:</strong> <?php echo e($manpowerEntry->role); ?></p>
        <p><strong>Quantity:</strong> <?php echo e($manpowerEntry->quantity); ?></p>

        <a href="<?php echo e(route('manpower_entries.index')); ?>">Go Back</a>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/user/gcdeliver/resources/views/manpower_entries/show.blade.php ENDPATH**/ ?>