<?php
session_start();
include "header.php";
include "connection.php";
if(!isset($_SESSION["username"]))
{
    ?>
    <script type="text/javascript">
        window.location="login.php";
    </script>
    <?php
}
?>


    <div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">

        <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
            <div style="height: 50px;"></div>
            <center>
                <h1>Kết Quả Thi Gần Đây</h1>
            </center>
            <?php
            $res=mysqli_query($link,"select * from exam_results where username='$_SESSION[username]' order by id desc");
            $count=mysqli_num_rows($res);
            if($count==0){
                ?>
                <center>
                    <h3>Không tìm thấy kết quả</h3>
                </center>
                <?php
            }
            else 
            {
                echo "<table class='table table-bordered' style='margin: auto'>";
                echo "<tr style='background-color: #f12d2d; color: white;'>";
                echo "<th style='text-align: center;'>"; echo "Tên đăng nhập"; echo "</th>";
                echo "<th style='text-align: center;'>"; echo "Số câu hỏi"; echo "</th>";
                echo "<th style='text-align: center;'>"; echo "Trả lời đúng"; echo "</th>";
                echo "<th style='text-align: center;'>"; echo "Trả lời sai"; echo "</th>";
                echo "<th style='text-align: center;'>"; echo "Thời điểm thi"; echo "</th>";
                echo "</tr>";
                while($row=mysqli_fetch_array($res))
                {
                    echo "<tr>";
                    echo "<th style='text-align: center;'>"; echo $row["username"]; echo "</th>";
                    echo "<th style='text-align: center;'>"; echo $row["total_question"]; echo "</th>";
                    echo "<th style='text-align: center;'>"; echo $row["correct_answer"]; echo "</th>";
                    echo "<th style='text-align: center;'>"; echo $row["wrong_answer"]; echo "</th>";
                    echo "<th style='text-align: center;'>"; echo $row["exam_time"]; echo "</th>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            ?>
        </div>

    </div>


<?php
include "footer.php";
?>