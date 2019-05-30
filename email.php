<?php
$from = $_POST['from'];
$to = $_POST['to'];
$subject = $_POST['subject'];
$body = $_POST['body'];

if(empty($from) || empty($to) || empty($subject) || empty($body)) {
  echo 'ERROR: empty parameter';
}
else {
  $fromName = $_POST['fromName'];

  if(!empty($fromName)) {
    $from = $fromName . '<' . $from . '>';
  }

  $headers[] = 'MIME-Version: 1.0';
  $headers[] = 'Content-type: text/html; charset=utf-8';

  $headers[] = 'To: ' . $to;
  $headers[] = 'From: ' . $from;

  if(mail($to, $subject, $body, implode("\r\n", $headers))) {
    echo 'OK';
  }
  else {
    echo 'ERROR';
  }
}
