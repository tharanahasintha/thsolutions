<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';//can use googl also
        $mail->SMTPAuth = true;
        $mail->Username = 'tharanahasintha@gmail.com'; // Your email
        $mail->Password = 'viheriuxxterjjus'; // App password (not your real password)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom($_POST["email"], $_POST["name"]);
        $mail->addAddress("tharanahasintha@gmail.com");

        $mail->Subject = $_POST["subject"];
        $message = isset($_POST["message"]) ? $_POST["message"] : "No message provided";

        $mail->Body = "Name: {$_POST["name"]}\nEmail: {$_POST["email"]}\n\n{$_POST["message"]}";

        $mail->send();
        echo "Message sent successfully!";
    } catch (Exception $e) {
        echo "Error: {$mail->ErrorInfo}";
    }
}
?>

