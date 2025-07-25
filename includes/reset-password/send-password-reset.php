<?php

require '../../classes/Connect.php';

$email = $_POST['email'];


if (!filter_var($email, FILTER_VALIDATE_EMAIL) || empty($email)) {
    echo "Warning: Unknown error occurred. Insert a valid email address";
    sleep(1);
    header('Location: http://localhost:8888/sonsEcommerce/forgot.php');
    exit;
}

$token = bin2hex(random_bytes(16));

$token_hash = hash("sha256", $token);

$token_expiry = date("Y-m-d H:i:s", time() + 60 * 30);


$db = new Connect();
$conn = $db->connect();

$sql = "UPDATE users 
SET reset_token_hash = :token_hash,
    reset_token_expires_at = :token_expiry
    WHERE email = :email";

$stmt = $conn->prepare($sql);

$stmt->bindParam(':token_hash',$token_hash, PDO::PARAM_STR);
$stmt->bindParam(':token_expiry',$token_expiry, PDO::PARAM_STR);
$stmt->bindParam(':email',$email, PDO::PARAM_STR);

$stmt->execute();


if ($stmt->rowCount() > 0) {
    $mail = require 'send-mail.php';
    $mail->setFrom('from@example.com', 'Sons - Reset Your Password');
    $mail->addAddress($email);
    $mail->Subject = "Sons Password Reset";
    $mail->Body = <<<END
    <h2>Password Reset Request Email</h2>
    <p>Password token expires in 1 hour and 30 mins</p> 
    Click <a href="http://localhost:8888/sonsEcommerce/reset_password.php?token=$token">To reset your password</a>
     
    END;

    try {
        $mail->send();
    } catch(Exception $e) {
        echo "Message could not be sent, Mailer error: {$mail->errorInfo}";
    }

}

echo "Message sent. Please check your inbox";