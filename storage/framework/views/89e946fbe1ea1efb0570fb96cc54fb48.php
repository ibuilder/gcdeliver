<?php $__env->startSection('content'); ?>
    <div>
        <h1>Activity Dependencies</h1>
        <a href="<?php echo e(route('activity_dependencies.create')); ?>">Create Activity Dependency</a>
    </div>

    <div>
        <table>
            <thead>
                <tr>
                    <th>Activity ID</th>
                    <th>Dependent Activity ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $activityDependencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dependency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($dependency->activity_id); ?></td>
                        <td><?php echo e($dependency->dependent_activity_id); ?></td>
                        <td>
                            <a href="<?php echo e(route('activity_dependencies.show', $dependency->id)); ?>">View</a>
                            <a href="<?php echo e(route('activity_dependencies.edit', $dependency->id)); ?>">Edit</a>
                            <form action="<?php echo e(route('activity_dependencies.destroy', $dependency->id)); ?>" method="POST" style="display: inline;">
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

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/user/gcdeliver/resources/views/activity_dependencies/index.blade.php ENDPATH**/ ?>