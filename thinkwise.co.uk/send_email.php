<?php
// Collect form data
$name = $_POST["fullName"];
$email = $_POST["email"];
$message = $_POST["message"];
$subject = $_POST["subject"];

// Recipient
$to = $_POST["contact@thinkwiseservices.co.uk"];

// Compose email
$body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

// Send email (using PHP's mail function)
if (mail($to, $subject, $body)) {
    echo "Email sent successfully!"; // Success message back to the user
} else {
    echo "Error sending email.";  // Error message
}
?>

