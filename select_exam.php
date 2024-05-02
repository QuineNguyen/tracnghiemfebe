<?php
session_start();
if(!isset($_SESSION["username"])){
    ?>
    <script type="text/javascript">
        window.location = "login.php";
    </script>
    <?php
}
?>
<?php
include "connection.php";
include "header.php";
?>


    <div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">

        <div style="min-height: 500px; background-color: white;">
            <div style="height: 50px;"></div>
            <center>
                <h2>Tất cả kỳ thi</h2>
            </center>
            <?php
            $res = mysqli_query($link,"select * from exam_category");
            while($row = mysqli_fetch_array($res)){
                ?>
                <input type="button" class="btn btn-success form-control" value="<?php echo $row["category"]; ?>" style="margin: 20px auto; background-color: red; color: white; width: 200px;" onclick="set_exam_type_session(this.value);">
                <?php
            }
            ?>
        </div>

    </div>


<?php
include "footer.php";
?>

<script type="text/javascript">
    function set_exam_type_session(exam_category)
    {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if(xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                window.location = "dashboard.php";
            }
        };
        xmlhttp.open("GET", "forajax/set_exam_type_session.php?exam_category=" + exam_category, true);
        xmlhttp.send(null);
    }
</script>