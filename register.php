<?php
include "connection.php";
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>Đăng Ký</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <link rel="stylesheet" href="register.css">
</head>

<body>
    <div class="panel-body">
        <form action="" name="form1" method="post">
        <img src="https://upload.wikimedia.org/wikipedia/commons/1/13/Logo_PTIT_University.png" alt="PTIT logo" class="login-image">
            <h2 style="text-align: center; font-size: 600">ĐĂNG KÝ</h2>
            <div class="row">
                <div class="form-group">
                    <input type="text" name="firstname" class="form-control" placeholder="Họ">
                </div>
                <div class="form-group">
                    <input type="text" name="lastname" class="form-control" placeholder="Tên">
                </div>
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Tên đăng nhập">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
                </div>
                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="text" name="contact" class="form-control" placeholder="SĐT liên lạc">
                </div>
                </div>
            <div class="text-center">
                <button type="submit" name="submit1" class="btn btn-success loginbtn">Đăng Ký</button>
            </div>
            <a class="btn btn-default btn-block" href="login.php">Trở về Trang Đăng Nhập</a>
            <div class="alert alert-danger" id="failure" style="margin-top: 10px; display: none; color: red">
                Tên đăng nhập đã tồn tại.
            </div>
        </form>
    </div>

    <?php
    if (isset($_POST["submit1"])) {
        $count = 0;
        $res = mysqli_query($link, "select * from registration where username='$_POST[username]'") or die(mysqli_error($link));
        $count = mysqli_num_rows($res);
        if($count>0)
        {
            ?>
            <script type="text/javascript">
                document.getElementById("failure").style.display = "block";
                document.getElementById("success").style.display = "none";
            </script>
            <?php
        }
        else
        {
            ?>
            <script type="text/javascript">
                document.getElementById("failure").style.display = "none";
                document.getElementById("success").style.display = "block";
            </script>
            <?php
            mysqli_query($link,"insert into registration values(NULL, '$_POST[firstname]', '$_POST[lastname]', '$_POST[username]', '$_POST[password]', '$_POST[email]', '$_POST[contact]')");
        }
    }
    ?>

</body>

</html>