<div>
    <nav>
        <ol>
            <li><a href="<?php echo e(route('users.index')); ?>">Users</a></li>
            <li><a href="<?php echo e(route('users.show', $user->id)); ?>"><?php echo e($user->name); ?></a></li>
            <li>Edit</li>
        </ol>
    </nav>
    <h1>Edit User</h1>

    <form method="POST" action="<?php echo e(route('users.update', $user->id)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?php echo e($user->name); ?>" required>
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo e($user->email); ?>" required>
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
        </div>

        <div>
            <label for="role">Role</label>
            <input type="text" id="role" name="role" value="<?php echo e($user->role); ?>" required>
        </div>

        <button type="submit">Update</button>
        <a href="<?php echo e(route('users.index')); ?>">Cancel</a>
    </form>
</div>
<?php /**PATH /home/user/gcdeliver/resources/views/users/edit.blade.php ENDPATH**/ ?>