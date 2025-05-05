<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('daily_reports.index')); ?>">Daily Reports</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo e($daily_report->report_date); ?></li>
        </ol>
    </nav>
    <h1>Daily Report Details</h1>

    <p><strong>ID:</strong> <?php echo e($daily_report->id); ?></p>
    <p><strong>Project ID:</strong> <?php echo e($daily_report->project_id); ?></p>
    <p><strong>Report Date:</strong> <?php echo e($daily_report->report_date); ?></p>
    <p><strong>Weather Conditions:</strong> <?php echo e($daily_report->weather_conditions); ?></p>
    <p><strong>Notes:</strong> <?php echo e($daily_report->notes); ?></p>
    <p><strong>Manpower Information:</strong> <?php echo e($daily_report->manpower_information); ?></p>
    
    <a href="<?php echo e(route('daily_reports.edit', $daily_report->id)); ?>">
        <button>Edit</button>
    </a>

    <a href="<?php echo e(route('daily_reports.index')); ?>">
        <button>Back</button>
    </a>
</div>
<?php /**PATH /home/user/gcdeliver/resources/views/daily_reports/show.blade.php ENDPATH**/ ?>