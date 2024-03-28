<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include("../../db/connection.php");
require '../../phpmailer/src/Exception.php';
require '../../phpmailer/src/PHPMailer.php';
require '../../phpmailer/src/SMTP.php';

$id = $_POST['orderid'];
$status = $_POST['status'];

$sql = "UPDATE orders SET status='$status'where id='$id'";

if ($conn->query($sql) === TRUE) {
  
$mail = new PHPMailer;
$mail->isSMTP(); 
$mail->SMTPDebug = 2; 
$mail->Host = "smtp-mail.outlook.com"; 
$mail->Port = "587";
$mail->SMTPSecure = 'tls'; 
$mail->SMTPAuth = true;
$mail->Username = "example@email.com";
$mail->Password = "Your_Password";
$mail->setFrom("Your_email", "test");
$mail->addAddress("Your_email", "tameshwar");
$mail->Subject = 'delivery';
$mail->msgHTML("your product will be delivered"); 
$mail->AltBody = 'HTML not supported';

if (!$mail->send()) {
  echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
  echo 'The email message was sent.';
}

} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
