<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
        <div class="form__container">
            <?php 
                if (isset($_GET['lienket'])) {
                    $lienket = $_GET['lienket'];
                }
                // echo $lienket;

                include "connection.php";
                $query = 'SELECT sua.Loi_ich, sua.Hinh, sua.Ten_Sua, hs.Ten_Hang_Sua, sua.Trong_luong, sua.Don_gia, sua.`TP_Dinh_Duong` FROM `sua` sua, `hang_sua` hs 
                WHERE sua.Ma_Hang_Sua LIKE hs.Ma_Hang_Sua AND sua.Ma_Sua LIKE "'.$lienket.'"';

                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($result)) {
            ?>
                <div class="form__title">
                    <?php echo $row["Ten_Sua"]." - ".$row["Ten_Hang_Sua"];?>
                </div>
                <div class="row">
                    <div class="col-4" style="position:relative;">
                        <img src="<?php echo $row["Hinh"];?>" alt="anh" onerror="this.src='error.jpg'" height="200" width="200" class="mb-4">
                        <a href="javascript:window.history.back(-1);" class="align-self-end ms-3" style="position:absolute; bottom: 0; left: 0;">Quay về</a>
                    </div>
                    <div class="col-8">
                        <div class="form__box">
                            <strong><i>Thành phần dinh dưỡng</i></strong>
                            <p><?php echo $row["TP_Dinh_Duong"]?></p>
                        </div>
                        <div class="form__box">
                            <strong><i>Lợi ích</i></strong>
                            <p><?php echo $row["Loi_ich"]?></p>
                            <div class="text-end"><?php echo "<strong>Trọng lượng:</strong> ".$row["Trong_luong"]." gr - <strong>Đơn giá:</strong> ".$row["Don_gia"]." VND"?></div>
                        </div>
                    </div>
                    
                </div>
            <?php
                };
            ?>
        </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>