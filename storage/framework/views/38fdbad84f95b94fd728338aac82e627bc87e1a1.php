<?php $__env->startSection('content-admin'); ?>
    <?php
    $user = Auth::user();
    ?>

    <div id="body-admin">
        <div>
            <div style="padding-top:15px">
                <h1 style="color: #103D8F; text-align: center">
                    Sapo Technology
                </h1>
            </div>

            <div style="height:25px"></div>
        </div>

    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/techasians/resources/views/admin/manage/statistics.blade.php ENDPATH**/ ?>