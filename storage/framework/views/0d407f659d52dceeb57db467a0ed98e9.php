<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Project</title>
</head>
<body>
    <h1>Create New Project</h1>

    <div>
        <a href="<?php echo e(route('projects.index')); ?>">Projects</a> > Create
    </div>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('projects.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea name="description" id="description"></textarea>
        </div>
        <div>
            <label for="location">Location:</label>
            <input type="text" name="location" id="location" required>
        </div>
        <div>
            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" id="start_date" required>
        </div>
        <div>
            <label for="end_date">End Date:</label>
            <input type="date" name="end_date" id="end_date" required>
        </div>

        <button type="submit">Create Project</button>
        <a href="<?php echo e(route('projects.index')); ?>"><button type="button">Cancel</button></a>
    </form>
</body>
</html>
<?php /**PATH /home/user/gcdeliver/resources/views/projects/create.blade.php ENDPATH**/ ?>