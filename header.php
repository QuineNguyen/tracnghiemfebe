<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Hệ Thống Thi Trắc Nghiệm Trực Tuyến</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css1/bootstrap.min.css">
    <link rel="stylesheet" href="css1/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="footer.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row" style="background-color: #f12d2d">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmLqUDgiQMKLWQi3Z6gdoenj9sJP4SEGN0iqly8teVdfERq70y8rzGGXVvIzcbpIYudH8&usqp=CAU" alt="PTIT logo" class="image" style="border-radius: 10px; width: 50px; padding-top: 5px">
                    </div>
                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                        <div class="header-top-menu">
                            <ul class="nav navbar-nav">
                                <li><a href="select_exam.php" class="nav-link">Chọn Bài Thi</a></li>
                                <li><a href="old_exam_results.php" class="nav-link">Kết Quả Gần Đây</a></li>
                                <li><a href="logout.php" class="nav-link">Đăng Xuất</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                        <div class="header-right-info">
                            <ul class="nav navbar-nav header-right-menu">
                                <li class="nav-item">
                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false">
                                        <img src="img/avatar-mini2.jpg" alt="" />
                                        <span class="admin-name"><?php echo $_SESSION["username"] ?></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu start -->

    <!-- Mobile Menu end -->
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="breadcome-list">
                    <div class="row">
                        <ul class="breadcome-menu">
                            <li class="timeRemaining" style="text-align: center; font-size: 20px">Thời gian còn lại: <div id="countdowntimer"></div></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
    setInterval(function() {
        timer();
    }, 1000);
    function timer()
    {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if(xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                if(xmlhttp.responseText=="00:00:01")
                {
                    window.location="result.php";
                }
                document.getElementById("countdowntimer").innerHTML=xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "forajax/load_timer.php", true);
        xmlhttp.send(null);
    }
</script>