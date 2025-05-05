<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('items.index')); ?>">Items</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo e($item->name); ?></li>
        </ol>
    </nav>
    <h1>Item Details</h1>

    <p><strong>ID:</strong> <?php echo e($item->id); ?></p>
    <p><strong>Project:</strong> <?php echo e($item->project->name); ?></p>
    <p><strong>Name:</strong> <?php echo e($item->name); ?></p>
    <p><strong>Description:</strong> <?php echo e($item->description); ?></p>
    <p><strong>Spec Section:</strong> <?php echo e($item->spec_section); ?></p>
    <p><strong>Unit:</strong> <?php echo e($item->unit); ?></p>
    <p><strong>Quantity:</strong> <?php echo e($item->quantity); ?></p>
    <p><strong>Unit Price:</strong> <?php echo e($item->unit_price); ?></p>
    <p><strong>Lead Time:</strong> <?php echo e($item->lead_time); ?></p>
    <p><strong>Status:</strong> <?php echo e($item->status); ?></p>

    <a href="<?php echo e(route('items.edit', $item->id)); ?>">Edit</a>

    <button onclick="window.history.back()">Go Back</button>
</div>
<?php /**PATH /home/user/gcdeliver/resources/views/items/show.blade.php ENDPATH**/ ?>