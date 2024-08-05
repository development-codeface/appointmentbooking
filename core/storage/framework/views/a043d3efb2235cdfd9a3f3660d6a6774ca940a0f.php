<?php $__env->startSection('panel'); ?>
<div class="row mb-none-30">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="<?php echo e(route('doctor.info.about.update')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label><?php echo app('translator')->get('About'); ?></label>
                            <textarea name="about" rows="5" required><?php echo e($doctor->about); ?></textarea>
                        </div>
                        <div class="col-md-12 mt-5">
                            <div class="form-group">
                                <button type="submit" class="btn btn--primary w-100 h-45"><?php echo app('translator')->get('Submit'); ?></button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('doctor.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\kerfapt.ddhotel.in\core\resources\views/doctor/info/about.blade.php ENDPATH**/ ?>