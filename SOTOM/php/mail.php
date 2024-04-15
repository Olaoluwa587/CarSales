<?php

require 'include/PHPMailer.php';
require 'include/SMTP.php';
require 'include/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = "true";
$mail->SMTPSecure = "tls";
$mail->Port = "587";
$mail->Username = "programmingpage1@gmail.com";
$mail->Password = "GODISGREATEST@1.";
$mail->setFrom("programmingpage1@gmail.com");


?>