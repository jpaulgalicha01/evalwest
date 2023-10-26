<?php
session_start();
include 'config/security.php';
include 'include/header.php';
?>

<div class="container-fluid" style="height: 100%;">
    <div class="row" style="height: 100%;">
        
    <div class="col-xl-4 col-lg-4 col-md-3 col-sm-1"></div>
    
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-10 text-center py-5 d-flex align-items-center">
        <div class="row">
        <a href="index.php">
            <img src="img/icon.png" width="20%">
        </a>
        
        <div class="py-5">
                <h1 class="title"><font color="e8e5e5">EVAL-WEST SYS.</font></h1><br><br>

                <form action="inputConfig.php" method="POST">
                    <div class="d-flex" >
                        <input type="hidden" name="function" value="reset_pass">
                        <div class="border d-flex align-items-center rounded" style="background-color:#cccccc">
                        <i class="p-1 fa-solid fa-user fa-2xl" style="color: #000000;"></i>
                        </div>&nbsp;
                        <input type="email" class="form-control content" name="email_address" placeholder="Enter Email Address.." style="background-color:#cccccc"><br>
                    </div>
                    <div class="py-1">
                        <?php
                            if(isset($_SESSION['error'])){
                                ?>
                                    <span class="text-white"><?=$_SESSION['error']?></span>
                                <?php
                                unset($_SESSION['error']);
                            }
                        ?>
                        
                    </div>
                    <br>
                    <button class="btn form-control text-white content" name="reset_pass" style="background-color:#0b46a0" type="submit">Reset Password</button>
                </form>

                <div class="py-3">
                <a href="admin.php">
                    <h5 class="content"><font><u>Back to login!</u></font></h5>
                </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-4 col-md-3 col-sm-1"></div>


<?php
include 'include/footer.php';
?>
