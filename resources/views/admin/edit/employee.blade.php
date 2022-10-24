@extends('layout.admin')
@section('content-admin')
    <?php
    $stt = 1; $user = Auth::user();
    $id_user = $user->id ?? null;
    ?>
    <form action="{{route('UpdateEmployee')}}" id="submit" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
    </form>

    <div class="container-fluid">
        <div class="row" style="padding-top: 3%;padding-bottom: 1%;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h2 style="text-align: center">Sửa thông tin nhân viên</h2>
            </div>
        </div>
    </div>

    <div class="container-fluid" style="height: 60px; line-height:60px; padding: 0 0 20px 0">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="float: left;">
                @if(session('notification'))
                    <span style="padding-left: 20px; color: red">
                                <i class="fas fa-times" style="color: red"></i>
                                {{session('notification')}}
                            </span>
                @endif
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div style="float: right; padding-right:15px">
                    <button title="Back" class="btn btn-outline-info" type="button">
                        <a href="/admin/employee" style="color: black">
                            <i class="fas fa-arrow-left"></i><span> Quay lại</span>
                        </a>
                    </button>
                    <input type="button" class="btn btn-outline-danger" value="Xóa" data-toggle="modal"
                           data-target="#deleteModal">
                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                         aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <span>Bạn chắc chắn muốn xóa tài khoản này chứ?</span>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary"
                                            data-dismiss="modal">
                                        Cancel
                                    </button>
                                    <a class="btn btn-outline-danger"
                                       href="/admin/delete/delete_employee/{{$data->id}}">Xóa</a>
                                </div>
                            </div>
                        </div>
                    </div>
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
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><span>Chức Vụ<span
                                    style="color: red">*</span></span></div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span style="height:83%" class="input-group-text" id="inputGroup-sizing-default"><i
                                            class="fas fa-layer-group"></i></span>
                                </div>
                                <select name="macv" class="w-100 custom-select  mb-2 form-control"
                                        aria-label=".form-select-lg example" form="submit">
                                    <option name="macv" value="">-- Vui lòng chọn --</option>
                                    <option name="macv" value="1" @if($data->macv == 1) selected @endif>Nhân Viên</option>
                                    <option name="macv" value="2" @if($data->macv == 2) selected @endif>Quản lý</option>
                                    <option name="macv" value="3" @if($data->macv == 3) selected @endif>Trưởng Phòng</option>
                                    <option name="macv" value="4" @if($data->macv == 4) selected @endif>Phó Phòng</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="height:5px"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><span>Phòng Ban<span
                                    style="color: red">*</span></span></div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span style="height:83%" class="input-group-text" id="inputGroup-sizing-default"><i
                                            class="fas fa-layer-group"></i></span>
                                </div>
                                <select name="mapb" class="w-100 custom-select  mb-2 form-control"
                                        aria-label=".form-select-lg example" form="submit">
                                    <option name="mapb" value="">-- Vui lòng chọn --</option>
                                    <option name="mapb" value="0" @if($data->mapb == 0) selected @endif>Kế toán</option>
                                    <option name="mapb" value="1" @if($data->mapb == 1) selected @endif>Công Nghệ</option>
                                    <option name="mapb" value="2" @if($data->mapb == 2) selected @endif>Ban GD</option>
                                    <option name="mapb" value="3" @if($data->mapb == 3) selected @endif>Nhân sự</option>
                                    <option name="mapb" value="4" @if($data->mapb == 4) selected @endif>Marketing</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="height:10px"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><span>Mã Nhân Viên<span
                                    style="color: red">*</span></span></div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default"><i
                                            class="fas fa-user-circle"></i></span>
                                </div>
                                <input value="{{$data->manv}}" type="text" name="manv"
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
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><span>Tên Nhân Viên<span
                                    style="color: red">*</span></span></div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default"><i
                                            class="fas fa-user-circle"></i></span>
                                </div>
                                <input value="{{$data->tennv}}" type="text" name="tennv"
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
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><span>Giới tính<span
                                    style="color: red">*</span></span></div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span style="height:83%" class="input-group-text" id="inputGroup-sizing-default"><i
                                            class="fas fa-layer-group"></i></span>
                                </div>
                                <select name="gioitinh" class="w-100 custom-select  mb-2 form-control"
                                        aria-label=".form-select-lg example" form="submit">
                                    <option name="gioitinh" value="">-- Vui lòng chọn --</option>
                                    <option name="gioitinh" value="0" @if($data->gioitinh == 0) selected @endif>Nam</option>
                                    <option name="gioitinh" value="1" @if($data->gioitinh == 1) selected @endif>Nữ</option>
                                    <option name="gioitinh" value="2" @if($data->gioitinh == 2) selected @endif>Khác</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="height:10px"></div>
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><span>Địa chỉ <span
                                    style="color: red">*</span></span></div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default"><i
                                            class="fas fa-map-marked-alt"></i></span>
                                </div>
                                <input value="{{$data->diachi}}" type="text" name="diachi"
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
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><span>Số CMND <span
                                    style="color: red">*</span></span></div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default"><i
                                            class="fas fa-envelope"></i></span>
                                </div>
                                <input value="{{$data->cmnd}}" type="text" name="cmnd" style="width:100%"
                                       aria-describedby="inputGroup-sizing-default" class="form-control"
                                       form="submit">
                            </div>
                        </div>
                    </div>
                </div>
                <div style="height:10px"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><span>Số Điện Thoại <span
                                    style="color: red">*</span></span></div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default"><i
                                            class="fas fa-envelope"></i></span>
                                </div>
                                <input value="{{$data->sdt}}" type="text" name="sdt" style="width:100%"
                                       aria-describedby="inputGroup-sizing-default" class="form-control"
                                       form="submit">
                            </div>
                        </div>
                    </div>
                </div>
                <div style="height:10px"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><span>Ngày Sinh<span
                                    style="color: red">*</span></span></div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default"><i
                                            class="fas fa-envelope"></i></span>
                                </div>
                                <input value="{{$data->ngaysinh}}" type="date" name="ngaysinh" style="width:100%"
                                       aria-describedby="inputGroup-sizing-default" class="form-control"
                                       form="submit">
                            </div>
                        </div>
                    </div>
                </div>
                <div style="height:10px"></div>
                <input type="text" name="id" value="{{$data->id}}" form="submit" hidden>

            </div>



@endsection
