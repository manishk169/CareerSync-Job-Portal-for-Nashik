<?php
require_once 'vendor/autoload.php';

use thiagoalessio\TesseractOCR\TesseractOCR;
use thiagoalessio\TesseractOCR\UnsuccessfulCommandException;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include('../dbconnect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comp_name = $_POST["comp_name"];
    $comp_phone = $_POST["comp_phone"];
    $comp_email = $_POST["comp_email"];
    $password = $_POST["password"];
    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
    $comp_regno = $_POST["comp_regno"];
    $comp_url = $_POST["comp_url"];

    // Check if file is uploaded successfully
    if ($_FILES["address_proof"]["error"] == 0) {
        $address_proof_tmp = $_FILES["address_proof"]["tmp_name"];
        $address_proof_name = $_FILES["address_proof"]["name"];
        $address_proof_ext = pathinfo($address_proof_name, PATHINFO_EXTENSION);

        // Check if file is an image
        $allowed_ext = array("jpg", "jpeg", "png");
        if (in_array($address_proof_ext, $allowed_ext)) {
            try {
                // Use Tesseract OCR to extract text from image
                $extracted_text = (new TesseractOCR($address_proof_tmp))
                   ->executable('C:\Program Files\Tesseract-OCR\tesseract.exe') // Replace with the actual path
                   ->run();

                // Check if Nashik is present in the extracted text
                if (stripos($extracted_text, 'nashik') !== false) {
                    // Address verified, checking email id already exists or not store and storing user information in the database

                    $checkEmail = "SELECT * FROM company WHERE comp_email = '$comp_email'";
                    $result = $conn->query($checkEmail);
                    if ($result->num_rows > 0) {
                        echo "<script>alert('Email ID Already Exists'); window.history.back();</script>";
                        exit();
                    } else {
                        $sql = "INSERT INTO company (comp_name, comp_phone, comp_email, password, comp_regno, comp_url) VALUES ('$comp_name', '$comp_phone', '$comp_email', '$hashedpassword', '$comp_regno', '$comp_url')";
                        if ($conn->query($sql) === TRUE) {
                            // Send confirmation email
                            $mail = new PHPMailer(true);
                            try {
                                // Server settings
                                $mail->isSMTP();
                                $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server
                                $mail->SMTPAuth = true;
                                $mail->Username = 'careersync2024@gmail.com'; // Replace with your email address
                                $mail->Password = 'egkrgjsqmpjavwec'; // Replace with your email password
                                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                                $mail->Port = 587;

                                // Recipients
                                $mail->setFrom('careersync2024@gmail.com', 'CareerSync');
                                $mail->addAddress($comp_email, $comp_name);

                                // Content
                                $mail->isHTML(true);
                                $mail->Subject = 'Registration Confirmation';
                                $mail->Body    = '<p>Dear ' . $comp_name . ',</p><p>Your details are verified successfully, and you are registered on CareerSync - a job portal for Nashik.</p>';

                                $mail->send();
                                echo "<script>alert('User registered successfully! A confirmation email has been sent.'); window.location.href='../single_login_dashboard.php';</script>";
                            } catch (Exception $e) {
                                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                            }
                            exit();
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }
                } else {
                    echo "<script>alert('Address does not contain \"Nashik\". Please upload a valid address proof.'); window.history.back();</script>";
                }
            } catch (UnsuccessfulCommandException $e) {
                echo "<script>alert('Error processing image. Please ensure the image quality is sufficient and try again.'); window.history.back();</script>";
            }
        } else {
            echo "<script>alert('Only JPG, JPEG, and PNG files are allowed.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Error uploading file. Please try again.'); window.history.back();</script>";
    }
}

// Close MySQL connection
$conn->close();
?>
