<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
</head>

<body>
    <?php
    include "navbar.php";
    ?>
    <div class="box__center">

        <?php

        if (isset($_GET['lienket'])) {
            $lienket = $_GET['lienket'];
            switch ($lienket) {
                case 'trangchu':
                    echo " <h1>Chào mừng các bạn đến với website của chúng tôi.</h1>";
                    break;
                case 'gioithieu':
                    include './welcome.php';
                    break;
                case 'tintuc':
                    include './info.php';
                    break;
                case 'lienhe':
                    include './contact.php';
                    break;
                case 'diendan':
                    include './group.php';
                    break;
                default:
                    echo " <h1>Chào mừng các bạn đến với website của chúng tôi.</h1>";
                    break;
            }
        }
        ?>
    </div>
</body>

</html>