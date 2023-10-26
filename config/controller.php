<?php
include 'db_conn.php';
session_start();

class AdminloggIn extends DataBase {
    private $uname;
    private $pass;
    public function loginAcc($uname,$pass){
        $stmt = "SELECT * FROM tbl_accounts WHERE acc_uname='$uname' AND acc_pass='$pass' ";
        $stmt_run = $this->connect()->query($stmt);
        $stmt_run->execute();
        if($stmt_run->rowCount()){
            while($row = $stmt_run->fetch()){
                $rand_otp = rand(11111,99999);
                if($row['acc_type']=='admin'){
                    $this->connect()->query("UPDATE tbl_accounts SET acc_otp='$rand_otp' WHERE acc_uname='$uname' ");
                    $_SESSION['type_user'] = $row['acc_type'];
                    $_SESSION['type_user1'] = 'admin';
                    $_SESSION["email"]=$row['acc_email'];
                    $_SESSION['user_id'] = $row['acc_uname'];
                    require 'mail.php';
                    header("Location: otp.php");
                }

                if($row['acc_type']!=='admin'){
                    $this->connect()->query("UPDATE tbl_accounts SET acc_otp='$rand_otp' WHERE acc_uname='$uname' ");
                    $_SESSION['type_user'] = $row['acc_type'];
                    $_SESSION['type_user1'] = 'sub_admin';
                    $_SESSION["email"]=$row['acc_email'];
                    $_SESSION['user_id'] = $row['acc_uname'];
                    require 'mail.php';
                    header("Location: otp.php");
                }
            }
        } else {
            $_SESSION['message'] = "Username/Password not valid";
            header("Location: admin.php");
        }
    }
}
class UserloggIn extends DataBase{
    private $id_num;

    public function loginAcc($id_num){
        $stmt = "SELECT * FROM tbl_users WHERE user_id_num ='$id_num' ";
        $stmt_run = $this->connect()->query($stmt);
        $stmt_run->execute();
        if($stmt_run->rowCount()){
            while($row = $stmt_run->fetch()){
                $rand_otp = rand(11111,99999);
                if($row['user_type']=='student'){
                    $this->connect()->query("UPDATE tbl_users SET user_otp='$rand_otp' WHERE user_id_num ='$id_num' ");
                    $_SESSION['type_user'] = 'student';
                    $_SESSION['email']=$row['user_email'];
                    $_SESSION['user_id']=$row['user_id_num'];
                    require 'mail.php';
                    header("Location: otp.php");
                }
                if($row['user_type']!="student"){
                    $this->connect()->query("UPDATE tbl_users SET user_otp='$rand_otp' WHERE user_id_num ='$id_num' ");
                    $_SESSION['type_user'] = 'faculty';
                    $_SESSION['email']=$row['user_email'];
                    $_SESSION['user_id']=$row['user_id_num'];
                    require 'mail.php';
                    header("Location: otp.php");
                } 
            }
        } else {
            $_SESSION['message'] = "ID Number not valid"; 
            header("Location: index.php");
         }
    }
}
class OtpVerify extends DataBase{
    private $uname_id;
    private $otp_code;
    private $user_type;
    private $user_type1;

