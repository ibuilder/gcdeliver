php


<?php $__env->startSection('content'); ?>
    <div>
        <h1>Task Dependencies</h1>
        <a href="<?php echo e(route('task_dependencies.create')); ?>">Create New Task Dependency</a>
    </div>

    <div>
        <table>
            <thead>
                <tr>
                    <th>Task ID</th>
                    <th>Dependent Task ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $taskDependencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taskDependency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($taskDependency->task_id); ?></td>
                        <td><?php echo e($taskDependency->dependent_task_id); ?></td>
                        <td>
                            <a href="<?php echo e(route('task_dependencies.show', $taskDependency->id)); ?>">View</a>
                            <a href="<?php echo e(route('task_dependencies.edit', $taskDependency->id)); ?>">Edit</a>
                            <form action="<?php echo e(route('task_dependencies.destroy', $taskDependency->id)); ?>" method="POST" style="display: inline;">
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
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/user/gcdeliver/resources/views/task_dependencies/index.blade.php ENDPATH**/ ?>