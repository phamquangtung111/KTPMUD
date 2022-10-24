<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{asset('home/img/logo/logotlu.png')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('admin/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{asset('admin/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('admin/css/icheck-bootstrap.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('admin/css/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admin/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('admin/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('admin/css/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('admin/css/summernote-bs4.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body class="hold-transition sidebar-mini layout-fixed" style="font-family: Roboto, Helvetica, Arial, sans-serif">

<?php
$user = Auth::user();
$arrID[] = '';
$id_user = $user->id ?? null;
$roleUser = \App\RoleUser::where('user_id', $id_user)->first();
$idRole = $roleUser->role_id ?? null;

$table = DB::table('mega_menu')->get();
if (isset($user->getIdTable)) {
    $idTable = $user->getIdTable;
    foreach ($idTable as $item) {
        $arrID[] = $item['menu_id'];
    }
}
if ($id_user != null) {
    $profile = \App\Profile::where('id_user', $id_user)->first();
    $id_subject = $profile->id_subject ?? null;
}

const ID_SCIENCE = 1;
const ID_SUBJECT = 2;
const ID_SPECIALIZED = 3;
const ID_SUBJECT_SECTION = 4;
const ID_CLASS = 5;
const ID_COURSE = 6;
const ID_KNOWLEDGE_BLOCK = 7;
const ID_FRAMEWORK = 8;
const ID_OUTLINE = 9;
const ID_TEACHING = 10;
const ID_IMPORT_FILE = 11;
const ID_ACCOUNT_GV = 12;
const ID_ROLE = 13;
const ID_PROFILE_GV = 14;
const ID_HISTORY = 15;
const ID_SQS = 16;
const ID_ACCOUNT_SV = 17;
const ID_PROFILE_SV = 18;
const ID_ADMIN = 0;
const ID_QL = 1;
const ID_GV = 2;

?>
@if(Auth::check())
    @if(isset($user->classify) && ($user->classify == ID_ADMIN || $user->classify == ID_QL || $user->classify == ID_GV))
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                class="fas fa-bars"></i></a>
                    </li>

                </ul>

                <!-- Right navbar links -->
                <div class="dropdown ml-auto">
                    <button class="btn" style="background: #103D8F" type="button" data-toggle="dropdown">
                        <i class="fas fa-user" style="color:white"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{url('logout')}}">Logout <i style="margin-left: 50%;"
                                                                                    class="fas fa-sign-out-alt"></i></a>
                    </div>
                </div>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="/admin/home" class="brand-link">
                    <img src="{{asset('home/img/logo/logotlu.png')}}" alt="AdminLTE Logo"
                         class="brand-image img-circle elevation-3"
                         style="opacity: .8">
                    <span class="brand-text font-weight-light">Thủy Lợi University</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                                with font-awesome or any other icon font library -->

                            <?php if(in_array(ID_ACCOUNT_GV, $arrID) == true || in_array(ID_ACCOUNT_SV, $arrID) == true || $user->classify == ID_ADMIN){ ?>
                            <li class="nav-item has-treeview">
                                <a class="nav-link">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Quản Lý tài khoản
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <?php if(in_array(ID_ACCOUNT_GV, $arrID) == true || $user->classify == ID_ADMIN){ ?>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item" style="padding-left: 5%">
                                        <a href="{{route('AllUsersTeacher')}}" class="nav-link">
                                            <i class="fas fa-user-tie"></i>
                                            <p>Tài khoản giảng viên</p>
                                        </a>
                                    </li>
                                </ul>
                                <?php } ?>

                                <?php if(in_array(ID_ACCOUNT_SV, $arrID) == true || $user->classify == ID_ADMIN){ ?>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item" style="padding-left: 5%">
                                        <a href="{{route('AllUsersStudent')}}" class="nav-link">
                                            <i class="fas fa-user-graduate"></i>
                                            <p>Tài khoản sinh viên</p>
                                        </a>
                                    </li>
                                </ul>
                                <?php } ?>
                            </li>
                            <?php } ?>

                            <?php if(in_array(ID_PROFILE_GV, $arrID) == true || in_array(ID_PROFILE_SV, $arrID) == true || $user->classify == ID_ADMIN){ ?>
                            <li class="nav-item has-treeview">
                                <a class="nav-link">
                                    <i class="nav-icon far fa-address-card"></i>
                                    <p>
                                        Quản Lý hồ sơ
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <?php if(in_array(ID_PROFILE_GV, $arrID) == true || $user->classify == ID_ADMIN){ ?>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item" style="padding-left: 5%">
                                        <a href="/admin/manage/profile" class="nav-link">
                                            <i class="fas fa-user-tie"></i>
                                            <p>Hồ sơ giảng viên</p>
                                        </a>
                                    </li>
                                </ul>
                                <?php } ?>
                                <?php if(in_array(ID_PROFILE_SV, $arrID) == true || $user->classify == ID_ADMIN){ ?>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item" style="padding-left: 5%">
                                        <a href="/admin/manage/profileStudent" class="nav-link">
                                            <i class="fas fa-user-graduate"></i>
                                            <p>Hồ sơ sinh viên</p>
                                        </a>
                                    </li>
                                </ul>
                                <?php } ?>
                            </li>
                            <?php } ?>

                            <?php if(in_array(ID_ROLE, $arrID) == true || $user->classify == ID_ADMIN){ ?>
                            <li class="nav-item has-treeview">
                                <a href="{{route('UserRoles')}}" class="nav-link">
                                    <i class="nav-icon fas fa-user-check"></i>
                                    <p>Quản lý quyền</p>
                                </a>
                            </li>
                            <?php } ?>

                            <?php if(in_array(ID_SCIENCE, $arrID) == true || $user->classify == ID_ADMIN){ ?>
                            <li class="nav-item has-treeview">
                                <a href="/admin/manage/science" class="nav-link">
                                    <i class="nav-icon fab fa-accusoft"></i>
                                    <p>
                                        Quản lý khoa
                                    </p>
                                </a>
                            </li>
                            <?php } ?>

                            <?php if(in_array(ID_SUBJECT, $arrID) == true || $user->classify == ID_ADMIN){ ?>
                            <li class="nav-item has-treeview">
                                <a href="/admin/manage/subject" class="nav-link">
                                    <i class="nav-icon fas fa-journal-whills"></i>
                                    <p>
                                        Quản lý bộ môn
                                    </p>
                                </a>
                            </li>
                            <?php } ?>

                            <?php if(in_array(ID_SUBJECT, $arrID) == true || $user->classify == ID_ADMIN){ ?>
                            <li class="nav-item has-treeview">
                                <a href="/admin/manage/specialized" class="nav-link">
                                    <i class="nav-icon fas fa-glasses"></i>
                                    <p>
                                        Quản lý chuyên ngành
                                    </p>
                                </a>
                            </li>
                            <?php } ?>

                            <?php if(in_array(ID_SUBJECT_SECTION, $arrID) == true || $user->classify == ID_ADMIN){ ?>
                            <li class="nav-item has-treeview">
                                <a href="/admin/manage/subject_section" class="nav-link">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>
                                        Quản lý môn học
                                    </p>
                                </a>
                            </li>
                            <?php } ?>

                            <?php if(in_array(ID_CLASS, $arrID) == true || $user->classify == ID_ADMIN){ ?>
                            <li class="nav-item has-treeview">
                                <a href="/admin/manage/class" class="nav-link">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Quản lý Lớp
                                    </p>
                                </a>
                            </li>
                            <?php } ?>

                            <?php if(in_array(ID_COURSE, $arrID) == true || $user->classify == ID_ADMIN){ ?>
                            <li class="nav-item has-treeview">
                                <a href="/admin/manage/course" class="nav-link">
                                    <i class="nav-icon fas fa-key"></i>
                                    <p>
                                        Quản lý khóa học
                                    </p>
                                </a>
                            </li>
                            <?php } ?>

                            <?php if(in_array(ID_KNOWLEDGE_BLOCK, $arrID) == true || $user->classify == ID_ADMIN){ ?>
                            <li class="nav-item has-treeview">
                                <a href="/admin/manage/knowledge_block" class="nav-link">
                                    <i class="nav-icon fas fa-layer-group"></i>
                                    <p>
                                        Quản lý khối kiến thức
                                    </p>
                                </a>
                            </li>
                            <?php } ?>

                            <?php if(in_array(ID_FRAMEWORK, $arrID) == true || $user->classify == ID_ADMIN){ ?>
                            <li class="nav-item has-treeview">
                                <a href="/admin/manage/framework" class="nav-link">
                                    <i class="nav-icon far fa-square"></i>
                                    <p>
                                        Khung chương trình học
                                    </p>
                                </a>
                            </li>
                            <?php } ?>

                            <?php if(in_array(ID_OUTLINE, $arrID) == true || $user->classify == ID_ADMIN){ ?>
                            <li class="nav-item has-treeview">
                                <a href="/admin/manage/outline" class="nav-link">
                                    <i class="nav-icon fas fa-book-reader"></i>
                                    <p>
                                        QL đề cương môn học
                                    </p>
                                </a>
                            </li>
                            <?php } ?>

                            <?php if(in_array(ID_TEACHING, $arrID) == true || $user->classify == ID_ADMIN){ ?>
                            <li class="nav-item has-treeview">
                                <a href="/admin/manage/teaching" class="nav-link">
                                    <i class="nav-icon fas fa-briefcase"></i>
                                    <p>
                                        Phân công giảng dạy
                                    </p>
                                </a>
                            </li>
                            <?php } ?>

                            @if(isset($user->classify) && $user->classify == ID_QL && ($user->level == 0 || $user->level == 1 || $user->level == 2 || $user->level == 3 || $user->level == 4))
                                <li class="nav-item has-treeview">
                                    <a href="/admin/manage/merge_request" class="nav-link">
                                        <i class="nav-icon fas fa-check-double"></i>
                                        <p>Yêu cầu xét duyệt</p>
                                        <?php
                                        if ($idRole == 1) {
                                            $count_request_subject = \App\Subject::where('is_request', true)->where('status', false)->count();
                                            $count_request_specialized = \App\Specialized::where('is_request', true)->where('status', false)->count();
                                            $count_request_framework = \App\GroupFramework::where('status0', true)->where('status', false)->count();
                                            $count_request = $count_request_subject + $count_request_specialized + $count_request_framework;
                                        } elseif ($idRole == 2) {
                                            $count_request_knowledge = \App\KnowledgeBlock::where('status', false)->count();
                                            $count_request_framework = \App\GroupFramework::where('status2', '!=', null)->where('status1', false)->count();
                                            $count_request = $count_request_knowledge + $count_request_framework;
                                        } elseif ($idRole == 3) {
                                            $count_request_outline= \App\Outline::where('status', false)->count();
                                            $count_request_subject_section = \App\Subject_Section::where('status', false)->where('id_subject',$id_subject)->count();
                                            $count_request = $count_request_outline + $count_request_subject_section;
                                        }
                                        elseif ($idRole == 5) {
                                            $count_request_framework = \App\GroupFramework::where('status0', 0)->where('status1', 1)->count();
                                            $count_request = $count_request_framework;
                                        }
                                        ?>
                                        @if(isset($count_request))
                                            <p class="right" style="color:red">{{$count_request}}</p>
                                        @endif
                                    </a>
                                </li>
                            @endif

                            <?php if(in_array(ID_IMPORT_FILE, $arrID) == true || in_array(ID_SQS, $arrID) || $user->classify == ID_ADMIN ){ ?>
                            <li class="nav-item has-treeview">
                                <a class="nav-link">
                                    <i class="nav-icon far fa-address-card"></i>
                                    <p>
                                        Đồng bộ dữ liệu
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item" style="padding-left: 5%">
                                        <a href="{{route('ViewSQS')}}" class="nav-link">
                                            <i class="nav-icon fas fa-cogs"></i>
                                            <p>Setting SQS</p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item" style="padding-left: 5%">
                                        <a href="/admin/manage/import_file" class="nav-link">
                                            <i class="nav-icon fas fa-upload"></i>
                                            <p>
                                                Import File
                                            </p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <?php } ?>

                            @if($idRole == 1 || $idRole == 2 || $idRole == 5 || (isset($user->classify) && $user->classify == 0))
                            @else
                                <li class="nav-item has-treeview">
                                    <a href="{{route('ViewTeaching')}}" class="nav-link">
                                        <i class="nav-icon fab fa-accusoft"></i>
                                        <p>
                                            Khối lượng giảng dạy
                                        </p>
                                    </a>
                                </li>
                            @endif


                            <?php if(in_array(ID_HISTORY, $arrID) == true || $user->classify == ID_ADMIN){ ?>
                            <li class="nav-item has-treeview">
                                <a href="/admin/manage/history" class="nav-link">
                                    <i class="nav-icon fas fa-history"></i>
                                    <p>
                                        Lịch sử
                                    </p>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if($user->classify == ID_QL || $user->classify == ID_GV) { ?>
                            <li class="nav-item has-treeview">
                                <a href="{{route('MyInfo')}}" class="nav-link">
                                    <i class="nav-icon far fa-address-card"></i>
                                    <p>
                                        Thông tin cá nhân
                                    </p>
                                </a>
                            </li>
                            <?php } ?>

                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <section class="content">
                    @yield('content-admin')
                </section>
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <strong>Thuy Loi University</strong>
                <div class="float-right d-none d-sm-inline-block">
                    <b>175 Tây Sơn - Đống Đa - Hà Nội</b>
                </div>
            </footer>

        </div>
    @else
        <h1>Bạn không có quyền truy cập vào trang này</h1>
        <span>Quay lại trang đăng nhập <a href="{{route('getloginAdmin')}}">tại đây</a> </span>
    @endif
@else

    <h1>Bạn chưa đăng nhập hoặc không có quyền truy cập vào trang này</h1>
    <span>Quay lại trang đăng nhập <a href="{{route('getloginAdmin')}}">tại đây</a> </span>
@endif
<!-- ./wrapper -->

<!-- jQuery -->

<script src="{{asset('admin/js/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('admin/js/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    text = $('#usngv').val();
    regex = /^[a-zA-Z]+$/; // Chỉ chấp nhận ký tự alphabet thường hoặc ký tự hoa
    if (regex.test(text)) { // true nếu text chỉ chứa ký tự alphabet thường hoặc hoa, false trong trường hợp còn lại.
    } else {
    }
</script>

<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
{{-- Quay lại --}}
<script>
    function quay_lai() {
        history.back();
    }
</script>

<!-- Bootstrap 4 -->
<script src="{{asset('admin/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('admin/js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('admin/js/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('admin/js/jquery.vmap.min.js')}}"></script>
<script src="{{asset('admin/js/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('admin/js/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('admin/js/moment.min.js')}}"></script>
<script src="{{asset('admin/js/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('admin/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('admin/js/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('admin/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('admin/js/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin/js/demo.js')}}"></script>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</body>
</html>
