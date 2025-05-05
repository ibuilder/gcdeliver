<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Items</h1>

        <form action="<?php echo e(route('items.index')); ?>" method="GET" class="mb-3">
            <input type="text" name="search" placeholder="Search..." class="form-control" value="<?php echo e(request('search')); ?>">
        </form>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th><a href="<?php echo e(route('items.index', ['sort' => 'id', 'order' => (request('sort') == 'id' && request('order') == 'asc') ? 'desc' : 'asc', 'search' => request('search')])); ?>">ID</a></th>
                    <th><a href="<?php echo e(route('items.index', ['sort' => 'name', 'order' => (request('sort') == 'name' && request('order') == 'asc') ? 'desc' : 'asc', 'search' => request('search')])); ?>">Name</a></th>
                    <th><a href="<?php echo e(route('items.index', ['sort' => 'spec_section', 'order' => (request('sort') == 'spec_section' && request('order') == 'asc') ? 'desc' : 'asc', 'search' => request('search')])); ?>">Specifications</a></th>
                    <th><a href="<?php echo e(route('items.index', ['sort' => 'unit', 'order' => (request('sort') == 'unit' && request('order') == 'asc') ? 'desc' : 'asc', 'search' => request('search')])); ?>">Unit</a></th>
                    <th><a href="<?php echo e(route('items.index', ['sort' => 'quantity', 'order' => (request('sort') == 'quantity' && request('order') == 'asc') ? 'desc' : 'asc', 'search' => request('search')])); ?>">Quantity</a></th>
                    <th><a href="<?php echo e(route('items.index', ['sort' => 'unit_price', 'order' => (request('sort') == 'unit_price' && request('order') == 'asc') ? 'desc' : 'asc', 'search' => request('search')])); ?>">Unit Price</a></th>
                    <th><a href="<?php echo e(route('items.index', ['sort' => 'lead_time', 'order' => (request('sort') == 'lead_time' && request('order') == 'asc') ? 'desc' : 'asc', 'search' => request('search')])); ?>">Lead Time</a></th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($item->id); ?></td>
                        <td><?php echo e($item->name); ?></td>
                        <td><?php echo e($item->spec_section); ?></td>
                        <td><?php echo e($item->unit); ?></td>
                        <td><?php echo e($item->quantity); ?></td>
                        <td><?php echo e($item->unit_price); ?></td>
                        <td><?php echo e($item->lead_time); ?></td>
                        <td><?php echo e($item->status); ?></td>
                        <td>
                            <a href="<?php echo e(route('items.show', $item->id)); ?>" class="btn btn-info btn-sm">View</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <a href="<?php echo e(route('items.create')); ?>" class="btn btn-primary mb-3">Create Item</a>

        <div class="d-flex justify-content-center">
            <?php echo e($items->appends(request()->except('page'))->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/user/gcdeliver/resources/views/items/index.blade.php ENDPATH**/ ?>