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
        $query = "SELECT `Ma_Sua`,`Ten_Sua`,`Trong_luong`,`Don_gia`,`Hinh` FROM `sua`;";

        $result = mysqli_query($conn, $query);
        ?>

        <div class="content">
            <div class="box__container" style="display: flex; flex-wrap: wrap; width: 1000px;">
                <?php
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <div class="border border-dark p-0"  style="width: 200px;">
                        <div class="box__container">
                            <div class="box__title text-center" style="height: 11vh;">
                                <a href="./result.php?lienket=<?php echo $row["Ma_Sua"]?>">
                                    <?php echo $row["Ten_Sua"];?>
                                </a>
                                <p><?php echo $row["Trong_luong"]."gr - ".$row["Don_gia"]." VND";?></p>
                            </div>
                            <img src="<?php echo $row["Hinh"];?>" 
                                alt="sua" height="200" onerror="this.src='error.jpg'" style="width: 100%;">
                        </div>
                    </div>
                <?php
                };
                ?>
            </div>
        </div>
    </div>
    
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>