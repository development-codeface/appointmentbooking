<?php $__env->startSection('panel'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <form action="" method="post">
                <?php echo csrf_field(); ?>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item d-flex flex-wrap flex-sm-nowrap gap-2 justify-content-between align-items-center">
                            <div>
                                <p class="fw-bold mb-0"><?php echo app('translator')->get('Online Payment'); ?></p>
                                <p class="mb-0">
                                    <small><?php echo app('translator')->get('If you disable this module, no one can appointment payment by online'); ?></small>
                                </p>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success" data-offstyle="-danger" data-bs-toggle="toggle" data-height="35" data-on="<?php echo app('translator')->get('Enable'); ?>" data-off="<?php echo app('translator')->get('Disable'); ?>" name="online_payment" <?php if($general->online_payment): ?> checked <?php endif; ?>>
                            </div>
                        </li>


                        <li class="list-group-item d-flex flex-wrap flex-sm-nowrap gap-2 justify-content-between align-items-center">
                            <div>
                                <p class="fw-bold mb-0"><?php echo app('translator')->get('Force SSL'); ?></p>
                                <p class="mb-0">
                                    <small><?php echo app('translator')->get('By enabling'); ?> <span class="fw-bold"><?php echo app('translator')->get("Force SSL (Secure Sockets Layer)"); ?></span> <?php echo app('translator')->get('the system will force a visitor that he/she must have to visit in secure mode. Otherwise, the site will be loaded in secure mode.'); ?></small>
                                </p>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success" data-offstyle="-danger" data-bs-toggle="toggle" data-height="35" data-on="<?php echo app('translator')->get('Enable'); ?>" data-off="<?php echo app('translator')->get('Disable'); ?>" name="force_ssl" <?php if($general->force_ssl): ?> checked <?php endif; ?>>
                            </div>
                        </li>

                        <li class="list-group-item d-flex flex-wrap flex-sm-nowrap gap-2 justify-content-between align-items-center">
                            <div>
                                <p class="fw-bold mb-0"><?php echo app('translator')->get('Email Notification'); ?></p>
                                <p class="mb-0">
                                    <small><?php echo app('translator')->get('If you enable this module, the system will send emails to users where needed. Otherwise, no email will be sent.'); ?> <code><?php echo app('translator')->get('So be sure before disabling this module that, the system doesn\'t need to send any emails.'); ?></code></small>
                                </p>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success" data-offstyle="-danger" data-bs-toggle="toggle" data-height="35" data-on="<?php echo app('translator')->get('Enable'); ?>" data-off="<?php echo app('translator')->get('Disable'); ?>" name="en" <?php if($general->en): ?> checked <?php endif; ?>>
                            </div>
                        </li>




                        <li class="list-group-item d-flex flex-wrap flex-sm-nowrap gap-2 justify-content-between align-items-center">
                            <div>
                                <p class="fw-bold mb-0"><?php echo app('translator')->get('SMS Notification'); ?></p>
                                <p class="mb-0">
                                    <small><?php echo app('translator')->get('If you enable this module, the system will send SMS to users where needed. Otherwise, no SMS will be sent.'); ?> <code><?php echo app('translator')->get('So be sure before disabling this module that, the system doesn\'t need to send any SMS.'); ?></code></small>
                                </p>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success" data-offstyle="-danger" data-bs-toggle="toggle" data-height="35" data-on="<?php echo app('translator')->get('Enable'); ?>" data-off="<?php echo app('translator')->get('Disable'); ?>" name="sn" <?php if($general->sn): ?> checked <?php endif; ?>>
                            </div>
                        </li>

                        <li class="list-group-item d-flex flex-wrap flex-sm-nowrap gap-2 justify-content-between align-items-center">
                            <div>
                                <p class="fw-bold mb-0"><?php echo app('translator')->get('Language Option'); ?></p>
                                <p class="mb-0">
                                    <small><?php echo app('translator')->get('If you enable this module, users can change the language according to their needs'); ?></small>
                                </p>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success" data-offstyle="-danger" data-bs-toggle="toggle" data-height="35" data-on="<?php echo app('translator')->get('Enable'); ?>" data-off="<?php echo app('translator')->get('Disable'); ?>" name="multi_language" <?php if($general->multi_language): ?> checked <?php endif; ?>>
                            </div>
                        </li>

                    </ul>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn--primary w-100 h-45"><?php echo app('translator')->get('Submit'); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style'); ?>
<style>
    .toggle.btn-lg{
        height: 37px !important;
        min-height: 37px !important;
    }
    .toggle-handle{
        width: 25px !important;
        padding: 0;
    }
    .form-group{
        width: 125px;
        margin-bottom: 0;
        flex-shrink: 0
    }
    .list-group-item:hover {
        background-color: #F7F7F7
    }
</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\kerfapt.ddhotel.in\core\resources\views/admin/setting/configuration.blade.php ENDPATH**/ ?>