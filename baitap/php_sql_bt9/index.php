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
    <?php
    if (isset($_POST['submit'])) {
        if (!empty($_POST['name_milk'])) {
            $name = $_POST['name_milk'];
            require_once "connection.php";

            $query = "SELECT sua.Loi_ich, sua.Hinh, sua.Ten_Sua, hs.Ten_Hang_Sua, 
                sua.Trong_luong, sua.Don_gia, sua.`TP_Dinh_Duong` FROM `sua` sua, `hang_sua` hs 
                WHERE sua.Ma_Hang_Sua LIKE hs.Ma_Hang_Sua AND sua.Ten_Sua LIKE N'%".$name."%';";
            
            $count = "SELECT COUNT(*) AS COUNT FROM `sua` sua, `hang_sua` hs 
            WHERE sua.Ma_Hang_Sua LIKE hs.Ma_Hang_Sua AND sua.Ten_Sua LIKE N'%".$name."%';";

            $result = mysqli_query($conn, $query);

            $result2 = mysqli_query($conn, $count);
            $row2 = mysqli_fetch_array($result2);
            if($row2["COUNT"] > 0) {
                $mess = "Có ".$row2["COUNT"]." sp được tìm thấy";
            } else {
                $mess = "Không có sp đó";
            }
        }
    }


    ?>
    <div class="box__center">
        <h1 style="margin-bottom:20px;margin-top: 20px;">THÔNG TIN CHI TIẾT CÁC LOẠI SỮA</h1>
        <form action="index.php" method="POST">
            <div class="form__container">
                <div class="form__item">
                    <label for="name_milk" class="form__label">TÊN SỮA</label>
                    <input type="text" class="form__input" name="name_milk" value="<?php if (isset($name)) echo $name; ?>">
                    <button type="submit" class="form__submit" name="submit">Tìm Kiếm</button>
                </div>
                <h6 class="form__result text-center"><?php if (isset($mess)) echo $mess; ?></h6>
            </div>
        </form>
        <?php
        if (isset($_POST['submit'])) {
            while ($row = mysqli_fetch_array($result)) {
        ?>
            <div class="form__container">
                <div class="form__title">
                    <?php echo $row["Ten_Sua"] . " - " . $row["Ten_Hang_Sua"]; ?>
                </div>
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
                            <div class="text-start"><?php echo "<strong>Trọng lượng:</strong> " . $row["Trong_luong"] . " gr - <strong>Đơn giá:</strong> " . $row["Don_gia"] . " VND" ?></div>
                        </div>
                    </div>

                </div>
            </div>
        <?php
            };
        }
        ?>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>