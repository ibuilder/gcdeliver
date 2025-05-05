<?php $__env->startSection('content'); ?>
    

    <form action="<?php echo e(route('users.index')); ?>" method="GET">
        <input type="text" name="search" placeholder="Search..." value="<?php echo e(request('search')); ?>">
        <button type="submit">Search</button>
    </form>

    <br>
    <table>
        <thead>
            <tr>
                <th>
                    <a href="<?php echo e(route('users.index', ['sort' => 'id', 'search' => request('search')])); ?>">ID</a>
                </th>
                <th>
                    <a href="<?php echo e(route('users.index', ['sort' => 'name', 'search' => request('search')])); ?>">Name</a>
                </th>
                <th>
                    <a href="<?php echo e(route('users.index', ['sort' => 'email', 'search' => request('search')])); ?>">Email</a>
                </th>
                <th>
                    <a href="<?php echo e(route('users.index', ['sort' => 'role', 'search' => request('search')])); ?>">Role</a>
                </th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($user->id); ?></td>
                    <td><?php echo e($user->name); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td><?php echo e($user->role_id); ?></td>
                    <td>
                        <a href="<?php echo e(route('users.show', $user->id)); ?>">View</a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <a href="<?php echo e(route('users.create')); ?>">Create User</a>
    <br>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/user/gcdeliver/resources/views/users/index.blade.php ENDPATH**/ ?>