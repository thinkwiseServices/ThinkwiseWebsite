<?php

use PHPMailer\PHPMailer;
use PHPMailer\Exception;
echo "testing";
if (isset($_POST["submit"])) {

    if ($_POST["fullName"] == "" || $_POST["email"] == "" || $_POST["message"] == "" || $_POST["subject"] == "") {
        echo "Fill All Fields..";
    } else {
        $name = $_POST["fullName"];
        $email = $_POST["email"];
        $message = $_POST["message"];
        $subject = $_POST["subject"];

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;                      // Enable verbose debug output (set to 2 for more detailed output)
            $mail->isSMTP();                           // Set mailer to use SMTP
            $mail->Host = 'smtp.office365.com';          // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                    // Enable SMTP authentication
            $mail->Username = 'nirav.goyani@thinkwiseservices.co.uk'; // SMTP username
            $mail->Password = 'Inspiron.15';         // SMTP password
            $mail->SMTPSecure = 'tls';                 // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                         // TCP port to connect to

            //Recipients
            $mail->setFrom($email, 'Mailer');
            $mail->addAddress('contact@thinkwiseservices.co.uk', 'Recipient');     // Add a recipient

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $name;
            $mail->AltBody = $message;

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
?>
