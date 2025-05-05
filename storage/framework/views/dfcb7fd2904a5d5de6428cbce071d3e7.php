<div>
    <nav>
        <a href="<?php echo e(route('users.index')); ?>">Users</a> > <?php echo e($user->name); ?>

    </nav>

    <h1>User Details</h1>


    <p><strong>ID:</strong> <?php echo e($user->id); ?></p>
    <p><strong>Name:</strong> <?php echo e($user->name); ?></p>
    <p><strong>Email:</strong> <?php echo e($user->email); ?></p>
    <p><strong>Role:</strong> <?php echo e($user->role?->name); ?></p>

    <div>
        <a href="<?php echo e(route('users.edit', $user->id)); ?>">
            <button>Edit</button>
        </a>
    </div>
    <div>
        <a href="<?php echo e(url()->previous()); ?>">
            <button>Back</button>
        </a>
    </div>
</div>



<?php /**PATH /home/user/gcdeliver/resources/views/users/show.blade.php ENDPATH**/ ?>