<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize input fields to prevent XSS
    $fname = htmlspecialchars(trim($_POST['fname']));
    $lname = htmlspecialchars(trim($_POST['lname']));
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $phone = htmlspecialchars(trim($_POST['phone']));
    $services = htmlspecialchars(trim($_POST['services']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate required fields
    if (empty($fname) || empty($email) || empty($phone) || empty($services) || empty($message)) {
        echo "All fields are required.";
        exit;
    }

    // Set up email details
    $to = "zabaidafashion@gmail.com"; // Replace with your email address
    $subject = "New Contact Form Submission";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $email_body = "Name: $fname $lname\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Phone: $phone\n";
    $email_body .= "Service: $services\n";
    $email_body .= "Message: $message\n";

    // Send email
    if (mail($to, $subject, $email_body, $headers)) {
        echo "Thank you for your message. We will get back to you soon!";
    } else {
        echo "Failed to send your message. Please try again later.";
    }
} else {
    echo "Invalid request method.";
}
?>
