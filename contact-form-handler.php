<?php
// Prevent direct access
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: contact-us/index.html");
    exit;
}

// Sanitize and validate input
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Get form data
$name = isset($_POST['name']) ? sanitize_input($_POST['name']) : '';
$email = isset($_POST['email']) ? sanitize_input($_POST['email']) : '';
$phone = isset($_POST['phone']) ? sanitize_input($_POST['phone']) : '';
$subject = isset($_POST['subject']) ? sanitize_input($_POST['subject']) : 'Contact Form Submission';
$message = isset($_POST['message']) ? sanitize_input($_POST['message']) : '';

// Validation
$errors = [];

if (empty($name)) {
    $errors[] = "Name is required";
}

if (empty($email)) {
    $errors[] = "Email is required";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format";
}

if (empty($message)) {
    $errors[] = "Message is required";
}

// If there are errors, redirect back with error message
if (!empty($errors)) {
    $error_msg = implode(", ", $errors);
    header("Location: contact-us/index.html?error=" . urlencode($error_msg));
    exit;
}

// Email configuration
$to = "amen@serenetouchcareservices.co.uk";
$email_subject = "New Contact Form Submission: " . $subject;

// Create email body
$email_body = "You have received a new message from the contact form on your website.\n\n";
$email_body .= "Name: " . $name . "\n";
$email_body .= "Email: " . $email . "\n";
$email_body .= "Phone: " . $phone . "\n";
$email_body .= "Subject: " . $subject . "\n\n";
$email_body .= "Message:\n" . $message . "\n";

// Email headers
$headers = "From: noreply@serenetouchcareservices.co.uk\r\n";
$headers .= "Reply-To: " . $email . "\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

// Send email
if (mail($to, $email_subject, $email_body, $headers)) {
    // Success - redirect back with success message
    header("Location: contact-us/index.html?success=1");
    exit;
} else {
    // Error - redirect back with error message
    header("Location: contact-us/index.html?error=" . urlencode("Failed to send message. Please try again later."));
    exit;
}
?>

