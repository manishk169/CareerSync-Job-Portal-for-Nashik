<?php
// Load Composer's autoloader
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include "../dbconnect.php";
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['applicant_email']) && isset($_GET['company_name']) && isset($_GET['applicant_name']) && isset($_GET['job_title']) && isset($_GET['job_id'])) {
    $company_name = $_GET['company_name'];
    $job_title = $_GET['job_title'];
    $applicant_email = $_GET['applicant_email'];
    $applicant_name = $_GET['applicant_name'];
    $job_id = (int)$_GET['job_id']; // Cast job_id to an integer

    // Validate email
    if (!filter_var($applicant_email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    // Update application status in the database
    $stmt = $conn->prepare("UPDATE applications SET application_status = 'shortlisted' WHERE js_username = ? AND job_id = ?");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }
    
    $bind = $stmt->bind_param("si", $applicant_email, $job_id);
    if ($bind === false) {
        die("Bind failed: " . $stmt->error);
    }

    $execute = $stmt->execute();
    if ($execute) {
        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->SMTPDebug = 0;                      // Enable verbose debug output
            $mail->isSMTP();                           // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                  // Enable SMTP authentication
            $mail->Username   = 'careersync2024@gmail.com'; // SMTP username
            $mail->Password   = 'egkrgjsqmpjavwec';       // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = 587;                   // TCP port to connect to

            // Recipients
            $mail->setFrom('careersync2024@gmail.com', $company_name);
            $mail->addAddress($applicant_email, $applicant_name);  // Add a recipient

            // Content
            $mail->isHTML(true);                                  
            $mail->Subject = 'Job Application Update';
            $mail->Body    = "Congratulations! You have been shortlisted for the post of $job_title in $company_name... Stay connected for further updates";

            $mail->send();
            echo 'Message has been sent';
            echo "<script>alert('Job Application Accepted..');
            window.location.href='manage_applicants.php';</script>";
            
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Required parameters are missing.";
}

$conn->close();
?>
