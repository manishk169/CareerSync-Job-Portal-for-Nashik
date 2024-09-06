<?php
include "dbconnect.php";
require_once 'Company/vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->SMTPDebug = 0; // Enable verbose debug output (0 = off)
        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = 'careersync2024@gmail.com'; // SMTP username
        $mail->Password = 'egkrgjsqmpjavwec'; // SMTP password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587; // TCP port to connect to

        // Recipients
        $mail->setFrom('careersync2024@gmail.com', 'CareerSync Contact Form');
        $mail->addAddress('careersync2024@gmail.com'); // Add a recipient

        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body    = "<h4>Contact Form Submission</h4><p><strong>Name:</strong> {$name}</p><p><strong>Message:</strong> {$message}</p>";

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerSync</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url("files/bg_image3.jpg");  /* Replace with your image path */
            background-repeat: no-repeat;  /* Prevent image tiling */
            background-attachment: fixed;  /* Keep image fixed on scroll */
            background-position: center;  /* Center the image */
            background-size: cover;  /* Resize image to cover the container */
            opacity: 0.8;  /* Set body opacity to 80% for a faint background */
            color: #343a40;
        }

        /*navbar styling*/
        #header {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            opacity: 1.2;  
        }

       .navbar {
            opacity: 1.2;  
            background-color: #343a40;
        }
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .navbar-nav .nav-link {
            font-size: 1.2rem;
            margin-left: 40px;
            color: white !important;
        }
        .nav-item .nav-link:hover{
            border: 0.5px solid !important;
            border-radius: 8px 8px 8px 8px !important;
            color: white !important;
        }


        /*body content style*/
        #content {
            margin-top: 50px;
            padding-top: 80px;  /* Adjust to ensure content doesn't hide behind fixed navbar */
            padding: 20px;
            background-color : white;
        }
        .jumbotron {
            background-color: #F5E0E0;
            color: black;
            padding: 40px;
            border-radius: 10px;
        }
        .feature {
            margin-bottom: 30px;
        }

        /*about us style*/
        .contact-us {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 10px;
            margin-top: 30px;
            color : black;
        }

        /*footer style */
        .footer {
            width: 100%;
            bottom: 0;
            background-color: #343a40;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        .navbar-brand img {
        max-height: 50px; /* Adjust the height as needed */
        width: 80px; /* Ensures image width adjusts automatically */
        
    }
    </style>
</head>
<body>
<div class="wrapper">
    <div id="header">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
            <a class="navbar-brand" href="homepage.php"><img src="files/careersync-logo4.png"  alt="CareerSync-Logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="homepage.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about_us.php">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="list_of_companies.php">Companies</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="single_login_dashboard.php">Login /Register</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
<div id="content">
   
<!-- Contact Us Section -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="contact-us">
                <h2>Contact Us</h2>
                <div class="row">
                    <div class="col-md-6">
                        <form method="post" action="">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="3" placeholder="Enter your message" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <img src="files/contact_us_image.jpg" class="img-fluid" alt="Contact Us Image" style="border-radius: 10px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
    <footer class="footer mt-5">
        <div class="container">
            <p>&copy; 2024 CareerSync - a job portal for Nashik. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
