<?php
require '../include/db_conn.php';
page_protect();
?>
<!DOCTYPE html>
<html lang="en">

<head>


    <title>BÀI TẬP</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href="/template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/template/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .boder {
            /* margin: auto; */
            /* padding: 50px 10px; */
            border: 3px solid white;
            border-radius: 10px;
            background: wheat;
        }

        .text {
            text-align: center;
            padding-bottom: 20px;
            background: orange;
        }

        h1 {
            font-size: 30px;
            height: 10px;
        }

        .width {
            width: 500px;
        }

        .btn {
            text-align: center;
            font-weight: bold;
        }

        button {
            border: none;
            padding: 10px 20px;
            font-weight: bold;
            border-radius: 10px;
        }

        .margin {
            padding: 10px;
            /* margin: 200px; */
            font-weight: bold;
        }
    </style>
</head>

<body class="page-top">
    <?php
    if (isset($_POST['submit'])) {
        if (is_numeric($_POST['t']) and $_POST['t'] >= 0) {
            $t = $_POST['t'];
            if (is_numeric($_POST['l']) and $_POST['l'] >= 0) {
                $l = $_POST['l'];
                if (is_numeric($_POST['h']) and $_POST['h'] >= 0) {
                    $h = $_POST['h'];
                    if (is_numeric($_POST['diem']) and $_POST['diem'] >= 0) {
                        $c = $_POST['diem'];
                        $sum = $t + $l + $h;
                        if ($sum >= $c) {
                            $kq = "Đậu";
                        } else {
                            $kq = "Rớt";
                        }
                    } else $c = "Vui lòng nhập số >= 0";
                } else $h = "Vui lòng nhập số >= 0";
            } else $l = "Vui lòng nhập số >= 0";
        } else $t = "Vui lòng nhập số >= 0";
    }
    if (isset($_POST['reset'])) {
        $t = "";
        $l = "";
        $h = "";
        $c = "20";
        $sum = "";
        $kq = "";
    }
    ?>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include("nav.php") ?>
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
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>


                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['full_name']; ?></span>
                                <i class="fas fa-user"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h4>BÀI 4: Thiết kế Form Kết quả thi đại học</h4>

                    <form action="" method="post">
                        <table class="boder" align="center">
                            <tr>
                                <td colspan="2" class="text">
                                    <h1>KẾT QUẢ THI ĐẠI HỌC</h1>
                                </td>
                            </tr>
                            <tr>
                                <td class="margin">Toán:</td>
                                <td> <input type="text" name="t" value="<?php if (isset($t)) echo $t; ?>" required></td>
                            </tr>
                            <tr>
                                <td class="margin">Lý:</td>
                                <td><input type="text" name="l" value="<?php if (isset($l)) echo $l; ?>" required></td>
                            </tr>
                            <tr>
                                <td class="margin">Hóa:</td>
                                <td><input type="text" name="h" value="<?php if (isset($h)) echo $h; ?>" required></td>
                            </tr>
                            <tr>
                                <td class="margin">Điểm chuẩn:</td>
                                <td><input type="text" name="diem" value="<?php if (isset($c)) echo $c;
                                                                            else echo "20" ?>"></td>
                            </tr>
                            <tr>
                                <td class="margin">Tổng điểm:</td>
                                <td><input class="a" type="text" name="sum" value="<?php if (isset($sum)) echo $sum;
                                                                                    else echo ""; ?>" readonly></td>
                            </tr>
                            <tr>
                                <td class="margin">Kết quả:</td>
                                <td><input class="a" type="text" name="kq" value="<?php if (isset($kq)) echo $kq;
                                                                                    else echo ""; ?>" readonly></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center">
                                    <input class="btn" type="submit" name="submit" value="Xem kết quả">
                                    <?php if (isset($_POST['submit'])) ?>
                                </td>
                            </tr>
                        </table>
                    </form>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include("../dashboard/admin/footer.php") ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/template/vendor/jquery/jquery.min.js"></script>
    <script src="/template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/template/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/template/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/template/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/template/js/demo/chart-area-demo.js"></script>
    <script src="/template/js/demo/chart-pie-demo.js"></script>

</body>

</html>