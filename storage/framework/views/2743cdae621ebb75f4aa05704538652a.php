<div>
    <nav>
        <ol>
            <li><a href="<?php echo e(route('partners.index')); ?>">Partners</a></li>
            <li><a href="<?php echo e(route('partners.show', $partner->id)); ?>"><?php echo e($partner->name); ?></a></li>
            <li>Edit</li>
        </ol>
    </nav>
    <h1>Edit Partner</h1>

    <form method="POST" action="<?php echo e(route('partners.update', $partner->id)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?php echo e($partner->name); ?>" required>
        </div>

        <div>
            <label for="address">Address</label>
            <input type="text" id="address" name="address" value="<?php echo e($partner->address); ?>" required>
        </div>

        <div>
            <label for="contact_person">Contact Person</label>
            <input type="text" id="contact_person" name="contact_person" value="<?php echo e($partner->contact_person); ?>" required>
        </div>

        <div>
            <label for="phone_number">Phone Number</label>
            <input type="text" id="phone_number" name="phone_number" value="<?php echo e($partner->phone_number); ?>" required>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo e($partner->email); ?>" required>
        </div>
        <button type="submit">Save</button>
        <a href="<?php echo e(route('partners.index')); ?>">Cancel</a>
    </form>
</div>
<?php /**PATH /home/user/gcdeliver/resources/views/partners/edit.blade.php ENDPATH**/ ?>