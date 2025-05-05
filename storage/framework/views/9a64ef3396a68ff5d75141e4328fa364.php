<?php $__env->startSection('content'); ?>
    <div>
        <h1>Specifications</h1>
        <a href="<?php echo e(route('specifications.create')); ?>">Create New Specification</a>
    </div>

    <div>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Project ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $specifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($specification->name); ?></td>
                        <td><?php echo e($specification->description); ?></td>
                        <td><?php echo e($specification->project_id); ?></td>
                        <td>
                            <a href="<?php echo e(route('specifications.show', $specification->id)); ?>">View</a>
                            <a href="<?php echo e(route('specifications.edit', $specification->id)); ?>">Edit</a>
                            <form action="<?php echo e(route('specifications.destroy', $specification->id)); ?>" method="POST" style="display: inline;">
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
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/user/gcdeliver/resources/views/specifications/index.blade.php ENDPATH**/ ?>