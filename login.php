<?php
session_start();
include "connection.php";
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Đăng Nhập</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="login.css">
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- <script src="js/vendor/modernizr-2.8.3.min.js"></script> -->
</head>

<body>

	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <form action="" name="form1" method="post">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/1/13/Logo_PTIT_University.png" alt="PTIT logo" class="login-image">
                            <div class="text-center m-b-md custom-login">
                                <h2 style="text-align: center; font-weight: 600">ĐĂNG NHẬP</h3>
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Tên đăng nhập" required="" value="" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="Mật khẩu" required="" value="" name="password" id="password" class="form-control">

                            </div>

                            <button type="submit" name="login" class="btn btn-success btn-block loginbtn">Đăng Nhập</button>
                            <a class="btn btn-default btn-block" href="register.php">Đăng Ký</a>
                            <a class="btn btn-default btn-block" href="/online-quiz/admin/">Đăng Nhập Với Quyền Admin</a>
                            <div class="alert alert-danger" id="failure" style="margin-top: 10px; display: none">
                                <span style="text-align: center; color: red">Không đúng Tài Khoản hoặc Mật Khẩu</span>
                            </div>
                        </form>
                    </div>
                </div>
			</div>

		</div>   
    </div>

    <?php
    if(isset($_POST["login"]))
    {
        $count = 0;
        $res = mysqli_query($link, "select * from registration where username='$_POST[username]' && password='$_POST[password]'");
        $count = mysqli_num_rows($res);
        if($count == 0)
        {
            ?>
            <script type="text/javascript">
                document.getElementById("failure").style.display = "block";
            </script>
            <?php
        }
        else
        {
            $_SESSION["username"] = $_POST["username"];
            ?>
            <script type="text/javascript">
                window.location = "select_exam.php";
            </script>
            <?php
        }
    }
    ?>
        
    </script>

</body>

</html>