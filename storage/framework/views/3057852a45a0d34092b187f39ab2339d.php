<?php $__env->startSection('content'); ?>
    <div>
        <h1>Roles</h1>
        <a href="<?php echo e(route('roles.create')); ?>">Create New Role</a>
    </div>

    <div>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($role->name); ?></td>
                        <td>
                            <a href="<?php echo e(route('roles.show', $role->id)); ?>">View</a>
                            <a href="<?php echo e(route('roles.edit', $role->id)); ?>">Edit</a>
                            <form action="<?php echo e(route('roles.destroy', $role->id)); ?>" method="POST" style="display: inline;">
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


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/user/gcdeliver/resources/views/roles/index.blade.php ENDPATH**/ ?>