<?php $__env->startSection('content-admin'); ?>
    <?php
    $stt = 1;
    $user = Auth::user();
    $id_user = $user->id ?? null;
    ?>
    <div class="container-fluid">
        <div style="padding-top: 3%;padding-bottom: 1%; text-align: center">
            <h2>Quản lý Nhân Viên</h2>
        </div>

        <div class="container-fluid" style="height: 45px">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style="padding: 0 0 0 20px">
                    <?php if(session('notification')): ?>
                        <div style="height: 45px; line-height:45px">
                        <span style="padding-left: 20px">
                            <i class="fas fa-check" style="color: #7ff913"></i>
                            <span><?php echo e(session('notification')); ?></span>
                        </span>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="padding: 0 20px 0 0">
                    <a class="btn btn-outline-primary" style="float: right; margin-right: 30px"
                       href="<?php echo e(route('viewNewEmployee')); ?>">Thêm nhân viên mới <i class="fas fa-plus-square"></i></a>
                </div>
            </div>
        </div>

        <div style="height:45px"></div>
        <div class="table-responsive">
            <table class="table table-bordered container-fluid" id="dataTables-example"
                   style="width: 95%;">
                <tr align="center" style="background:#103D8F;color: #fff">
                    <th class="col-lg-1 col-md-1 col-sm-1 col-xs-1">STT</th>
                    <th class="col-lg-1 col-md-1 col-sm-1 col-xs-1">Mã Nhân viên</th>
                    <th class="col-lg-1 col-md-1 col-sm-1 col-xs-1">Tên NV</th>
                    <th class="col-lg-1 col-md-1 col-sm-1 col-xs-1">Giới Tính</th>
                    <th class="col-lg-1 col-md-1 col-sm-1 col-xs-1">Mã CV</th>
                    <th class="col-lg-1 col-md-1 col-sm-1 col-xs-1">Mã PB</th>
                    <th class="col-lg-1 col-md-1 col-sm-1 col-xs-1">Action</th>
                </tr>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="odd gradeX" align="center">
                        <td class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><?php echo e($stt); ?></td>
                        <td class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><?php echo e($item->manv); ?></td>
                        <td class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><?php echo e($item->tennv); ?></td>
                        <td class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><?php echo e($item->gioitinh); ?></td>
                        <td class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><?php echo e($item->macv); ?></td>
                        <td class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><?php echo e($item->mapb); ?></td>

                        <td class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><a
                                href="/admin/employee/edit_employee/<?php echo e($item->id); ?>"><i
                                    class="fas fa-edit"></i></a></td>
                    </tr>
                    <?php $stt++ ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/techasians/resources/views/admin/manage/employee.blade.php ENDPATH**/ ?>