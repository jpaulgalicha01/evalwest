<?php
include 'config/controller.php';
function secured($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = str_replace("'", "\'", $data);
    return $data;
}

if(isset($_POST['login'])&& $_POST['function']=='login'){
    $uname = secured($_POST['uname']);
    $pass = md5(secured($_POST['pass']));

    $login = new AdminloggIn();
    $login->loginAcc($uname,$pass);
    
}
else if(isset($_POST['login_user'])&& $_POST['function']=='user_login'){
    $id_num = secured($_POST['id_num']);

    $user_login = new UserloggIn();
    $user_login->loginAcc($id_num);

}   
    else if(isset($_POST['otp_submit'])&& $_POST['function']=='otp_submit'){
    $uname_id = secured($_POST['uname_id']);
    $otp_code = secured($_POST['otp_code']);
    $user_type = secured($_POST['user_type']);
    $user_type1 = secured($_POST['user_type1']);

    $otp_verfiy = new OtpVerify();
    $otp_verfiy->verifyOTP($uname_id,$otp_code,$user_type,$user_type1);
}   
    else if(isset($_POST['reset_pass'])&& $_POST['function']=='reset_pass'){
    $email = secured($_POST['email_address']);

    $reset_pass = new reset_pass();
    $reset_pass->reset($email);
}   
else if(isset($_POST['password_reset'])&& $_POST['function']=='password_reset'){
    $user_id = secured($_POST['user_id']);
    $npass = secured($_POST['newpass']);

    $pass_reset = new password_reset();
    $pass_reset->reset($user_id,$npass);
}

else {
    header("Location: index.php");
}

?>