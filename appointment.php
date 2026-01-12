<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(403);
    exit("Forbidden");
}

$firstname = trim($_POST["user-first-name"]);
$lastname  = trim($_POST["user-last-name"]);
$email     = filter_var($_POST["user-email"], FILTER_VALIDATE_EMAIL);
$phone     = trim($_POST["user-phone"]);
$subject   = trim($_POST["user-subject"]);
$date      = trim($_POST["user-select-date"]);
$message   = trim($_POST["user-message"]);

if (!$firstname || !$lastname || !$email || !$phone || !$subject || !$date || !$message) {
    exit("All fields are required.");
}

$to = "aibojuris@gmail.com"; // your email
$mail_subject = "New Appointment - $firstname $lastname";

$body = "
Name: $firstname $lastname
Email: $email
Phone: $phone
Subject: $subject
Date: $date

Message:
$message
";

$headers = "From: $firstname <$email>\r\nReply-To: $email";

if (mail($to, $mail_subject, $body, $headers)) {
    echo "Appointment request sent successfully!";
} else {
    echo "Mail failed. Contact admin.";
}
