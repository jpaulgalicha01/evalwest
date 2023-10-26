<?php
include 'config/security.php';
include 'config/controller.php';
include 'include/header.php';



$check_link = new  check_link();
$check_link->check();

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
                        <input type="hidden" name="function" value="password_reset">
                        <input type="hidden" name="user_id" value="<?=$_GET['id']?>">
                        <input type="password" name="newpass" id="newpass" onkeyup="cpass()" class="form-control content" placeholder="New Password" style="background-color:#cccccc" required><br>
                    </div><br>

                    <div class="d-flex" >
                        <div class="border d-flex align-items-center rounded" style="background-color:#cccccc">
                        <i class="p-1 fa-solid fa-lock fa-2xl" style="color: #000000;"></i>
                        </div>&nbsp;
                        <input type="password" name="confirmpass" id="confirmpass" onkeyup="cpass()" class="form-control content" placeholder="Confirm Password" style="background-color:#cccccc" required>
                    </div>
                    
                    <div class="py-2" id="message"></div>
                    <div class="d-flex justify-content-end py-2">
                        <div class="px-1">
                            <input type="checkbox" id="showpass">
                        </div>
                        <label for="showpass" class="text-white">Show Password</label>
                    </div>
                    <button class="btn form-control content text-white" style="background-color:#0b46a0" name="password_reset" id="reset_pass" type="submit">Change Password</button>
                </form>
                
                <div class="py-3">
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
            document.getElementById('newpass').setAttribute('type','text')
            document.getElementById('confirmpass').setAttribute('type','text')
        }
        else{
            // alert("ubcheck");
            document.getElementById('newpass').setAttribute('type','password')
            document.getElementById('confirmpass').setAttribute('type','password')
        }
    }
    document.getElementById('showpass').addEventListener('click' , showpass);

    function cpass(){
            if( document.getElementById("newpass").value =="" || document.getElementById("confirmpass").value ==""){
                    document.getElementById("message").removeAttribute('style','');
                    document.getElementById('reset_pass').disabled = true;
                    document.getElementById('message').innerHTML="";
            }
            else if(document.getElementById("confirmpass").value != document.getElementById("newpass").value ){
                document.getElementById("message").setAttribute('style','color:#ff2d2d');
                document.getElementById('reset_pass').disabled = true;
                document.getElementById('message').innerHTML="Password are NOT MATCHED";
            }           else if(document.getElementById("newpass").value != document.getElementById("confirmpass").value ){
                document.getElementById("message").setAttribute('style','color:#ff2d2d');
                document.getElementById('reset_pass').disabled = true;
                document.getElementById('message').innerHTML="Password are NOT MATCHED";
            }else{
                document.getElementById("message").setAttribute('style','color:#05ff3b');
                document.getElementById('reset_pass').disabled = false;
                document.getElementById('message').innerHTML="Password are MATCHED";
            }        
    }
</script>
