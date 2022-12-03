<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="show.css?v=<?php echo time(); ?>">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="box__center">
        <h1 style="margin-bottom:20px;">THÔNG TIN SỮA</h1>
        </h1>
        <?php
        // Kết nối Database
        require_once "connection.php";

        // Số dòng trong 1 trang
        $rowPerPage = 5;

        // Set tràng mặc định
        if (isset($_GET["page"])) {
            $page  = $_GET["page"];
        } else {

            $page = 1;
        }

        // Vi tri cua mau tin dau tien tren moi trang
        $offset = ($page - 1) * $rowPerPage;

        // Set stt của record
        $temp = $page  * $rowPerPage;

        // Truy vấn để lấy số bản ghi ứng với số dòng mỗi trang
        $query = "SELECT * FROM sua LIMIT $offset, $rowPerPage";

        $result = mysqli_query($conn, $query);

        // Set bđ chạy của stt từng trang
        if ($temp <= $rowPerPage) {
            $stt = 0;
        } else {
            $stt = $temp - $rowPerPage;
        }


        ?>
        <!-- Fetch DL -->
        <table border='1' cellpadding='10' cellspacing='10'>
            <thead>
                <tr>
                    <th>STT</th>
                    <th width=”10%”>Mã Sữa</th>
                    <th>Tên Sữa</th>
                    <th>Mã Hãng Sữa</th>
                    <th>Đơn Giá</th>
                </tr>
            </thead>
            <tbody>

                <?php
                while ($row = mysqli_fetch_array($result)) {
                    $stt++;
                ?>
                    <tr>
                        <td><?php echo $stt; ?></td>
                        <td><?php echo $row["Ma_Sua"]; ?></td>
                        <td><?php echo $row["Ten_Sua"]; ?></td>
                        <td><?php echo $row["Ma_Hang_Sua"]; ?></td>
                        <td><?php echo $row["Don_gia"]; ?></td>
                    </tr>
                <?php
                };
                ?>
            </tbody>

        </table>

        <nav aria-label="..." style="margin-top: 20px;" class="d-flex justify-content-center">
            <ul class="pagination">
                <?php 
                    $sum = "SELECT COUNT(*) FROM sua";

                    $rs_result = mysqli_query($conn, $sum);

                    $row = mysqli_fetch_row($rs_result);

                    $total_records = $row[0];

                    echo "</br>";

                    // Number of pages required.

                    $total_pages = ceil($total_records / $rowPerPage);

                    $pagLink = "";

                    if ($page >= 2) {

                        echo "<li class='page-item'><a class='page-link' href='index.php?page=" . ($page - 1) . "'>  Prev </a></li>";
                    }

                    for ($i = 1; $i <= $total_pages; $i++) {
                        // C1
                        // if ($i == $page) {
                        //     $pagLink .= '<li class="page-item active"><a class="page-link" href="index.php?page="' . $i . '">' . $i . ' </a></li>';
                        // } else {

                        //     $pagLink .= "<li class='page-item'><a class='page-link' href='index.php?page=" . $i . "'>" . $i . " </a></li>";
                        // }

                        // C2
                        if ($i == $page) {
                            echo '<li class="page-item active"><a class="page-link" href="index.php?page="' . $i . '">' . $i . ' </a></li>';
                        } else {

                            echo "<li class='page-item'><a class='page-link' href='index.php?page=" . $i . "'>" . $i . " </a></li>";
                        }
                    };
                    // C1
                    // echo $pagLink;

                    if ($page < $total_pages) {

                        echo "<li class='page-item'><a class='page-link' href='index.php?page=" . ($page + 1) . "'>  Next </a></li>";
                    }
                ?>
            </ul>
        </nav>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>