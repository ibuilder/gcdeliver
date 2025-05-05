<div>
    <div>
        <a href="<?php echo e(route('items.index')); ?>">Items</a> /
        <a href="<?php echo e(route('items.show', $item->id)); ?>"><?php echo e($item->name); ?></a> /
        <span>Edit</span>
    </div>
    <h1>Edit Item</h1>
    <form method="POST" action="<?php echo e(route('items.update', $item->id)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div>
            <label for="project_id">Project ID</label>
            <input type="text" name="project_id" id="project_id" value="<?php echo e($item->project_id); ?>">
        </div>
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="<?php echo e($item->name); ?>">
        </div>
        <div>
            <label for="description">Description</label>
            <input type="text" name="description" id="description" value="<?php echo e($item->description); ?>">
        </div>
        <div>
            <label for="spec_section">Spec Section</label>
            <input type="text" name="spec_section" id="spec_section" value="<?php echo e($item->spec_section); ?>">
        </div>
        <div>
            <label for="unit">Unit</label>
            <input type="text" name="unit" id="unit" value="<?php echo e($item->unit); ?>">
        </div>
        <div>
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" id="quantity" value="<?php echo e($item->quantity); ?>">
        </div>
        <div><label for="unit_price">Unit Price</label><input type="number" name="unit_price" id="unit_price" value="<?php echo e($item->unit_price); ?>"></div><div><label for="lead_time">Lead Time</label><input type="number" name="lead_time" id="lead_time" value="<?php echo e($item->lead_time); ?>"></div><div><label for="status">Status</label><input type="text" name="status" id="status" value="<?php echo e($item->status); ?>"></div>
        <button type="submit">Save</button>
        <a href="<?php echo e(route('items.index')); ?>">Cancel</a>
    </form>
</div>
<?php /**PATH /home/user/gcdeliver/resources/views/items/edit.blade.php ENDPATH**/ ?>