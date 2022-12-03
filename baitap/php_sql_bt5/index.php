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
        <h1 style="margin-bottom:20px;">THÔNG TIN CÁC SẢN PHẨM</h1>
        <?php
        include "connection.php";
        $query = "SELECT sua.Hinh,sua.Ten_Sua, hs.Ten_Hang_Sua, ls.Ten_loai, sua.Trong_luong, sua.Don_gia FROM `sua` sua, `hang_sua` hs , `loai_sua` ls WHERE sua.Ma_Hang_Sua LIKE hs.Ma_Hang_Sua AND sua.Ma_Loai_Sua LIKE ls.Ma_Loai_Sua;";

        $result = mysqli_query($conn, $query);
        ?>
        <div class="row">
            <?php
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <div class="d-flex" style="margin-bottom:20px;">
                    <img src="<?php echo $row["Hinh"]; ?>" class="" alt="..." onerror="this.src='error.jpg'" width="150" height="150">
                    <div class="card-body" style="background-color: #fff; padding: 10px; box-shadow: rgba(255, 255, 255, 0.1) 0px 1px 1px 0px inset, rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;">
                        <h5 class="card-title mt-4"><?php echo $row["Ten_Sua"]; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">Nhà Sản xuất:
                            <?php
                            echo $row["Ten_Hang_Sua"];
                            ?></h6>
                        <p class="card-text">
                            <?php
                            echo $row["Ten_loai"] . " - " . $row["Trong_luong"] . " - " . $row["Don_gia"];
                            ?>
                        </p>
                    </div>
                </div>
            <?php
            };
            ?>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>