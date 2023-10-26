<?php
require_once '../PHPMailer/PHPMailerAutoload.php';
date_default_timezone_set('Asia/Manila');

$mail = new PHPMailer();

$mail->IsSMTP();
$mail->CharSet = 'UTF-8';

$mail->Host       = "smtp.gmail.com"; // SMTP server example
$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Port       = 587;                    // set the SMTP port for the GMAIL server
$mail->Username   = "jpaulgalicha01@gmail.com"; 	// SMTP account username example
$mail->Password   = "lvbqyhdapiiwbnxw";        // SMTP account password example


$sending_email = new send_email();
$res_sending = $sending_email->email();

if($res_sending){
    while($fetch = $res_sending->fetch()){
        
        $sending_user = new user_sending();
        $res_sending_user = $sending_user->user();
        
        if($res_sending_user){
            while($fetch_user = $res_sending_user->fetch()){
                if($fetch_user['user_type']=="faculty"){

                      $mail->clearAddresses();
                      $mail->setFrom('jpaulgalicha01@gmail.com','Eval-West Sytem');
                      $mail->addAddress($fetch_user['user_email']);

                       //The subject of the message.
                      $mail->Subject = 'WVSU-HCC Faculty Evaluation';
                      $message = '
                      <p class="pb-2"><b>Thank you for participating, '.$fetch_user['user_name'].'!</b><p><br>
                      <p class="pb-2">We have received your results. See you next semester! 💙💛</p><br>
          
                      <p><b>Enjoying the site? Leave us a feedback: https://docs.google.com/forms/d/1LXkpJf0vAPGx2VU2pbfBIBx3JxlnEvRLErZB3kcVqlQ </b></p>
                      ';
                      $mail->Body = $message;
                      $mail->isHTML(true);
                      $mail->send();

                }
                elseif($fetch_user['user_type']=="Student"){
                    $mail->clearAddresses();
                    $mail->setFrom('jpaulgalicha01@gmail.com','Eval-West Sytem');
                    $mail->addAddress($fetch_user['user_email']);

                    // The subject of the message.
                    $mail->Subject = 'WVSU-HCC Faculty Evaluation';
                    $message = '
                    <p class="pb-2"><b>Thank you for participating, '.$fetch_user['user_name'].'!</b><p><br>
                    <p class="pb-2">We have received your results. See you next semester! 💙💛</p><br>
        
                    <p><b>Enjoying the site? Leave us a feedback: https://docs.google.com/forms/d/1LXkpJf0vAPGx2VU2pbfBIBx3JxlnEvRLErZB3kcVqlQ </b></p>
                    ';
                    $mail->Body = $message;
                    $mail->isHTML(true);
                    $mail->send();
                }
            }
        }
    }
}



?>