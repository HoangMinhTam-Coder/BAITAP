<?php
require '../../include/db_conn.php';
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
        * {
            box-sizing: border-box;
        }

        form {
            margin: 30px auto;
            color: white;
            background-color: #46A094;
            width: max-content;
            padding: 20px;
            border-radius: 5px;
            box-shadow: rgba(255, 255, 255, 0.1) 0px 1px 1px 0px inset, rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
        }

        .submit {
            display: block;
            margin: 0 auto;
            padding: 2px 10px;
        }
    </style>
</head>

<body class="page-top">
    <?php
    if (is_numeric($_POST['a'])) {
        $a = (float)$_POST['a'];
        if (isset($_POST['b']) && is_numeric($_POST['b'])) {
            $b = (float)$_POST['b'];
            $pt = $_POST['cal'];
            switch ($pt) {
                case 'cong':
                    $s = "Cộng";
                    $kq = $a + $b;
                    break;
                case 'tru':
                    $s = "Trừ";
                    $kq = $a - $b;
                    break;
                case 'nhan':
                    $s = "Nhân";
                    $kq = $a * $b;
                    break;
                case 'chia':
                    $s = "Chia";
                    if ($b != 0) $kq = $a / $b;
                    else {
                        $error3 = "Không chia được cho 0";
                        header('Location:../baitap6.php');
                    }
                    break;
                default:
                    break;
            }
        } else {
            $error2 = "Vui lòng nhập một số";
            header('Location:../baitap6.php');
        }
    } else {
        $error1 = "Vui lòng nhập một số";
        header('Location:../baitap6.php');
    }
    ?>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include("../nav.php") ?>
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
                    <h4>BÀI 6: TRANG KẾT QUẢ</h4>
                    <pre style="font-size: 19px; font-family:Tahoma, sans-serif">
                    Yêu cầu: Viết trang web thực hiện phép tính trên 2 số.
                    - <b>Trang Nhập liệu</b>: Cho người dùng chọn phép tính, nhập giá trị 2 số. Có nút Tính để chuyển 
                    sang trang Nhập liệu (hình 1-Trang nhập liệu).
                    - <b>Trang Kết quả</b>: Hiện phép tính đã chọn, giá trị của 2 số và kết quả của phép tính. Trong 
                    trang này, có link cho người dùng quay về trang trước đó (hình 2-Trang kết quả).
                    </pre>
                    <form action="" method="POST">
                        <table align="center">
                            <tr>
                                <td colspan="2" align="center">
                                    <h3 style="color: #045FB4;">PHÉP TÍNH TRÊN HAI SỐ</h3>
                                </td>
                            </tr>
                            <tr>
                                <td class="a">Chọn phép tính: </td>
                                <td class="a1"><?php if (isset($s)) echo $s ?></td>
                            </tr>
                            <tr>
                                <td class="b">Số 1: </td>
                                <td> <input type="text" size="26px" value="<?php if (isset($a)) echo $a; ?>" readonly></td>
                            </tr>
                            <tr>
                                <td class="b">Số 2: </td>
                                <td> <input type="text" size="26px" value="<?php if (isset($b)) echo $b; ?>" readonly></td>
                            </tr>
                            <tr>
                                <td class="b">Kết quả: </td>
                                <td><input type="text" size="26px" value="<?php if (isset($kq)) echo $kq; ?>" readonly></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><a class="c" href="javascript:window.history.back(-1);">Quay lại trang trước</a></td>
                            </tr>
                        </table>
                    </form>




                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include("../../dashboard/admin/footer.php") ?>
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