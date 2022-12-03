<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="show.css"> -->
    <title>Document</title>
</head>

<body>
    <div class="box__center">
        <h1 style="margin-bottom:20px;">THÔNG TIN HÃNG SỮA</h1>
        </h1>
        <?php
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ql_ban_sua";

        $con = new mysqli($hostname, $username, $password, $dbname);

        if (!$con) {
            echo "<h1>KÊT NỐI</h1>";
        }

        $query = 'SELECT * FROM hang_sua';
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) != 0) {
            echo "<table border='1' >";
            echo "<tr>
                                <td>Mã Hãng Sữa</td>
                                <td>Tên Hãng Sữa</td>
                                <td>Địa Chỉ</td>
                                <td>Điện Thoại</td>
                                <td>Email</td>
                          </tr>";

            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                for ($i = 0; $i < mysqli_num_fields($result); $i++) {
                    echo "<td>";
                    echo $row[$i];
                    echo "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }

        mysqli_free_result($result);
        mysqli_close($con);
        ?>
    </div>
</body>

</html>