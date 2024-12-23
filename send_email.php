<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "zh168159@gmail.com";
    $subject = "New Form Submission";
    $message = "Name: " . $_POST['name'] . "\nEmail: " . $_POST['email'] . "\nMessage: " . $_POST['message'];
    $headers = "From: no-reply@yourdomain.com";
    
    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully!";
    } else {
        echo "Failed to send email.";
    }
}
?>
