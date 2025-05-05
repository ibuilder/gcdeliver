<div>
    <div>
        <a href="<?php echo e(route('daily_reports.index')); ?>">Daily Reports</a> / Create
    </div>

    <h1>Create Daily Report</h1>

    <?php if($errors->any()): ?>
        <div>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>  
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('daily_reports.store')); ?>">
        <?php echo csrf_field(); ?>
        <div>
            <label for="project_id">Project ID</label>
            <input type="number" name="project_id" id="project_id" required>
        </div>
        <div>
            <label for="report_date">Report Date</label>
            <input type="date" name="report_date" id="report_date" required>
        </div>
        <div>
            <label for="weather_conditions">Weather Conditions</label>
            <textarea name="weather_conditions" id="weather_conditions"></textarea>
        </div>
        <div>
            <label for="notes">Notes</label>
            <textarea name="notes" id="notes"></textarea>
        </div>
        <div>
            <label for="manpower_information">Manpower Information</label>
            <textarea name="manpower_information" id="manpower_information"></textarea>
        </div>        
        <button type="submit">Create Daily Report</button>
        <a href="<?php echo e(route('daily_reports.index')); ?>">Cancel</a>
    </form>
</div>

        <button type="submit" class="btn btn-primary">Create Daily Report</button>
    </form>
</div><?php /**PATH /home/user/gcdeliver/resources/views/daily_reports/create.blade.php ENDPATH**/ ?>