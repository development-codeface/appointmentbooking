<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-lg-12">
            <form method="POST" action="<?php echo e(route('doctor.leave.store')); ?>">
            <?php echo csrf_field(); ?>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!-- <?php echo e($leaves); ?> -->
                            <div class="col-md-3 col-lg-6">
                                <div class="form-group">
                                        <label >Employee ID:</label>
                                        <div class="input-group">
                                        <input type="hidden" id="employee_id" value="<?php echo e($doctor->id); ?>" name="employee_id" class="form-control" required>     
                                        </div>
                                    </div>
                            </div>

                            <div class="col-md-3 col-lg-6">
                                <div class="form-group">
                                    <label >Start Date:</label>
                                    <input type="date" id="start_date" name="start_date" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-3 col-lg-6">
                                <div class="form-group">
                                    <label >End Date:</label>
                                    <input type="date" id="end_date" name="end_date" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-3 col-lg-6">
                                <div class="form-group">
                                    <label >Leave Type:</label>
                                    <div class="form-group">
                                    <select id="leave_type" name="leave_type" required>
                                        <option value="annual">Annual Leave</option>
                                        <option value="sick">Sick Leave</option>
                                        <option value="maternity">Maternity Leave</option>
                                    </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 col-lg-6">
                                <div class="form-group">
                                     <label >Reason:</label>
                                    <textarea id="reason" name="reason" ></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn--primary w-100 h-45"><?php echo app('translator')->get('Submit'); ?>
                                </button>
                            </div>
                        </div>
                    </div>
            </form>

           
        </div>
    </div>

    <div class="row mb-none-30 mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4><?php echo app('translator')->get('Current Leaves'); ?></h4>
                    <hr>
                    <label><p>Number of leaves: <?php echo e(count($leaves)); ?></p></label>
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Actions</th>
                        </tr>
                        <?php if(count($leaves) > 0 ): ?>
                        <?php $__currentLoopData = $leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($leave->id); ?></td>
                                <td><?php echo e($leave->start_date->formatLocalized('%d %B %Y')); ?></td>
                                <td><?php echo e($leave->end_date->formatLocalized('%d %B %Y')); ?> - <?php echo e($leave->leave_days); ?> days (<?php echo e($leave->leave_type); ?>)</td>
                                <td>
                                    <form action="<?php echo e(route('doctor.leave.destroy', $leave->id)); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    <!-- <button type="button" class="btn btn--primary ">Edit</button> -->
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4"><?php echo app('translator')->get('No leaves found.'); ?></td>
                            </tr>
                        <?php endif; ?>
                    </table>

                    
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style-lib'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/vendor/datepicker.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script-lib'); ?>
    <script src="<?php echo e(asset('assets/admin/js/vendor/datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/admin/js/vendor/datepicker.en.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/admin/js/vendor/jquery.multiselect.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        (function($) {
            'use strict';
       
            $('select[name=slot_type]').on('change', function() {
                var type = $(this).val();
                schedule(type);
            })
            

            $('#serial_day').on('blur', function() { 
                window.location = window.location.href;
            });

            window.onbeforeunload = function() {
                localStorage.setItem("serial_day", $('#serial_day').val());
            }

            window.onload = function() {

                var name = localStorage.getItem("serial_day");
                if (name !== null) $('#serial_day').val(name);
                let days = $("#serial_day").val();
                
                var daysArr = [];
                var currentDate = new Date();
                const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                for (var i = 0; i < days; i++) {
                    var nextDay = new Date(currentDate.getTime() + i * 24 * 60 * 60 * 1000);
                    daysArr.push(nextDay.toLocaleDateString('en-US', options));
                }
                var selectElement = $("#WorkingDays");
               
                // $("#ms-list-1").remove();
                $.each(daysArr, function(index, value) {
                    selectElement.append($("<option></option>").attr("value", value).text(value));
                    
                });
                $('#WorkingDays').multiselect({ texts: { placeholder: 'Select options' } ,selectAll: true});
            }


            var type = $('select[name=slot_type]').val();
            if (type) {
                schedule(type);
            }

            function schedule(type) {
                if (type == 1) {
                    $('.duration').addClass('d-none');
                    $('.serial').removeClass('d-none');
                    $('.start').addClass('d-none');
                    $('.end').addClass('d-none');
                } else {
                    $('.start').removeClass('d-none');
                    $('.end').removeClass('d-none');
                    $('.serial').addClass('d-none');
                    $('.duration').removeClass('d-none')
                }
            }

            initTimePicker();

            function initTimePicker() {
                var start = new Date();
                start.setHours(9);
                start.setMinutes(0);

                $('.time-picker').datepicker({
                    onlyTimepicker: true,
                    timepicker: true,
                    startDate: start,
                    language: 'en',
                    minHours: 0,
                    maxHours: 23,
                });
            }
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('doctor.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\kerfapt.ddhotel.in\core\resources\views/doctor/schedule/leave.blade.php ENDPATH**/ ?>