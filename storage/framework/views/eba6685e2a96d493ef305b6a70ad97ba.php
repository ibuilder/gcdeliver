<?php $__env->startSection('content'); ?>
    <div>
        <h1>Manpower Entries</h1>
        <a href="<?php echo e(route('manpower_entries.create')); ?>">Create New Manpower Entry</a>
    </div>

    <div>
        <table>
            <thead>
                <tr>
                    <th>Daily Report ID</th>
                    <th>Role</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $manpowerEntries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manpowerEntry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($manpowerEntry->daily_report_id); ?></td>
                        <td><?php echo e($manpowerEntry->role); ?></td>
                        <td><?php echo e($manpowerEntry->quantity); ?></td>
                        <td>
                            <a href="<?php echo e(route('manpower_entries.show', $manpowerEntry->id)); ?>">View</a>
                            <a href="<?php echo e(route('manpower_entries.edit', $manpowerEntry->id)); ?>">Edit</a>
                            <form action="<?php echo e(route('manpower_entries.destroy', $manpowerEntry->id)); ?>" method="POST" style="display: inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/user/gcdeliver/resources/views/manpower_entries/index.blade.php ENDPATH**/ ?>