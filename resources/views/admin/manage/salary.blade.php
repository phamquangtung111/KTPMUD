@extends('layout.admin')
@section('content-admin')
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
            <div id="accordion">
                @foreach($employees as $employee)
                <div class="card">
                    <div class="card-header" id="heading{{$employee->id}}">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$employee->id}}" aria-expanded="true" aria-controls="collapse{{$employee->id}}">
                                Bảng lương nhân viên #{{$employee->manv}}
                            </button>
                        </h5>
                    </div>
                    <div id="collapse{{$employee->id}}" class="collapse" aria-labelledby="heading{{$employee->id}}" data-parent="#accordion">
                        <div class="card-body">
                            <div class="container mt-5 mb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="text-center lh-1 mb-2">
                                            <h6 class="fw-bold">Bảng Lương</h6> <span class="fw-normal">Bảng lương tháng 4 2022</span>
                                        </div>
                                        <div class="d-flex justify-content-end"> <span>Sapo Technology</span> </div>
                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div> <span class="fw-bolder">Mã Nhân viên</span> <small class="ms-3">{{$employee->manv}}</small> </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div> <span class="fw-bolder">Chức vụ</span> <small class="ms-3">{{$employee->macv}}</small> </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div> <span class="fw-bolder">Tên Nhân Viên</span> <small class="ms-3">{{$employee->tennv}}</small> </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div> <span class="fw-bolder">Mã Phòng Ban</span> <small class="ms-3">{{$employee->mapb}}</small> </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div> <span class="fw-bolder">Giới Tính</span> <small class="ms-3">{{$employee->gioitinh}}</small> </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div> <span class="fw-bolder">Ngày Sinh</span> <small class="ms-3">{{$employee->ngaysinh}}</small> </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div> <span class="fw-bolder">Địa Chỉ</span> <small class="ms-3">{{$employee->diachi}}</small> </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div> <span class="fw-bolder">Số Điện Thoại</span> <small class="ms-3">{{$employee->sdt}}</small> </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <table class="mt-4 table table-bordered">
                                                <thead class="bg-dark text-white">
                                                <tr>
                                                    <th scope="col">Các khoản theo hợp đồng</th>
                                                    <th scope="col">Giá trị</th>
                                                    <th scope="col">Thông tin</th>
                                                    <th scope="col"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <th scope="row">Ngày nghỉ được thưởng lương</th>
                                                    <td>0.00</td>
                                                    <td colspan="2"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Lương chính thức</th>
                                                    <td>500.00 / ngày</td>
                                                    <td colspan="2"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Số ngày làm</th>
                                                    @foreach($result as $name => $val)
                                                        @if($name == $employee->id)
                                                            <td>{{$val}}</td>
                                                        @endif
                                                    @endforeach
                                                    <td colspan="2"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Phụ cấp</th>
                                                    <td>0.00</td>
                                                    <td colspan="2"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Thưởng</th>
                                                    <td>0.00</td>
                                                    <td colspan="2"></td>
                                                </tr>
                                                <tr class="border-top">
                                                    <th scope="row">Tổng thu nhập</th>
                                                    @foreach($result as $name => $val)
                                                        @if($name == $employee->id)
                                                            <td>{{$val*500}}</td>
                                                        @endif
                                                    @endforeach
                                                    <td>Tổng thực nhận (sau thuế)</td>
                                                    @foreach($result as $name => $val)
                                                        @if($name == $employee->id)
                                                            <td>{{($val*500*95)/100}}</td>
                                                        @endif
                                                    @endforeach
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <div class="d-flex flex-column mt-2"> <span class="fw-bolder">Chữ ký giám đốc</span> <span class="mt-4">Đã ký xác nhận</span> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

