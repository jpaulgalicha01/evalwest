<?php
session_start();
include 'config/security.php';
include 'include/header.php';
unset($_SESSION['email']);
unset($_SESSION['type_user']);


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

                <form role="search" action="inputConfig.php" method="POST">
                    <div class="d-flex" >
                        <div class="border d-flex align-items-center rounded" style="background-color:#cccccc">
                        <i class="p-1 fa-solid fa-user fa-2xl" style="color: #000000;"></i>
                        </div>&nbsp;
                        <input type="hidden" name="function" value="login">
                        <input type="text" name="uname" class="form-control content" placeholder="Username" style="background-color:#cccccc"><br>
                    </div><br>

                    <div class="d-flex" >
                        <div class="border d-flex align-items-center rounded" style="background-color:#cccccc">
                        <i class="p-1 fa-solid fa-lock fa-2xl" style="color: #000000;"></i>
                        </div>&nbsp;
                        <input type="password" name="pass" id="pass" class="form-control content" placeholder="Password" style="background-color:#cccccc">
                           
                    </div>
                    <br>
                    <div class="d-flex justify-content-end py-2">
                        <div class="px-1">
                            <input type="checkbox" id="showpass">
                        </div>
                        <label for="showpass" class="text-white">Show Password</label>
                    </div>
                    <?php
                            if(isset($_SESSION['message'])){
                                echo "<p class='text-danger'>".$_SESSION['message']."</p>";
                                unset($_SESSION['message']);
                            }
                        ?>

                    <button class="btn form-control content text-white" style="background-color:#0b46a0" name="login" type="submit">LOGIN</button>
                </form>
                
                <div class="py-3">
                <a href="forget_pass.php">
                    <h5 class="content"><font><u>Forget Password?</u></font></h5>
                </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-4 col-md-3 col-sm-1"></div>


<?php
include 'include/footer.php';
?>

<script>
    function showpass(){
        if(this.checked){
            // alert("check");
            document.getElementById('pass').setAttribute('type','text')
        }
        else{
            // alert("ubcheck");
            document.getElementById('pass').setAttribute('type','password')
        }
    }
    document.getElementById('showpass').addEventListener('click' , showpass);
</script>
