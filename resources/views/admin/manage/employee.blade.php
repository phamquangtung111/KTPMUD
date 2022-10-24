@extends('layout.admin')
@section('content-admin')
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
                    @if(session('notification'))
                        <div style="height: 45px; line-height:45px">
                        <span style="padding-left: 20px">
                            <i class="fas fa-check" style="color: #7ff913"></i>
                            <span>{{session('notification')}}</span>
                        </span>
                        </div>
                    @endif
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="padding: 0 20px 0 0">
                    <a class="btn btn-outline-primary" style="float: right; margin-right: 30px"
                       href="{{route('viewNewEmployee')}}">Thêm nhân viên mới <i class="fas fa-plus-square"></i></a>
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
                @foreach($data as $item)
                    <tr class="odd gradeX" align="center">
                        <td class="col-lg-1 col-md-1 col-sm-1 col-xs-1">{{$stt}}</td>
                        <td class="col-lg-1 col-md-1 col-sm-1 col-xs-1">{{$item->manv}}</td>
                        <td class="col-lg-1 col-md-1 col-sm-1 col-xs-1">{{$item->tennv}}</td>
                        <td class="col-lg-1 col-md-1 col-sm-1 col-xs-1">{{$item->gioitinh}}</td>
                        <td class="col-lg-1 col-md-1 col-sm-1 col-xs-1">{{$item->macv}}</td>
                        <td class="col-lg-1 col-md-1 col-sm-1 col-xs-1">{{$item->mapb}}</td>

                        <td class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><a
                                href="/admin/employee/edit_employee/{{$item->id}}"><i
                                    class="fas fa-edit"></i></a></td>
                    </tr>
                    <?php $stt++ ?>
                @endforeach
            </table>
        </div>
    </div>

@endsection
