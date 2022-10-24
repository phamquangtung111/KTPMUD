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
            <div class="container-fluid">
                <div class="row">
{{--                    @if($user->name == 'admin')--}}
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="container-fluid py-4" style="height:155px">
                                <div class="card block">
                                    <a href="/admin/account">
                                        <div class="card-header p-3 pt-2">
                                            <div
                                                class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                                                <i style="background: white; color: black"
                                                   class="fas fa-user-tie fa-3x"></i>
                                            </div>
                                            <div class="text-end pt-1">
                                                <p class="text-sm mb-0 text-capitalize"><h5>Quản Lý Tài Khoản</h5></p>
                                                <p style="height:30px"></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="container-fluid py-4">
                                <div class="card block">
                                    <a href="/admin/timekeeping">
                                        <div class="card-header p-3 pt-2">
                                            <div
                                                class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                                                <i style="background: white; color: black"
                                                   class="fas fa-user-tie fa-3x"></i>
                                            </div>
                                            <div class="text-end pt-1">
                                                <p class="text-sm mb-0 text-capitalize"><h5>Chấm Công</h5></p>
                                                <p style="height:30px"></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="container-fluid py-4">
                                <div class="card block">
                                    <a href="/admin/employee">
                                        <div class="card-header p-3 pt-2">
                                            <div
                                                class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                                                <i style="background: white; color: black"
                                                   class="fas fa-id-card-alt fa-3x"></i>
                                            </div>
                                            <div class="text-end pt-1">
                                                <p class="text-sm mb-0 text-capitalize"><h5>Hồ Sơ Nhân viên</h5></p>
                                                <p style="height:30px"></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="container-fluid py-4">
                                <div class="card block">
                                    <a href="/admin/salary">
                                        <div class="card-header p-3 pt-2">
                                            <div
                                                class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                                                <i style="background: white; color: black"
                                                   class="fas fa-id-card-alt fa-3x"></i>
                                            </div>
                                            <div class="text-end pt-1">
                                                <p class="text-sm mb-0 text-capitalize"><h5>Tiền Lương</h5></p>
                                                <p style="height:30px"></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="container-fluid py-4">
                                <div class="card block">
                                    <a href="/admin/statistics">
                                        <div class="card-header p-3 pt-2">
                                            <div
                                                class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                                                <i style="background: white; color: black"
                                                   class="fas fa-id-card-alt fa-3x"></i>
                                            </div>
                                            <div class="text-end pt-1">
                                                <p class="text-sm mb-0 text-capitalize"><h5>Thống Kê</h5></p>
                                                <p style="height:30px"></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

{{--                    @endif--}}
                </div>
            </div>
        </div>

    </div>

    <style>

        .notify {
            height: 600px;
            border: 2px solid #103D8F;
            background: white;
            opacity: 0.9;
        }

        .notify:hover {
            height: 600px;
            border: 4px solid #103D8F;
            opacity: 1;
        }

        .block {
            opacity: 0.9;
        }

        .block a {
            color: black;
        }

        .block:hover {
            opacity: 1;
        }

        .block:hover a {
            background: #103D8F;
            color: white;
        }

    </style>
    {{--    @else--}}
    {{--    <h2>Tính năng này đang phát triển</h2>--}}
    {{--    @endif--}}
@endsection

