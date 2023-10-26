<?php
session_start();
include 'include/header.php';

if(empty($_SESSION['email'] && $_SESSION['type_user'])){
    header("Location: index.php");
}


?>

<div class="container-fluid" style="height: 100%;">
    <div class="row" style="height: 100%;">
        
    <div class="col-xl-4 col-lg-4 col-md-3 col-1"></div>
    
    <div class="col-xl-4 col-lg-4 col-md-6 col-10 text-center d-flex align-items-center">
        <div class="row">
        <a href="index.php">
            <img src="img/icon.png" width="20%">
        </a>
        
        <div class="py-5">
                <h1 class="title"><font color="e8e5e5">EVAL-WEST SYS.</font></h1>

                <form action="inputConfig.php" method="POST">
                    <?php
                        if(isset($_SESSION['email'])){
                            echo"<p class='content text-white py-3'>Successfully Sent OTP Code (".$_SESSION['email'].")</p>";
                        }
                    ?>
                    

                    <div class="d-flex" >
                        <div class="border d-flex align-items-center rounded" style="background-color:#cccccc">
                        </i><i class="p-1 fa-solid fa-user fa-2xl" style="color: #000000;"></i>
                        </div>&nbsp;
                        <input type="hidden" name="user_type" value="<?=$_SESSION['type_user']?>">
                        <input type="hidden" name="user_type1" value="<?=$_SESSION['type_user']?>">
                        <input type="hidden" name="function" value="otp_submit">
                        <input type="hidden" name="uname_id" value="<?=$_SESSION['user_id'];?>">
                        <input type="text" name="otp_code" class="form-control content" placeholder="OTP Code..." style="background-color:#cccccc"><br>
                    </div><br>
                        <?php
                            if(isset($_SESSION['message'])){
                                echo "<p class='text-danger'>".$_SESSION['message']."</p>";
                                unset($_SESSION['message']);
                            }
                        ?>
                    <button type="submit" name="otp_submit" class="btn form-control text-white content" style="background-color:#0b46a0" >LOGIN</button>
                </form>

                <div class="py-3">
                <a href="admin.php">
                    <h5 class="content"><font><u>Back to Login!</u></font></h5>
                </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-4 col-md-3 col-1"></div>


<?php
include 'include/footer.php';
?>

