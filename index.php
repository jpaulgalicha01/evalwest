<?php
session_start();
include 'config/security.php';
include 'include/header.php';
unset($_SESSION['email']);
unset($_SESSION['type_user']);


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
                <h1 class="title"><font color="e8e5e5">EVAL-WEST SYS.</font></h1><br><br>

                <form action="inputConfig.php" method="POST">
                    
                    <div class="d-flex" >
                        <div class="border d-flex align-items-center rounded" style="background-color:#cccccc">
                        <i class="p-1 fa-regular fa-id-card fa-2xl" style="color: #000000;"></i>
                        </div>&nbsp;
                        <input type="hidden" name="function" value="user_login">
                        <input type="text" name="id_num" class="form-control content" placeholder="School ID./Faculty ID." style="background-color:#cccccc"><br>
                    </div><br>
                        <?php
                            if(isset($_SESSION['message'])){
                                echo "<p class='text-danger'>".$_SESSION['message']."</p>";
                                unset($_SESSION['message']);
                            }
                        ?>
                    <button type="submit" name="login_user" class="btn form-control text-white content" style="background-color:#0b46a0" >LOGIN</button>
                </form>

                <div class="py-3">
                <a href="admin.php">
                    <h5 class="content"><font><u>Admin</u></font></h5>
                </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-4 col-md-3 col-1"></div>


<?php
include 'include/footer.php';
?>

