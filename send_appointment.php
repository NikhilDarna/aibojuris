<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: appointment.php");
    exit;
}

$firstname = trim($_POST["user-first-name"] ?? '');
$lastname  = trim($_POST["user-last-name"] ?? '');
$email     = trim($_POST["user-email"] ?? '');
$phone     = trim($_POST["user-phone"] ?? '');
$subject   = trim($_POST["user-subject"] ?? '');
$date      = trim($_POST["user-select-date"] ?? '');
$message   = trim($_POST["user-message"] ?? '');

if (
    $firstname === '' || $lastname === '' || $email === '' ||
    $phone === '' || $subject === '' || $date === '' || $message === ''
) {
    header("Location: appointment.php?error=1");
    exit;
}

// ✅ SUCCESS → redirect back to form
header("Location: appointment.php?success=1&name=" . urlencode($firstname));
exit;
