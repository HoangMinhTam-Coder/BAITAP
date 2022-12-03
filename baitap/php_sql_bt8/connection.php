<html>
<head>
    <title> Connection </title>
</head>
<body>
    <?php
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ql_ban_sua";

        $conn = new mysqli($hostname, $username, $password, $dbname);
        mysqli_set_charset($conn, 'UTF8');
    ?>
</body>

</html>