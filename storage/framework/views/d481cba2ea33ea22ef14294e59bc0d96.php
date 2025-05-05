<div>
    <div>
        <a href="<?php echo e(route('projects.index')); ?>">Projects</a>
        / <?php echo e($project->name); ?>

    </div>
    
    <h1>Project Details</h1>

    <p><strong>ID:</strong> <?php echo e($project->id); ?></p>
    <p><strong>Name:</strong> <?php echo e($project->name); ?></p>
    <p><strong>Description:</strong> <?php echo e($project->description); ?></p>
    <p><strong>Location:</strong> <?php echo e($project->location); ?></p>
    <p><strong>Start Date:</strong> <?php echo e($project->start_date); ?></p>
    <p><strong>End Date:</strong> <?php echo e($project->end_date); ?></p>
    
    <a href="<?php echo e(route('projects.edit', $project->id)); ?>">Edit</a>
    <a href="<?php echo e(url()->previous()); ?>">Go Back</a>
</div>
<?php /**PATH /home/user/gcdeliver/resources/views/projects/show.blade.php ENDPATH**/ ?>