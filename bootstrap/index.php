<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php include('../backend/header.php');

    ?>

    <title>Admin</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-danger sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">

                </div>

                <div class="sidebar-brand-text mx-6">Gesport Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="http://localhost/gesport/bootstrap/index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="../bootstrap/index.php?act=admin">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>จัดการผู้ดูแลระบบ</span>
                </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="../bootstrap/index.php?act=member">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>จัดการสมาชิก</span>
                </a>
            </li>


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="../bootstrap/index.php?act=type_product">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>จัดการประเภทสินค้า</span>
                </a>
            <li class="nav-item">
                <a class="nav-link collapsed" href="../bootstrap/index.php?act=product">
                    <i class="fas fa-fw fa-table"></i>
                    <span>จัดการสินค้า</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="../bootstrap/index.php?act=bank">
                    <i class="fas fa-money-check-alt"></i>
                    <span>จัดการข้อมูลธนาคาร</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="../bootstrap/index.php?act=report">
                    <i class="fas fa-file-alt"></i>
                    <span>รายงานรายรับ</span>
                </a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

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

                    <!-- Topbar Search -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->


                        <!-- Nav Item - Alerts -->

                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                Alerts Center
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-primary">
                                        <i class="fas fa-file-alt text-white"></i>
                                    </div>
                                </div>

                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-success">
                                        <i class="fas fa-donate text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 7, 2019</div>
                                    $290.29 has been deposited into your account!
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-warning">
                                        <i class="fas fa-exclamation-triangle text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 2, 2019</div>
                                    Spending Alert: We've noticed unusually high spending for your account.
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                        </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <!-- Dropdown - Messages -->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                                    <h6 class="dropdown-header">
                                        Message Center
                                    </h6>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle" src="img/undraw_profile_1.svg" alt="...">
                                            <div class="status-indicator bg-success"></div>
                                        </div>
                                        <div class="font-weight-bold">

                                    </a>

                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="img/undraw_profile_3.svg" alt="...">
                                    <div class="status-indicator bg-warning"></div>
                                </div>

                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="...">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div>

                                </div>
                            </a>

            </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">สวัสดีคุณ&nbsp;<?php echo $a_name ?></span>
                    <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../logout.php">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>

            </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p></p>
                        <?php
                        error_reporting(0);
                        $act = $_GET['act'];
                        $do = $_GET['do'];
                        if ($act == 'add') {
                            include('../backend/admin_form_add.php');
                        } elseif ($act == 'edit') {
                            include('../backend/admin_form_edit.php');
                        } elseif ($act == 'rwd') {
                            include('../backend/admin_form_rwd.php');
                        } elseif ($act == 'rwd_member') {
                            include('../backend/member_form_rwd.php');
                        } elseif ($act == 'del_admin') {
                            include('../backend/admin_del_db.php');
                        } elseif ($act == 'add_member') {
                            include('../backend/member_form_add.php');
                        } elseif ($act == 'add_type') {
                            include('../backend/type_form_add.php');
                        } elseif ($act == 'product_add') {
                            include('../backend/product_form_add.php');
                        } elseif ($act == 'member') {
                            include('../backend/member_list.php');
                        } elseif ($act == 'edit_member') {
                            include('../backend/member_form_edit.php');
                        } elseif ($act == 'del_member') {
                            include('../backend/member_del_db.php');
                        } elseif ($act == 'type_product') {
                            include('../backend/type_list.php');
                        } elseif ($act == 'edit_type') {
                            include('../backend/type_form_edit.php');
                        } elseif ($act == 'type_del') {
                            include('../backend/type_form_edit.php');
                        } elseif ($act == 'product') {
                            include('../backend/product_list.php');
                        } elseif ($act == 'product_edit') {
                            include('../backend/product_form_edit.php');
                        } elseif ($act == 'admin') {
                            include('../backend/admin_list.php');
                        } elseif ($act == 'order_detail') {
                            include('../backend/order_detail.php');
                        } elseif ($act == 'payment_detail') {
                            include('../backend/payment_detail.php');
                        } elseif ($act == 'ems_detail') {
                            include('../backend/ems_detail.php');
                        } elseif ($act == 'order_cancel') {
                            include('../backend/order_detail.php');
                        } elseif ($act == 'bank') {
                            include('../backend/bank_list.php');
                        } elseif ($act == 'add_bank') {
                            include('../backend/bank_from_add.php');
                        } elseif ($act == 'bank_edit') {
                            include('../backend/bank_form_edit.php');
                        } elseif ($act == 'del_bank') {
                            include('../backend/bank_del_db.php');
                        } elseif ($act == 'report') {
                            include('../backend/report.php');
                        } elseif ($act == 'soldout') {
                            include('../backend/soldout.php');
                        } else {
                            include('../backend/dashboard.php');
                        }

                        ?>
                        <!-- Content Wrapper. Contains page content -->
                    </div>
                </div>
            </div>
            <!-- Content Row -->


        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>