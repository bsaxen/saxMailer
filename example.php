<?php
//===========================
// Install PHPMailer
//===========================
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail             = new PHPMailer();

$mail->IsSMTP(); // telling the class to use SMTP
$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "tls";                 
$mail->Host       = "smtp.gmail.com";      // SMTP server
$mail->Port       =  587;                   // SMTP port
$mail->Username   = "sender.name@gmail.com";  // username
$mail->Password   = "user password";            // password

$mail->SetFrom('sender.name@gmail.com', 'IOANT');

$mail->Subject    = "Heater changed 20 CW";

$mail->MsgHTML('Incresed heater with 20 steps CW');

$address = "receiver.name@gmail.com";
$mail->AddAddress($address, "Pannan reglerad");

if(!$mail->Send()) 
{
  echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
  echo "Message sent!";
}
?>
