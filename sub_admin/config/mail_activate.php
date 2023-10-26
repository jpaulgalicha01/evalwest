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
                      <p class="pb-2"><b>Good day, taga west!</b><p>
                      <p class="pb-2">The faculty evaluation for Academic Year '.$fetch['acad_year'].' - '.$fetch['acad_sem'].' has started. We would be very happy to see you participate! Click on this link https://evalwest.000webhostapp.com/ </p><br>

                      <p><b><i>Note for Students and Faculty:
                          <br> In order to access the system, enter ONLY your school-id and login.
                          </i></b></p>
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
                    <p class="pb-2"><b>Good day, taga west!</b><p>
                    <p class="pb-2">The faculty evaluation for Academic Year '.$fetch['acad_year'].' - '.$fetch['acad_sem'].' has started. We would be very happy to see you participate! Click on this link https://evalwest.000webhostapp.com/ </p><br>

                    <p><b><i>Note for Students and Faculty:
                        <br> In order to access the system, enter ONLY your school-id and login.
                        </i></b></p>
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