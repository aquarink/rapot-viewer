<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Rapor Viewer Dashboard - PKM Universitas Pamulang</title>
        <link rel="shortcut icon" href="https://e-learningc.unpam.ac.id/pluginfile.php?file=%2F1%2Ftheme_edumy%2Ffavicon%2F1614762061%2F532381c292d340838aebb8d2476134e4%20%281%29.png">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/'); ?>plugins/fontawesome-free/css/all.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/'); ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/'); ?>dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <!-- Select2 -->
        <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/'); ?>plugins/select2/css/select2.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/'); ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    </head>
    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="#" class="nav-link">Kontak</a>
                    </li>
                </ul>
                <!-- SEARCH FORM -->
                <!-- <form class="form-inline ml-3">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form> -->
                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
                            class="fas fa-th-large"></i></a>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->
            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="index3.html" class="brand-link">
                <img src="<?php echo base_url('assets/adminlte/'); ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Rapr Viewer</span>
                </a>
                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="<?php echo base_url('assets/adminlte/'); ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block"><?php echo $this->session->userdata('name'); ?></a>
                        </div>
                    </div>
                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item">
                                <a href="<?php echo base_url('dashboard'); ?>" class="nav-link">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>
                                        Dashboard
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>

                            <?php if($this->session->userdata('role') == 'admin') { ?>
                            <li class="nav-item has-treeview <?php echo isset($instansi) ? 'menu-open' : '';?>">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-archway"></i>
                                    <p>
                                        Instansi
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('instansi'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Daftar Instansi</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('tambah-instansi'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Tambah Instansi</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <?php } ?>

                            <?php if($this->session->userdata('role') == 'instansi') { ?>
                            <li class="nav-item has-treeview <?php echo isset($kelas) ? 'menu-open' : '';?>">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-person-booth"></i>
                                    <p>
                                        Kelas
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('kelas'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Daftar Kelas</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('tambah-kelas'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Tambah Kelas</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item has-treeview <?php echo isset($siswa) ? 'menu-open' : '';?>">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-chalkboard-teacher"></i>
                                    <p>
                                        Siswa
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('siswa'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Daftar Siswa</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('tambah-siswa'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Tambah Siswa</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item has-treeview <?php echo isset($rapot) ? 'menu-open' : '';?>">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-address-card"></i>
                                    <p>
                                        Rapor
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('rapot'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Daftar Rapor</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('tambah-rapot'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Tambah Rapor</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <?php } ?>

                            <li class="nav-header">Akun</li>

                            <li class="nav-item">
                                <a href="<?php echo base_url('ubah-password'); ?>" class="nav-link">
                                    <i class="nav-icon far fa-circle text-warning"></i>
                                    <p>Password</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?php echo base_url('keluar'); ?>" class="nav-link">
                                    <i class="nav-icon far fa-circle text-danger"></i>
                                    <p>Keluar</p>
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
                                <!-- <h1 class="m-0 text-dark">Dashboard v2</h1> -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item active"><?php echo isset($breadcrumb) ? $breadcrumb : 'Raport Viewer'; ?></li>
                                </ol>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->