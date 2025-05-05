<?php $__env->startSection('content'); ?>
    <div>
        <h1>Teams</h1>
        <a href="<?php echo e(route('teams.create')); ?>">Create New Team</a>
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
                <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($team->name); ?></td>
                        <td>
                            <a href="<?php echo e(route('teams.show', $team->id)); ?>">View</a>
                            <a href="<?php echo e(route('teams.edit', $team->id)); ?>">Edit</a>
                            <form action="<?php echo e(route('teams.destroy', $team->id)); ?>" method="POST" style="display: inline;">
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
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/user/gcdeliver/resources/views/teams/index.blade.php ENDPATH**/ ?>