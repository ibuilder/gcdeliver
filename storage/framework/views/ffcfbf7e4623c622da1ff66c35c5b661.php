<div>
    <div>
        <a href="<?php echo e(route('projects.index')); ?>">Projects</a> > <a href="<?php echo e(route('projects.show', $project->id)); ?>"><?php echo e($project->name); ?></a> > Edit
    </div>
    
    <h1>Edit Project</h1>

    <form method="POST" action="<?php echo e(route('projects.update', $project->id)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?php echo e($project->name); ?>" required>
        </div>

        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description" required><?php echo e($project->description); ?></textarea>
        </div>

        <div>
            <label for="location">Location</label>
            <input type="text" id="location" name="location" value="<?php echo e($project->location); ?>" required>
        </div>
        <div>
            <label for="start_date">Start Date</label>
            <input type="date" id="start_date" name="start_date" value="<?php echo e($project->start_date); ?>" required>
        </div>
        <div>
            <label for="end_date">End Date</label>
            <input type="date" id="end_date" name="end_date" value="<?php echo e($project->end_date); ?>" required>
        </div>
        <button type="submit">Save</button>
        <a href="<?php echo e(route('projects.index')); ?>">Cancel</a>
    </form>
</div>
<?php /**PATH /home/user/gcdeliver/resources/views/projects/edit.blade.php ENDPATH**/ ?>