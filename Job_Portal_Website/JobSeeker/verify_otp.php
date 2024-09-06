<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $otp_entered = $_POST['otp'];
    $otp_generated = $_SESSION['otp'];

    if ($otp_entered == $otp_generated) {
        // OTP matched, redirect to dashboard
        header("Location: search_jobs.php");
    } else {
        // OTP not matched, display error
        echo "<script>alert('Invalid OTP');
             window.location.href='otp_verification.php';</script>";
    }
}
?>
