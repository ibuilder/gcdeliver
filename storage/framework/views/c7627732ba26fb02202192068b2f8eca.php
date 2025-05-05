<div>
    <a href="<?php echo e(route('daily_reports.create')); ?>">Create Daily Report</a>

    <form method="GET" action="<?php echo e(route('daily_reports.index')); ?>">
         <input type="text" name="search" placeholder="Filter all columns..." value="<?php echo e(request('search')); ?>">
        <input type="text" name="manpower_search" placeholder="Filter by manpower information..." value="<?php echo e(request('manpower_search')); ?>">
        <button type="submit">Filter</button>
    </form>
    
    
    <table>
         <thead>
        <tr>
            <th>
                <a href="<?php echo e(route('daily_reports.index', ['sort' => 'id', 'direction' => ($sort === 'id' && $direction === 'asc') ? 'desc' : 'asc'])); ?>">
                    ID
                    <?php if($sort === 'id'): ?>
                        <?php if($direction === 'asc'): ?>
                            &#9650;
                        <?php else: ?>
                            &#9660;
                        <?php endif; ?>
                    <?php endif; ?>
                </a>
            </th>
            <th>
                <a href="<?php echo e(route('daily_reports.index', ['sort' => 'project_id', 'direction' => ($sort === 'project_id' && $direction === 'asc') ? 'desc' : 'asc'])); ?>">
                    Project ID
                    <?php if($sort === 'project_id'): ?>
                        <?php if($direction === 'asc'): ?>
                            &#9650;
                        <?php else: ?>
                            &#9660;
                        <?php endif; ?>
                    <?php endif; ?>
                </a>
            </th>
            <th>
                <a href="<?php echo e(route('daily_reports.index', ['sort' => 'report_date', 'direction' => ($sort === 'report_date' && $direction === 'asc') ? 'desc' : 'asc'])); ?>">
                    Date
                    <?php if($sort === 'report_date'): ?>
                        <?php if($direction === 'asc'): ?>
                            &#9650;
                        <?php else: ?>
                            &#9660;
                        <?php endif; ?>
                    <?php endif; ?>
                </a>
            </th>
            <th>
                <a href="<?php echo e(route('daily_reports.index', ['sort' => 'weather_conditions', 'direction' => ($sort === 'weather_conditions' && $direction === 'asc') ? 'desc' : 'asc'])); ?>">
                    Weather Conditions
                    <?php if($sort === 'weather_conditions'): ?>
                        <?php if($direction === 'asc'): ?>
                            &#9650;
                        <?php else: ?>
                            &#9660;
                        <?php endif; ?>
                    <?php endif; ?>
                </a></th>
            <th>
                <a href="<?php echo e(route('daily_reports.index', ['sort' => 'notes', 'direction' => ($sort === 'notes' && $direction === 'asc') ? 'desc' : 'asc'])); ?>">
                    Notes
                    <?php if($sort === 'notes'): ?>
                        <?php if($direction === 'asc'): ?>
                            &#9650;
                        <?php else: ?>
                            &#9660;
                        <?php endif; ?>
                    <?php endif; ?>
                </a></th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $daily_reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $daily_report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr onclick="window.location='<?php echo e(route('daily_reports.show', $daily_report->id)); ?>';">
                <td><?php echo e($daily_report->id); ?></td>
                <td><?php echo e($daily_report->project_id); ?></td>
                <td><?php echo e($daily_report->report_date); ?></td>
                 <td><?php echo e($daily_report->weather_conditions); ?></td>
                 <td><?php echo e($daily_report->notes); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div><?php /**PATH /home/user/gcdeliver/resources/views/daily_reports/index.blade.php ENDPATH**/ ?>