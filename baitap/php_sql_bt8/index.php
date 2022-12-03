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
        <h1 style="margin-bottom:20px;margin-top: 20px;">THÔNG TIN CHI TIẾT CÁC LOẠI SỮA</h1>
        </h1>
        <?php
        // Kết nối Database
        require_once "connection.php";

        // Số dòng trong 1 trang
        $rowPerPage = 2;

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
        $query = "SELECT sua.Loi_ich, sua.Hinh, sua.Ten_Sua, hs.Ten_Hang_Sua, sua.Trong_luong, sua.Don_gia, sua.`TP_Dinh_Duong` FROM `sua` sua, `hang_sua` hs 
        WHERE sua.Ma_Hang_Sua LIKE hs.Ma_Hang_Sua  LIMIT $offset, $rowPerPage";

        $result = mysqli_query($conn, $query);

        // Set bđ chạy của stt từng trang
        if ($temp <= $rowPerPage) {
            $stt = 0;
        } else {
            $stt = $temp - $rowPerPage;
        }
        ?>
        <!-- Fetch DL -->
        <?php
        while ($row = mysqli_fetch_array($result)) {
            $stt++;
        ?>
            <div class="form__container">
                <div class="form__title"><?php echo $row["Ten_Sua"] . " - " . $row["Ten_Hang_Sua"]; ?></div>
                <div class="row">
                    <div class="col-4" style="position:relative;">
                        <img src="<?php echo $row["Hinh"]; ?>" alt="anh" onerror="this.src='error.jpg'" height="200" width="200" class="mb-4">
                    </div>
                    <div class="col-8">
                        <div class="form__box">
                            <strong><i>Thành phần dinh dưỡng</i></strong>
                            <p><?php echo $row["TP_Dinh_Duong"] ?></p>
                        </div>
                        <div class="form__box">
                            <strong><i>Lợi ích</i></strong>
                            <p><?php echo $row["Loi_ich"] ?></p>
                            <div class="text-start"><?php echo '<strong class="red">Trọng lượng:</strong> '. $row["Trong_luong"] . ' gr - <strong class="red">Đơn giá:</strong> ' . $row["Don_gia"] . " VND" ?></div>
                        </div>
                    </div>

                </div>
            </div>

        <?php
        };
        ?>

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