<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$site_name;?> | <?=$tagline;?></title>
        <link href='<?=base_url('assets/')?>favicon.ico' rel='image_src'/>

        <link rel="apple-touch-icon" sizes="57x57" href="<?=base_url('assets/')?>apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?=base_url('assets/')?>apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?=base_url('assets/')?>apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?=base_url('assets/')?>apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?=base_url('assets/')?>apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?=base_url('assets/')?>apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?=base_url('assets/')?>apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?=base_url('assets/')?>apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?=base_url('assets/')?>apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="<?=base_url('assets/')?>android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?=base_url('assets/')?>favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="<?=base_url('assets/')?>favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url('assets/')?>favicon-16x16.png">
        <link rel="manifest" href="<?=base_url('assets/')?>manifest.json">
        <meta name="msapplication-TileColor" content="#28a745">
        <meta name="msapplication-TileImage" content="<?=base_url('assets/')?>ms-icon-144x144.png">
        <meta name="theme-color" content="#28a745">
        <meta name="robots" content="noindex, nofollow">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?=base_url('assets/');?>plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url('assets/');?>dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/');?>plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/');?>plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/');?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/');?>plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/');?>plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/');?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="<?=base_url('assets/');?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?=base_url('assets/');?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url('assets/');?>dist/js/adminlte.min.js"></script>
    <script src="<?=base_url('assets/');?>plugins/summernote/summernote-bs4.min.js"></script>
    <script src="<?=base_url('assets/');?>plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <script src="<?=base_url('assets/');?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=base_url('assets/');?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?=base_url('assets/');?>plugins/toastr/toastr.min.js"></script>
    <script src="<?=base_url('assets/');?>plugins/select2/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    </head>
    <body class="hold-transition sidebar-mini">
    <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        </ul>


        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> 4 new messages
                <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> 8 friend requests
                <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> 3 new reports
                <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
        <li class="nav-item">
            <a href="/manager/logout" class="nav-link"><i class="fa fa-sign-out-alt"></i></a>
        </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Sidebar -->
        <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            <img src="<?=base_url('assets/');?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
            <a href="#" class="d-block">Administrator</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="#" class="nav-link <?=strtolower($menu['text']) == 'dashboard' ? 'active' : '' ;?>">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                        <!-- <span class="right badge badge-danger">New</span> -->
                    </p>
                    </a>
                </li>
                <!-- <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Active Page</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Inactive Page</p>
                        </a>
                    </li>
                    </ul>
                </li> -->
                <li class="nav-item <?=strtolower($menu['text']) == 'user management' ? 'has-treeview menu-open' : '' ;?>">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        User Management
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link <?=strtolower($menu['text']) == 'pencari kerja' ? 'active' : '' ;?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pencari Kerja</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/manager/perusahaan" class="nav-link <?=strtolower($submenu[0]) == 'perusahaan' ? 'active' : '' ;?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Perusahaan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?=strtolower($menu['text']) == 'postingan' ? 'has-treeview menu-open' : '' ;?>">
                    <a href="#" class="nav-link <?=strtolower($menu['text']) == 'postingan' ? 'active' : '' ;?>">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Postingan
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/manager/loker" class="nav-link <?=strtolower($submenu[0]) == 'kelola lowongan' ? 'active' : '' ;?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Kelola Lowongan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link <?=strtolower($submenu[0]) == 'kelola blog' ? 'active' : '' ;?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kelola Blog</p>
                                <span class="right badge badge-info">Baru</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/manager/kategori" class="nav-link <?=strtolower($submenu[0]) == 'kelola kategori' ? 'active' : '' ;?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Kelola Kategori</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/manager/industri" class="nav-link <?=strtolower($submenu[0]) == 'kelola industri' ? 'active' : '' ;?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Kelola Industri</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Kelola Lokasi Kerja</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/manager/halaman" class="nav-link <?=strtolower($menu['text']) == 'halaman' ? 'active' : '' ;?>">
                    <i class="nav-icon fas fa-file"></i>
                    <p>
                        Halaman
                    </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-user-plus"></i>
                    <p>
                        Guest Post
                    </p>
                    </a>
                </li>
                
                <li class="nav-header">Pengaturan</li>
                <li class="nav-item">
                    <a href="/manager/iklan" class="nav-link <?=strtolower($menu['text']) == 'iklan' ? 'active' : '' ;?>">
                    <i class="nav-icon fas fa-ad"></i>
                    <p>
                        Iklan
                    </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-wrench"></i>
                    <p>
                        Pengaturan
                    </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?=$menu['link'];?>"><?=$menu['text'];?></a></li>
                <?php $i=0; $total=count($submenu)-1; while($i <= $total):?>
                    <li class="breadcrumb-item <?=$i == $total ? 'active' : ''; ?>"><?=$submenu[$i]?></li>                    
                <?php $i++; endwhile;?>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <?=@$content;?>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
        <h5>Administrator</h5>
        <a href="#" class="btn btn-danger">Logout</a>
        </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- Default to the left -->
        <strong>Copyright &copy; <?=date('Y');?> <a href="<?=base_url()?>"><?=$site_name?></a>.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->

</body>
</html>