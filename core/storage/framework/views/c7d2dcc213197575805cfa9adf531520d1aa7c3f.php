
<?php $__env->startSection('panel'); ?>
    <div class="row">
    <div class="col-lg-12">
            <form action="<?php echo e(route('doctor.leave.update')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="card">
                    <div class="card-body">
                        <div class="row">

                        
                        </div>
                    </div>
                </div>
            </form>
    </div>
</div>
<?php echo $__env->make('doctor.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\kerfapt.ddhotel.in\core\resources\views/doctor/leaves/index.blade.php ENDPATH**/ ?>