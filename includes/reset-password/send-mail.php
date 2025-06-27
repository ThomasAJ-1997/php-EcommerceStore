<?php

$email = $_POST['email'];

require '../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use Dotenv\Dotenv;

$mail = new PHPMailer(true);

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

//$mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = $_ENV['SMTP_HOST'];
$mail->SMTPSecure = $_ENV['SMTP_TYPE'];
$mail->Port = $_ENV['SMTP_PORT'];
$mail->Username = $_ENV['SMTP_USER'];
$mail->Password = $_ENV['SMTP_PASS'];

$mail->isHTML(true);

return $mail;

?>




