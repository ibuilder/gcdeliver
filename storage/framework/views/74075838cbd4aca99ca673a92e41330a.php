<div>
    <div>
        <a href="<?php echo e(route('daily_reports.index')); ?>">Daily Reports</a>
        >
        <a href="<?php echo e(route('daily_reports.show', $dailyReport->id)); ?>"><?php echo e($dailyReport->report_date); ?></a> > Edit
    </div>
    <h1>Edit Daily Report</h1>

    <form method="POST" action="<?php echo e(route('daily_reports.update', $dailyReport->id)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div>
            <label for="project_id">Project ID:</label>
            <input type="text" id="project_id" name="project_id" value="<?php echo e(old('project_id', $dailyReport->project_id)); ?>" required>
            <?php $__errorArgs = ['project_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div>
            <label for="report_date">Report Date:</label>
            <input type="date" id="report_date" name="report_date" value="<?php echo e(old('report_date', $dailyReport->report_date)); ?>" required>
            <?php $__errorArgs = ['report_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div>
            <label for="weather_conditions">Weather Conditions:</label>
            <input type="text" id="weather_conditions" name="weather_conditions" value="<?php echo e(old('weather_conditions', $dailyReport->weather_conditions)); ?>" required>
            <?php $__errorArgs = ['weather_conditions'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div>
            <label for="notes">Notes:</label>
            <textarea id="notes" name="notes" required><?php echo e(old('notes', $dailyReport->notes)); ?></textarea>
            <?php $__errorArgs = ['notes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div>
            <label for="manpower_information">Manpower Information:</label>
            <textarea id="manpower_information" name="manpower_information" required><?php echo e(old('manpower_information', $dailyReport->manpower_information)); ?></textarea>
            <?php $__errorArgs = ['manpower_information'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <button type="submit">Save Changes</button>
        <a href="<?php echo e(route('daily_reports.index')); ?>">Cancel</a>
    </form>
</div>
<?php /**PATH /home/user/gcdeliver/resources/views/daily_reports/edit.blade.php ENDPATH**/ ?>