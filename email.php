<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../mailer/PHPMailer/src/Exception.php';
require '../mailer/PHPMailer/src/PHPMailer.php';
require '../mailer/PHPMailer/src/SMTP.php';

$from = $_POST['from'];
$fromName = $_POST['fromName'];
$to = $_POST['to'];
$subject = $_POST['subject'];
$body = $_POST['body'];

$smtpUsername = "referee@xrom.webd.pro";
$smtpPassword = "SERVER_PASSWORD";
$emailFrom = $smtpUsername;
$emailFromName = 'Karta sędziego';
$emailTo = $to;

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Encoding = 'base64';
$mail->Mailer = "smtp";
$mail->SMTPDebug = 0;
$mail->Host = 'wn16.webd.pl ';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = $smtpUsername;
$mail->Password = $smtpPassword;
$mail->setFrom($emailFrom, $emailFromName);
$mail->addAddress($emailTo);
$mail->Subject = $subject;
$mail->Body = $body;
$mail->AltBody = 'HTML messaging not supported';
$mail->IsHTML(true);
$mail->CharSet = 'UTF-8';

if(!$mail->send()){
    echo "Mailer Error: " . $mail->ErrorInfo;
}else{
    echo "Message sent to " . $emailTo;
}