<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><?php echo e(__('Welcome')); ?></div>

                    <div class="card-body">
                        <?php if(auth()->guard()->check()): ?>
                            
                            <script>window.location = "/dashboard";</script>
                        <?php else: ?>
                            
                            <a href="<?php echo e(route('login')); ?>">Login</a>
                            <p>Please log in to continue</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/user/gcdeliver/resources/views/welcome.blade.php ENDPATH**/ ?>