<?php $__env->startSection('content-admin'); ?>
    <?php
        $stt = 1;
        $user = Auth::user();
        $id_user = $user->id ?? null;
        $roles = [
            0 => 'admin',
            1 => 'Quan Ly Nhan Su',
            2 => 'Ke Toan',
            3 => 'Ban GD'
        ]
    ?>
    <div class="container-fluid">
        <div style="padding-top: 3%;padding-bottom: 1%; text-align: center">
            <h2>Quản lý tài khoản hệ thống</h2>
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
                       href="<?php echo e(route('viewNewAccount')); ?>">Thêm tài khoản mới <i class="fas fa-plus-square"></i></a>
                </div>
            </div>
        </div>

        <div style="height:45px"></div>
        <div class="table-responsive">
            <table class="table table-bordered container-fluid" id="dataTables-example"
                   style="width: 95%;">
                <tr align="center" style="background:#103D8F;color: #fff">
                    <th class="col-lg-1 col-md-1 col-sm-1 col-xs-1">STT</th>
                    <th class="col-lg-3 col-md-3 col-sm-3 col-xs-3">Tên tài khoản</th>
                    <th class="col-lg-3 col-md-3 col-sm-3 col-xs-3">Chức vụ</th>
                    <th class="col-lg-1 col-md-1 col-sm-1 col-xs-1">Trạng thái</th>
                    <th class="col-lg-1 col-md-1 col-sm-1 col-xs-1">Action</th>
                </tr>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="odd gradeX" align="center">
                        <td class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><?php echo e($stt); ?></td>
                        <td class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><?php echo e($item->name); ?></td>
                        <?php if($item->role == 0): ?>
                            <td class="col-lg-3 col-md-3 col-sm-3 col-xs-3">Admin</td>
                        <?php elseif($item->role == 1): ?>
                            <td class="col-lg-3 col-md-3 col-sm-3 col-xs-3">Ke Toan</td>
                        <?php elseif($item->role == 2): ?>
                            <td class="col-lg-3 col-md-3 col-sm-3 col-xs-3">Ban GD</td>
                        <?php elseif($item->role == 3): ?>
                            <td class="col-lg-3 col-md-3 col-sm-3 col-xs-3">Quan Ly Nhan Su</td>
                        <?php endif; ?>
                        <?php if($item->is_active == 1): ?>
                            <td style="color: green" class="col-lg-1 col-md-1 col-sm-1 col-xs-1">Hoạt động</td>
                        <?php else: ?>
                            <td style="color: red" class="col-lg-1 col-md-1 col-sm-1 col-xs-1">Đã vô hiệu</td>
                        <?php endif; ?>
                        <td class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><a
                                href="/admin/account/edit_account/<?php echo e($item->id); ?>"><i
                                    class="fas fa-edit"></i></a></td>
                    </tr>
                    <?php $stt++ ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/techasians/resources/views/admin/manage/account.blade.php ENDPATH**/ ?>