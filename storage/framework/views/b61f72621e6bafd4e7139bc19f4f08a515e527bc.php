<?php $__env->startSection('content-admin'); ?>
    <?php
        $stt = 1; $user = Auth::user();
        $id_user = $user->id ?? null;
    ?>
    <form action="<?php echo e(route('SaveAccount')); ?>" id="submit" method="POST" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

    </form>

    <div class="container-fluid">
        <div class="row" style="padding-top: 3%;padding-bottom: 1%;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h2 style="text-align: center">Thêm tài khoản</h2>
            </div>
        </div>
    </div>

    <div class="container-fluid" style="height: 60px; line-height:60px; padding: 0 0 20px 0">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="float: left;">
                <?php if(session('notification')): ?>
                    <span style="padding-left: 20px; color: red">
                                <i class="fas fa-times" style="color: red"></i>
                                <?php echo e(session('notification')); ?>

                            </span>
                <?php endif; ?>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div style="float: right; padding-right:15px">
                    <button title="Back" class="btn btn-outline-info" type="button">
                        <a href="/admin/account" style="color: black">
                            <i class="fas fa-arrow-left"></i><span> Quay lại</span>
                        </a>
                    </button>
                    <button type="submit" class="btn btn-outline-primary" form="submit"><i class="fas fa-save"></i>
                        Lưu
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div style="height:50px"></div>

    <div class="container-fluid card z-index-2" style="width:75%">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style=" border-right: 15px solid #F4F6F9;">
                <!--Begin Tab-->
                <div class="nav-tabs">
                    <div style="height:5px"></div>
                    <button style="width:100%;" class="tablink nav-link"
                            onclick="openPage('News', this, 'white')"
                            id="defaultOpen"><span><i class="fas fa-user-circle"></i> Tài khoản</span>
                    </button>
                </div>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                <div id="News" class="tabcontent">
                    <div style="height:20px"></div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><span>Tên tài khoản <span
                                        style="color: red">*</span></span></div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default"><i
                                                class="fas fa-user"></i></span>
                                    </div>
                                    <input value="<?php echo e(old('username')); ?>" type="text" name="name"
                                           style="width:100%"
                                           aria-describedby="inputGroup-sizing-default" class="form-control"
                                           form="submit">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="height:10px"></div>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><span>Mật khẩu <span
                                        style="color: red">*</span></span></div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default"><i
                                                class="fas fa-key"></i></span>
                                    </div>
                                    <input value="<?php echo e(old('password')); ?>" type="password" name="password"
                                           style="width:100%"
                                           aria-describedby="inputGroup-sizing-default" class="form-control"
                                           form="submit">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="height:20px"></div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid card z-index-2" style="width:75%">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style=" border-right: 15px solid #F4F6F9;">
                <div>
                    <div style="height:5px"></div>
                    <span style="width:100%; text-align: center" class="nav-link"><i
                            class="fas fa-address-card"></i> Thông tin</span>
                    <div style="height:5px"></div>
                </div>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                <div style="height:20px"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><span>Quyền<span
                                    style="color: red">*</span></span></div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span style="height:83%" class="input-group-text" id="inputGroup-sizing-default"><i
                                            class="fas fa-layer-group"></i></span>
                                </div>
                                <select name="role" class="w-100 custom-select  mb-2 form-control"
                                        aria-label=".form-select-lg example" form="submit">
                                    <option name="role" value="">-- Vui lòng chọn --</option>
                                    <option name="role" value="1">Kế toán</option>
                                    <option name="role" value="0">Admin</option>
                                    <option name="role" value="2">Ban GD</option>
                                    <option name="role" value="3">Quản lý nhân sự</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="height:5px"></div>

                <div style="height:10px"></div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><span>Tên <span
                                    style="color: red">*</span></span></div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default"><i
                                            class="fas fa-user-circle"></i></span>
                                </div>
                                <input value="<?php echo e(old('last_name')); ?>" type="text" name="tennv"
                                       style="width:100%"
                                       aria-describedby="inputGroup-sizing-default" class="form-control"
                                       form="submit">
                            </div>
                        </div>
                    </div>
                </div>
                <div style="height:10px"></div>

                <div class="container-fluid">
                    <div class="row">

                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><span>Địa chỉ làm việc <span
                                    style="color: red">*</span></span></div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default"><i
                                            class="fas fa-map-marked-alt"></i></span>
                                </div>
                                <input value="Tech Asians" type="text" name="diachi"
                                       style="width:100%"
                                       aria-describedby="inputGroup-sizing-default" class="form-control"
                                       form="submit"
                                       readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="height:10px"></div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><span>Email <span
                                    style="color: red">*</span></span></div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default"><i
                                            class="fas fa-envelope"></i></span>
                                </div>
                                <input value="<?php echo e(old('email')); ?>" type="email" name="email" style="width:100%"
                                       aria-describedby="inputGroup-sizing-default" class="form-control"
                                       form="submit">
                            </div>
                        </div>
                    </div>
                </div>
                <div style="height:10px"></div>
        </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/techasians/resources/views/admin/create/account.blade.php ENDPATH**/ ?>