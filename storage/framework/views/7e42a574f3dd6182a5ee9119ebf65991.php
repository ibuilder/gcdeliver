<!DOCTYPE html> <html lang="en"> <head>
<meta charset="UTF-8"> <meta name="viewport" content="width=device-width,
initial-scale=1.0"> <title>Deliveries</title> </head> <body>
<h1>Deliveries</h1>

<div>
  <a href="<?php echo e(route('deliveries.create')); ?>">Create Delivery</a>
</div>

<form action="<?php echo e(route('deliveries.index')); ?>" method="GET">
  <input type="text" name="search" placeholder="Search..."
    value="<?php echo e(request('search')); ?>">
  <button type="submit">Search</button>
</form>

<table>
  <thead>
    <tr>
      <th>
        <a
          href="<?php echo e(route('deliveries.index', ['sort' => (request('sort') === 'id-asc' ? 'id-desc' : 'id-asc')])); ?>">ID</a>
      </th>
      <th>
        <a
          href="<?php echo e(route('deliveries.index', ['sort' => (request('sort') === 'title-asc' ? 'title-desc' : 'title-asc')])); ?>">Title</a>
      </th>
      <th><a
          href="<?php echo e(route('deliveries.index', ['sort' => (request('sort') === 'date-asc' ? 'date-desc' : 'date-asc')])); ?>">Scheduled
          Date</a></th>
      <th><a
          href="<?php echo e(route('deliveries.index', ['sort' => (request('sort') === 'time-asc' ? 'time-desc' : 'time-asc')])); ?>">Time
          Slot</a></th>

      <th>Location</th>
      <th>Unload Duration</th>
    </tr>
  </thead>
  <tbody>
    <?php $__currentLoopData = $deliveries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $delivery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <tr>
      <td><?php echo e($delivery->id); ?></td>
      <td><?php echo e($delivery->title); ?></td>
      <td><?php echo e($delivery->date); ?></td>
      <td><?php echo e($delivery->time_slot); ?></td>
      <td><?php echo e($delivery->location); ?></td>
      <td><?php echo e($delivery->unload_duration); ?></td>
      <td>
        <a href="<?php echo e(route('deliveries.show', $delivery->id)); ?>">View</a>
      </td>


    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>
</body> </html>
<?php /**PATH /home/user/gcdeliver/resources/views/deliveries/index.blade.php ENDPATH**/ ?>