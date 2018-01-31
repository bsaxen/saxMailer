<?php
//===========================
// Author: Benny Saxen
// Date: 2018-01-31
// Before usage: Install PHPMailer
//===========================
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$addr    = $_GET["addr"];  // receiver mail address
$subject = $_GET["sub"];   // title
$message = $_GET["msg"];   // body meassage
//$alias   = $_GET["alias"]; // alias of the sender
$alias = 'saxMailer';

//======== Configuration ===========
$sender = 'xxx@gmail.com';
$passwd = 'xxx';
//==================================

$mail             = new PHPMailer();

$mail->IsSMTP(); // telling the class to use SMTP
$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "tls";                 
$mail->Host       = "smtp.gmail.com";      // SMTP server
$mail->Port       =  587;                   // SMTP port
$mail->Username   = $sender;  // username
$mail->Password   = $passwd;            // password

//$mail->SetFrom('sender.name@gmail.com', 'IOANT');
$mail->SetFrom($sender, $alias);
$mail->Subject = $subject;
$mail->MsgHTML($message);

$address = $addr;
$mail->AddAddress($address, "whatever");

if(!$mail->Send()) 
{
  echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
  echo "Message sent!";
}
?>
