<?php

require 'PHPMailer/PHPMailerAutoload.php';

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



$mail->setFrom('jpaulgalicha01@gmail.com','Eval-West Sytem');
$mail->addAddress($fetch['acc_email']);

// The subject of the message.
$mail->Subject = 'WVSU-HCC Faculty Evaluation';

$message = "Verification for reset password (http://localhost/evalwestsys/reset_pass.php?id=".$fetch['acc_id_rand'].")";

$mail->Body = $message;

$mail->isHTML(true);

if ($mail->send()) {
    $success = true;
} else {
    return false;
}

?>