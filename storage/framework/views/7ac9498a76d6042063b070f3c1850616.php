<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects</title>
</head>
<body>
    <h1>Projects</h1>
    <a href="<?php echo e(route('projects.create')); ?>">Create Project</a>
    
    <form action="<?php echo e(route('projects.index')); ?>" method="GET">
        <input type="text" name="search" placeholder="Search..." value="<?php echo e(request('search')); ?>">
        <button type="submit">Search</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>
                    <a href="<?php echo e(route('projects.index', ['sort' => 'id', 'search' => request('search')])); ?>">
                        ID
                    </a>
                </th>
                <th>
                    <a href="<?php echo e(route('projects.index', ['sort' => 'name', 'search' => request('search')])); ?>">
                        Name
                    </a>
                </th>
                <th>Description</th>
                <th>
                    <a href="<?php echo e(route('projects.index', ['sort' => 'start_date', 'search' => request('search')])); ?>">
                        Start Date
                    </a>
                </th>
                <th>
                    <a href="<?php echo e(route('projects.index', ['sort' => 'end_date', 'search' => request('search')])); ?>">
                        End Date
                    </a>
                </th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($project->id); ?></td>
                    <td><?php echo e($project->name); ?></td>
                    <td><?php echo e($project->description); ?></td>
                    <td><?php echo e($project->start_date); ?></td>
                    <td><?php echo e($project->end_date); ?></td>
                    <td>
                        <a href="<?php echo e(route('projects.show', $project->id)); ?>">View</a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>
</html>
<?php /**PATH /home/user/gcdeliver/resources/views/projects/index.blade.php ENDPATH**/ ?>