<?php

if (!$this->session->has_userdata('login_session')) {
    redirect('login');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/icon/logo.png">

    <title>SKRIPSI | EKA <?= $title ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>assets/sbadmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>assets/sbadmin/css/sb-admin-biru.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/all.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/animate/animate.min.css" rel="stylesheet">
    <!-- Select Chosen -->
    <link href="<?= base_url(); ?>assets/plugin/datepicker/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
    <!-- Select Chosen -->
    <link href="<?= base_url(); ?>assets/plugin/chosen/dist/css/component-chosen.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="<?= base_url(); ?>assets/sbadmin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex flex-column align-items-center justify-content-center m-md-4" href="<?= base_url() ?>home">
                <div class="sidebar-brand-icon mb-3">
                    <img src="<?= base_url(); ?>assets/icon/logo.png" width="50">
                </div>
                <div class="sidebar-brand-text mx-3">PENGELOLA ARSIP</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <?php if ($title == 'Dashboard'): ?>
                <li class="nav-item active">
                <?php else: ?>
                <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link" href="<?= base_url(); ?>home">
                    <center>
                        <span>Dashboard</span>
                    </center>
                </a>
                </li>

                <?php if ($this->session->userdata('login_session')['level'] == 'admin'): ?>
                    <hr class="sidebar-divider my-0">
                    <?php if ($title == 'Dokumen'): ?>
                        <li class="nav-item active">
                        <?php else: ?>
                        <li class="nav-item">
                        <?php endif; ?>
                        <a class="nav-link" href="<?= base_url() ?>dokumen">
                            <center>
                                <span>Dokumen</span>
                            </center>
                        </a>
                        </li>
                    <?php endif; ?>
                    <?php if ($this->session->userdata('login_session')['level'] == 'staff'): ?>
                        <hr class="sidebar-divider my-0">
                        <?php if ($title == 'File'): ?>
                            <li class="nav-item active">
                            <?php else: ?>
                            <li class="nav-item">
                            <?php endif; ?>
                            <a class="nav-link" href="<?= base_url() ?>filemanager">
                                <center>
                                    <span>File Manager</span>
                                </center>
                            </a>
                            </li>
                        <?php endif; ?>

                        <?php if ($this->session->userdata('login_session')['level'] == 'admin'): ?>
                            <hr class="sidebar-divider my-0">
                            <?php if ($title == 'Kategori'): ?>
                                <li class="nav-item active">
                                <?php else: ?>
                                <li class="nav-item">
                                <?php endif; ?>
                                <a class="nav-link" href="<?= base_url() ?>kategori">
                                    <center>
                                        <span>Kategori</span>
                                    </center>
                                </a>
                                </li>

                            <?php endif; ?>
                            <?php if ($this->session->userdata('login_session')['level'] == 'admin'): ?>
                                <hr class="sidebar-divider my-0">
                                <?php if ($title == 'Pengaturan'): ?>
                                    <li class="nav-item active">
                                    <?php else: ?>
                                    <li class="nav-item">
                                    <?php endif; ?>
                                    <a class="nav-link" href="<?= base_url() ?>pengaturan/ubah/<?= $this->session->userdata('login_session')['id_user'] ?>">
                                        <center>
                                            <span>Pengaturan</span>
                                        </center>
                                    </a>
                                    </li>

                                <?php endif; ?>
                                <?php if ($this->session->userdata('login_session')['level'] == 'admin' || $this->session->userdata('login_session')['level'] == 'staff'): ?>
                                    <hr class="sidebar-divider my-0">
                                    <?php if ($title == 'Logout'): ?>
                                        <li class="nav-item active">
                                        <?php else: ?>
                                        <li class="nav-item">
                                        <?php endif; ?>
                                        <a class="nav-link" id="logout" href="#" onclick="logout()">
                                            <center>
                                                <span>Logout</span>
                                            </center>
                                        </a>

                                        </li>

                                    <?php endif; ?>



                                    <!-- Sidebar Toggler (Sidebar) -->
                                    <div class="text-center d-none d-md-inline">
                                        <button class="rounded-circle border-0" id="sidebarToggle"></button>
                                    </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- base url untuk js -->
                <input type="hidden" value="<?= base_url() ?>" id="baseurl">