    public function verifyOTP($uname_id,$otp_code,$user_type,$user_type1){
        $stmt = "SELECT * FROM tbl_accounts WHERE acc_uname='$uname_id' ";
        $stmt_run = $this->connect()->query($stmt);
        $stmt_run->execute();

        if($stmt_run->rowCount()==1){
            while($fetch = $stmt_run->fetch()){
                if ($fetch['acc_otp']==$otp_code)
                {
                    if($user_type1 === 'admin')
                    {
                        $_SESSION['user_type1'] = $user_type1;
                        $_SESSION['user_type'] = $user_type;
                        $_SESSION['name_user'] = $fetch['acc_name'];
                        $_SESSION['eemail'] = $fetch['acc_name'];
                        $_SESSION['user_id'] = $fetch['acc_id'];
                        $_SESSION['user_img'] = $fetch['acc_img'];
                        $_SESSION['user_uname'] = $fetch['acc_uname']
                        ?>
                        <script>
                            window.alert("Successfully Login");
                            window.location.href = "admin_user/index.php";
                        </script>
                        <?php
                    } 
                    else 
                    {
                        $dep = $this->connect()->query("SELECT * FROM tbl_dep_yr_sec WHERE dep_yr_sec_course='$user_type' ");
                        $dep->execute();
                            if($dep->rowCount()==1){
                                while($depFetch = $dep->fetch()){
                                    $_SESSION['user_dep'] = $depFetch['dep_yr_sec_department'];
                                    $_SESSION['user_type'] = $user_type;
                                    $_SESSION['user_type1'] = $user_type1;
                                    $_SESSION['name_user'] = $fetch['acc_name'];
                                    $_SESSION['user_id'] = $fetch['acc_id'];
                                    $_SESSION['user_img'] = $fetch['acc_img'];
                                    $_SESSION['user_uname'] = $fetch['acc_uname']
                                    ?>
                                    <script>
                                        window.alert("Successfully Login");
                                        window.location.href = "sub_admin/index.php";
                                    </script>
                                    <?php

                                }
                            }

                    }
                 } 
                 else
                 {
                    $_SESSION['message'] = "OTP Code not valid"; 
                    header("Location: otp.php");
                }

            } 

        } 

        else 
        {
            $stmt_user = "SELECT * FROM tbl_users WHERE user_id_num='$uname_id' ";
            $stmt_user_run = $this->connect()->query($stmt_user);
            $stmt_user_run->execute();

            if($stmt_user_run->rowCount()){
                while($fetch_user = $stmt_user_run->fetch()){
                    if ($fetch_user['user_otp']==$otp_code){

                        if($fetch_user['user_type'] ==='Student'){
                            
                            // Checking if Evaluation Start

                            $check_status = "SELECT * FROM tbl_acad_yr WHERE acad_dep ='".$fetch_user['user_course']."' AND acad_SysDef='YES' ";
                            $check_status_run = $this->connect()->query($check_status);
                            $check_status_run->execute();

                            if($check_status_run->rowCount()){
                                while($fetch_check = $check_status_run->fetch()){
                                    if($fetch_check['acad_status']=='Not Active'){

                                        ?>
                                        <script>
                                            window.alert("Evalaution Not Started Yet");
                                            window.location.href = "index.php";
                                        </script>
                                        <?php
                                    }
                                    elseif($fetch_check['acad_status']=='Done'){

                                        ?>
                                        <script>
                                            window.alert("Evalaution is already done.");
                                            window.location.href = "index.php";
                                        </script>
                                        <?php
                                    }
                                    elseif($fetch_check['acad_status']=='Activate') {

                                            
                                            $_SESSION['user_id'] = $fetch_user['user_id'];
                                            $_SESSION['user_course'] = $fetch_user['user_course'];
                                            $_SESSION['user_name'] = $fetch_user['user_name'];
                                            $_SESSION['user_type'] = $fetch_user['user_type'];
                                            $_SESSION['user_img'] = $fetch_user['user_img'];

                                            ?>
                                                <script>
                                                    window.alert("Successfully Login");
                                                    window.location.href = "user/students/index.php";
                                                </script>
                                            <?php
                                    }
                                }
                            } else {
                                ?>
                                    <script>
                                        window.alert("Please Wait for the Evaluation");
                                        window.location.href = "index.php";
                                    </script>
                                <?php                                
                            }

                        }else {

                            // Checking if Evaluation Start

                            $check_status = "SELECT * FROM tbl_acad_yr WHERE acad_dep ='".$fetch_user['user_course']."' AND acad_SysDef='YES' ";
                            $check_status_run = $this->connect()->query($check_status);
                            $check_status_run->execute();

                            if($check_status_run->rowCount()){
                                while($fetch_check = $check_status_run->fetch()){
                                    if($fetch_check['acad_status']=='Not Active'){

                                        ?>
                                        <script>
                                            window.alert("Evalaution Not Started Yet");
                                            window.location.href = "index.php";
                                        </script>
                                        <?php
                                    }
                                    elseif($fetch_check['acad_status']=='Done'){

                                        ?>
                                        <script>
                                            window.alert("Evalaution is already done.");
                                            window.location.href = "index.php";
                                        </script>
                                        <?php
                                    }
                                    else {

                                        $_SESSION['user_id'] = $fetch_user['user_id'];
                                        $_SESSION['user_dep'] = $fetch_user['user_department'];
                                        $_SESSION['user_course'] = $fetch_user['user_course'];
                                        $_SESSION['user_name'] = $fetch_user['user_name'];
                                        $_SESSION['user_position'] = $fetch_user['user_position'];
                                        $_SESSION['user_type'] = $fetch_user['user_type'];
                                        $_SESSION['user_img'] = $fetch_user['user_img'];
                                        ?>
                                        <script>
                                            window.alert("Successfully Login");
                                            window.location.href = "user/faculty/index.php";
                                        </script>
                                    <?php
                                    }
                                }
                            } else {
                                ?>
                                    <script>
                                        window.alert("Please Wait for the Evaluation");
                                        window.location.href = "index.php";
                                    </script>
                                <?php                                
                            }
                            
                        }

                    } else {
                        $_SESSION['message'] = "OTP Code not valid"; 
                        header("Location: otp.php");
                    }
                   
                }
            }
        }      
        
    }
}

