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

        h4 {
            font-size: 30px;
            height: 10px;
            /* padding: 10px; */
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
    </style>
</head>

<body class="page-top">
    <?php
    // $DonGia = 20000;
    if (isset($_POST['submit'])) {
        $ten = $_POST['ten'];
        $socu = $_POST['socu'];
        $somoi = $_POST['somoi'];
        $don_gia = $_POST['don_gia'];
        $tiendien = 0;

        if (
            isset($socu) and is_numeric($socu) and $socu > 0 and isset($somoi) and is_numeric($somoi) and $somoi > 0
        ) {
            if ($socu < $somoi) {
                $tiendien = ($somoi - $socu) * $don_gia;
            }
        }
    }

    if (isset($_POST['reset'])) {
        $socu = "";
        $somoi = "";
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
                    <h4>BÀI 3: Thiết kế Form tính tiền điện</h4>

                    <form action="" method="post" style="margin-top: 50px">
                        <table align="center" style="background-color:wheat">
                            <tr>
                                <td colspan="2" style="background:orange">
                                    <h1>Thanh Toán Tiền Điện</h1>
                                </td>
                            </tr>
                            <tr>
                                <td>Tên chủ hộ:</td>
                                <td>
                                    <input type="text" name="ten" value="
                    <?php if (isset($ten)) echo $ten; ?>" required>
                                </td>
                            </tr>
                            <tr>
                                <td>Chỉ số cũ:</td>
                                <td>
                                    <input type="text" name="socu" value="
                    <?php if (isset($socu)) echo $socu;
                    echo ""; ?>" required> (Kw)
                                </td>
                                <!-- <td></td> -->
                            </tr>
                            <tr>
                                <td>Chỉ số mới:</td>
                                <td>
                                    <input type="text" name="somoi" value="
                    <?php if (isset($somoi)) echo $somoi;
                    echo ""; ?>" required> (Kw)
                                </td>
                                <!-- <td></td> -->
                            </tr>
                            <tr>
                                <td>Đơn giá:</td>
                                <td>
                                    <input type="text" name="don_gia" value="
                    <?php if (isset($don_gia)) echo $don_gia;
                    else echo "2000"; ?>" readonly> (VNĐ)
                                </td>
                                <!-- <td></td> -->
                            </tr>
                            <tr>
                                <td>Số tiền thanh toán:</td>
                                <td>
                                    <input type="text" name="thanhtoan" style="background-color:lightpink" value="
                    <?php if (isset($tiendien)) echo $tiendien;
                    else echo ""; ?>" readonly> (VNĐ)
                                </td>
                                <!-- <td></td> -->
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align:center">
                                    <button type="submit" name="submit">Tính</button>
                                    <button type="reset" name="reset">Clear</button>
                                    <!-- <input  value="Tinh">
                        <input  value="Clear"> -->
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