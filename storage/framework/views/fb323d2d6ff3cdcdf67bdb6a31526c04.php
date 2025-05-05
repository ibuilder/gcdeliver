<?php $__env->startSection('content'); ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('items.index')); ?>">Items</a></li> <li class="breadcrumb-item active" aria-current="page">Create</li>
    </ol> </nav>
<div class="container">
    <h1>Create Item</h1>

    <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>

    <form action="<?php echo e(route('items.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="project_id">Project ID:</label>
            <input type="text" name="project_id" id="project_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="spec_section">Spec Section:</label>
            <input type="text" name="spec_section" id="spec_section" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="unit">Unit:</label>
            <input type="text" name="unit" id="unit" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" id="quantity" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="unit_price">Unit Price:</label>
            <input type="number" name="unit_price" id="unit_price" class="form-control" required>
        </div>
        <div class="form-group"> <label for="lead_time">Lead Time:</label> <input type="text" name="lead_time" id="lead_time" class="form-control" required> </div>
        <div class="form-group"> <label for="status">Status:</label> <input type="text" name="status" id="status" class="form-control" required> </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="<?php echo e(route('items.index')); ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/user/gcdeliver/resources/views/items/create.blade.php ENDPATH**/ ?>