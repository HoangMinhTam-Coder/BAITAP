<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Config</title>
</head>
<style>
    * {
        box-sizing: border-box;
    }
    body {
        display: grid;
        place-content: center;
        place-self: center;
        height: 100vh;
        width: 99vw;
        overflow: hidden;
        background: linear-gradient(135deg, rgba(83, 105, 118, 1) 0%, rgba(41, 46, 73, 1) 100%);
    }

    form {
        background-color: #46A094;
        width: max-content;
        padding: 20px;
        border-radius: 5px;
        box-shadow: rgba(255, 255, 255, 0.1) 0px 1px 1px 0px inset, rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
    }

    .submit {
        display: block;
        margin: 0 auto;
        padding: 2px 10px;
    }
</style>
<body>
<?php
    if(isset($_POST['submit']))
    {
        $fullname=$_POST['fullname'];
        $address=$_POST['address'];
        $phone=$_POST['phone'];
        if(is_numeric($phone)) $sub_phone=substr($phone,0,-3)."xxx";
            else $sub_phone = "Số điện thoại không hợp lệ!";
        if($_POST['gender'] == 'nam') $gender = 'Nam';
            else $gender='Nữ';
        $country=$_POST['country'];
        $note=$_POST['note'];
        echo "Bạn đã nhập thành công, dưới đây là những thông tin bạn đã nhập:<br>";
        echo "Họ tên: $fullname<br>Address: $address<br>Phone: $sub_phone<br>Gender: $gender<br>Country: $country<br>Note: $note"; 
    }
    else header("Location:./form.htm");
?>
<br>
<a class="c" href="javascript:window.history.back(-1);"><i>Quay về</i></a></td>
</form>
</body>
</html>