class reset_pass extends DataBase{
    private $email;
    public function reset($email){
        $stmt = "SELECT * FROM tbl_accounts WHERE acc_email='$email' ";
        $stmt_run = $this->connect()->query($stmt);

        if($stmt_run->rowCount()){
            $fetch = $stmt_run->fetch();
            $success="";
            include 'reset_pass.php';


            if($success)
            {
                ?>
                    <script>
                        window.alert("Please Check on your email to reset password");
                        window.location.href="admin.php";
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        window.alert("There's Something Wrong to send email");
                        window.location.href="forget_pass.php";
                    </script>
                <?php
            }

        }
        else {
            $_SESSION['error'] = "Email Address not found";
            header("Location: forget_pass.php");
        }
    }
}

class check_link extends DataBase{
    public function check(){
        if(isset($_GET['id'])){
            $stmt = "SELECT * FROM tbl_accounts WHERE acc_id_rand=".$_GET['id']." ";
            $stmt_run = $this->connect()->query($stmt);

            if($stmt_run->rowCount()){
                return $stmt_run;
            }
            else {
                header("location: index.php");
            }
        }else {
            header("location: index.php");
        }
    }
}

class password_reset extends DataBase{
    private $user_id,$npass;
    public function reset($user_id,$npass){
        $stmt = "SELECT * FROM tbl_accounts WHERE acc_id_rand='$user_id' ";
        $stmt_run = $this->connect()->query($stmt);

        if($stmt_run->rowCount()==1){
            $update_pass = $this->connect()->query("UPDATE tbl_accounts SET acc_pass='".md5($npass)."' ");
            $update_pass->execute();
            if($update_pass){
                ?>
                    <script>
                        window.alert("Successfully Password Change");
                        window.location.href="admin.php";
                    </script>
                <?php
            }else {
                ?>
                    <script>
                        window.alert("There's Somethind Wrong to change password");
                        window.location.href="admin.php?id=<?=$user_id?>";
                    </script>
                <?php
            }
        }else {
            ?>
                <script>
                    window.alert("Failed to Change Password");
                    window.location.href="admin.php?id=<?=$user_id?>";
                </script>
            <?php
        }
    }
}
?>