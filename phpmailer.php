<?php
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Database connection details
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'newsletter_nss';

// Email configuration
$smtpHost = 'smtp.gmail.com';
$smtpUsername = '';
$smtpPassword = '';
$smtpPort = 587;
$smtpEncryption = 'tsl';

try {
    // Connect to the database
    $conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare SQL statement to fetch recipients
    $stmt = $conn->prepare("SELECT email FROM subscribers");
    $stmt->execute();

    // Fetch recipients from the database
    $recipients = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // Close the database connection
    $conn = null;

    // Check if any recipients found
    if (empty($recipients)) {
        echo 'No recipients found in the database.';
        exit;
    }

    // Read HTML content from the uploaded file
    $htmlFilePath = 'file.html';
    $htmlContent = file_get_contents($htmlFilePath);

    if ($htmlContent === false) {
        echo 'Error reading HTML file.';
        exit;
    }

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    // SMTP configuration
    $mail->isSMTP();
    $mail->Host = $smtpHost;
    $mail->SMTPAuth = true;
    $mail->Username = $smtpUsername;
    $mail->Password = $smtpPassword;
    $mail->SMTPSecure = $smtpEncryption;
    $mail->Port = $smtpPort;

    // Set email content
    $mail->isHTML(true);
    $mail->Subject = 'Example Newsletter';
    $mail->Body = $htmlContent;

    // Add recipients
    foreach ($recipients as $recipient) {
        $mail->addAddress($recipient);
    }

    // Send email asynchronously
    $mail->send();

    echo 'Emails sent asynchronously to multiple recipients.';
} catch (Exception $e) {
    echo 'An error occurred while sending the emails: ' . $mail->ErrorInfo;
}
