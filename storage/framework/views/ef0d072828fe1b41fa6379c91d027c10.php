<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('partners.index')); ?>">Partners</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo e($partner->name); ?></li>
        </ol>
    </nav>
    <h1>Partner Details</h1>

    <p><strong>ID:</strong> <?php echo e($partner->id); ?></p>
    <p><strong>Name:</strong> <?php echo e($partner->name); ?></p>
    <p><strong>Address:</strong> <?php echo e($partner->address); ?></p>
    <p><strong>Contact Person:</strong> <?php echo e($partner->contact_person); ?></p>
    <p><strong>Phone Number:</strong> <?php echo e($partner->phone_number); ?></p>
    <p><strong>Email:</strong> <?php echo e($partner->email); ?></p>

    <a href="<?php echo e(route('partners.edit', $partner->id)); ?>">Edit</a>
    <a href="<?php echo e(url()->previous()); ?>">Go Back</a>
</div>
<?php /**PATH /home/user/gcdeliver/resources/views/partners/show.blade.php ENDPATH**/ ?>