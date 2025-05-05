<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Manpower Entry</title>
</head>
<body>
    <h1>Create Manpower Entry</h1>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('manpower_entries.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <label for="daily_report_id">Daily Report ID:</label>
        <input type="number" name="daily_report_id" id="daily_report_id" required><br>
        <label for="role">Role:</label>
        <input type="text" name="role" id="role" required><br>
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" id="quantity" required><br>
        <button type="submit">Create</button>
    </form>
</body>
</html>
<?php /**PATH /home/user/gcdeliver/resources/views/manpower_entries/create.blade.php ENDPATH**/ ?>