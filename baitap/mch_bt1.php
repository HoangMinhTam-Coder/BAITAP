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
</head>

<body class="page-top">

    <?php
    function tao_mang($n, $a)
    {

        for ($i = 0; $i < $n; $i++) {
            $a[$i] = rand(-999, 999);
        }
        echo "b. Mảng vừa tạo:" . "<br>";
        for ($i = 0; $i < $n; $i++) {
            echo $a[$i] . " ";
        }

        $dem = 0;
        for ($j = 0; $j < $n; $j++) {
            if ($a[$j] % 2 == 0) {
                $dem++;
            }
        }
        echo "<br>c." . "Trong mảng có " . $dem . " số chẵn";

        $dem = 0;
        for ($i = 0; $i < $n; $i++) {
            if ($a[$i] < 100) {
                $dem++;
            }
        }
        echo "<br>d." . "Trong mảng có " . $dem . " số nhỏ hơn 100";

        $tong = 0;
        for ($i = 0; $i < $n; $i++) {
            if ($a[$i] < 0) {
                $tong += $a[$i];
            }
        }
        echo "<br>e." . "Tổng số âm trong mảng là: " . $tong;

        $vt = 0;
        for ($i = 0; $i < $n; $i++) {
            if ($a[$i] == 0) {
                $vt = $i;
                echo "<br>f." . "Vị trí " . $vt . " bằng 0";
            }
        }

        $tam = 0;
        for ($i = 0; $i < $n - 1; $i++) {
            if ($a[$i] > $a[$i + 1]) {
                $tam = $a[$i + 1];
                $a[$i + 1] = $a[$i];
                $a[$i] = $tam;
            }
        }
        echo "<br>g." . "Mảng vừa sắp xếp:" . "<br>";
        for ($i = 0; $i < $n; $i++) {
            echo $a[$i] . " ";
        }
    }
    function kiem_tra($num)
    {
        $a = array();
        // flag = -1 => số âm
        // flag =  0 =>  số 0
        //flag =  1 => số dương

        $flag = 0;
        if ($num > 0)
            $flag = 1;
        else 
                    if ($num < 0)
            $flag = -1;
        if ($flag == -1) {
            echo "a. Số bạn nhập phải lớn hơn 0";
        } else {
            tao_mang($num, $a);
        }
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

                        <!-- Nav Item - Alerts -->
                        <!-- <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <b>Bài Tập</b>
                            </a>
                            
                        </li> -->

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
                    <h4>BÀI 1: Tạo form nhập vào 1 số tự nhiên n (form gồm 1 textfield Nhập n và một nút Thực
                        hiện).</h4>
                    <pre style="font-family: Tahoma; font-size: 19px">
                    Sau khi nhập vào n và nhấn nút Thực hiện, form thực hiện các công việc sau:
                        a- Kiểm tra n có phải là số nguyên dương. Nếu thỏa điều kiện thì:
                        b- Hiển thị mảng phát sinh ngẫu nhiên có n phần tử là số nguyên (Sử dụng hàm rand() (đưa ra số 
                        interger ngẫu nhiên).
                        c- Đếm số phần tử trong mảng có giá trị là số chẵn.
                        d- Đếm số phần tử trong mảng có giá trị là số nhỏ hơn 100
                        e- Tính tổng của các phần tử trong mảng có giá trị là số âm 
                        f- In ra vị trí của các phần tử trong mảng có giá trị bằng 0
                        g- Sắp xếp các phần tử theo thứ tự tăng dần rồi in mảng ra màn hình
                    </pre>

                    <form action="" method="POST">
                        <table>
                            <tr>
                                <td>Số n:</td>
                                <td><input type="text" name="n" value="<?php if (isset($n)); ?>"></td>
                            </tr>
                            <tr class="btn">
                                <td colspan="2">
                                    <button type="submit" name="submit">THỰC HIỆN</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                    <div class="cal">
                        <?php
                        if (isset($_POST["submit"])) {
                            $n = $_POST['n'];
                            kiem_tra($n);
                        }
                        ?>
                    </div>
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