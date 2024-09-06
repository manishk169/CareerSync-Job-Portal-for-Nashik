<?php
session_start();

include('../dbconnect.php');
require 'vendor/autoload.php'; // Include PHPMailer autoload
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $pass = $_POST["password"];
   


        $sql = "SELECT  name, email, password FROM jobseekers WHERE email = '$email'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $js_name = $row["name"];

        //var_dump($name);

        if($result->num_rows == 1 && $email == $row['email'] && password_verify($pass, $row['password']))
        {
            //$_SESSION["user_id"] = $row['ID'];
            $_SESSION["user_email"] = $row['email'];
   

            //set session variable
            $_SESSION['username'] = $email;
            $_SESSION['uname'] = $js_name;

            $otp = mt_rand(100000, 999999);
            $_SESSION['otp'] = $otp;
           // $_SESSION['user_id'] = $row['ID'];
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['username'] = $email;
            $_SESSION['uname'] = $js_name;

            // Send OTP via email
        $mail = new PHPMailer(true);
        try {
            // SMTP configuration
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'careersync2024@gmail.com'; // Your Gmail address
            $mail->Password   = 'egkrgjsqmpjavwec'; // Your Gmail password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
            $mail->Port       = 587; // TCP port to connect to

        
            // Email settings
            $mail->setFrom('careersync2024@gmail.com', 'CareerSync'); // Your Gmail address and your name
            $mail->addAddress($email); // Recipient's email address
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'OTP Verification'; // Email subject
            $mail->Body    = 'Your OTP for login is: ' . $otp; // Email body

            // Send email
            $mail->send();
            header("Location: otp_verification.php");
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
          
        }
        else
        {
            echo "<script>alert('Invalid Email or Password');
             window.location.href='user_login_form.php';</script>";
                     
        }
}

// Close MySQL connection
$conn->close();
?>
