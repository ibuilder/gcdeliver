<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Partners</h1>

        <a href="<?php echo e(route('partners.create')); ?>" class="btn btn-primary">Create Partner</a>
    </div>

        <form action="<?php echo e(route('partners.index')); ?>" method="GET" class="mb-3">
            <input type="text" name="search" placeholder="Search..." value="<?php echo e(request('search')); ?>" class="form-control">
        </form>

    <table class="table">
        <thead>
            <tr class="table-dark">
                <th><a href="<?php echo e(route('partners.index', ['sort' => 'id', 'search' => request('search')])); ?>">ID</a></th>
                <th><a href="<?php echo e(route('partners.index', ['sort' => 'name', 'search' => request('search')])); ?>">Name</a></th>
                <th><a href="<?php echo e(route('partners.index', ['sort' => 'address', 'search' => request('search')])); ?>">Address</a></th>
                <th><a href="<?php echo e(route('partners.index', ['sort' => 'contact_person', 'search' => request('search')])); ?>">Contact Person</a></th>
                <th><a href="<?php echo e(route('partners.index', ['sort' => 'phone_number', 'search' => request('search')])); ?>">Phone Number</a></th>
                <th><a href="<?php echo e(route('partners.index', ['sort' => 'email', 'search' => request('search')])); ?>">Email</a></th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($partner->id); ?></td>
                    <td><?php echo e($partner->name); ?></td>
                    <td><?php echo e($partner->address); ?></td>
                    <td><?php echo e($partner->contact_person); ?></td>
                    <td><?php echo e($partner->phone_number); ?></td>
                    <td><?php echo e($partner->email); ?></td>
                    <td>
                        <a href="<?php echo e(route('partners.show', $partner->id)); ?>" class="btn btn-sm btn-info">View</a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="7">No partners found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <?php echo e($partners->appends(request()->except('page'))->links()); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/user/gcdeliver/resources/views/partners/index.blade.php ENDPATH**/ ?>