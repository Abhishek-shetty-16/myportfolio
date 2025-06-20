<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'aabhishekshetty7@gmail.com';  // your Gmail
        $mail->Password   = 'fjxa envh lewv tbts';      // app-specific password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $message = nl2br(htmlspecialchars($_POST['message']));

        $mail->setFrom($email, $name);
        $mail->addAddress('aabhishekshetty7@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = 'Portfolio Contact Message';
        $mail->Body = "
            <strong>Name:</strong> $name<br>
            <strong>Email:</strong> $email<br><br>
            <strong>Message:</strong><br>$message
        ";

        $mail->send();
        echo "✅ Message sent successfully.";
    } catch (Exception $e) {
        echo "❌ Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
