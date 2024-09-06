<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
<style>
       body {
            font-family: Arial, sans-serif;
            background-image: url("../files/bg_blurry2.jpg");  /* Replace with your image path */
            background-repeat: no-repeat;  /* Prevent image tiling */
            background-attachment: fixed;  /* Keep image fixed on scroll */
            background-position: center;  /* Center the image */
            background-size: cover;  /* Resize image to cover the container */
            opacity: 0.8;  /* Set body opacity to 80% for a faint background */
            color: #343a40;
            }

        /*body content style*/
        .container-verify-otp{
            color : black;
            opacity: 0.8;
            margin-top :150px;
            margin-left : 570px;
        }
       .card {
            background-color : #F5E0E0;
            width: 400px;
            height : 400px;
            padding: 30px 25px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color : #FAFEB5;
            /*background-color: #007bff;*/
            color: #000000 ;
            border-radius: 15px 15px 0 0;
            padding: 15px;
            text-align: center;
        }

        .card-body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
            position : relative;
        }

        .form-control {
            border-radius: 25px;
            padding: 10px 20px;
        }

        .btn-verify-otp {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 25px;
            padding: 10px 20px;
            width: 100%;
        }

        .btn-verify-otp:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .back-to-login{
         padding-bottom : 40px ;
        }

        .back-to-login-btn{
            color :  blue;
            
            font-size : 23px;
        }
    </style>
</head>

<body>


<div class ="container-verify-otp">
<div class="card">
    <div class = "back-to-login">
    <a class ="back-to-login-btn" href="user_login_form.php"> 🡐 Back to Login Page</a>
    </div>
    <div class="card-header">
        <h4>Verify OTP</h4>
    </div>
    <div class="card-body">
        <form action="verify_otp.php" method="post">
            <div class="form-group">
                <input type="text" id="otp" name="otp" class="form-control" placeholder="Enter OTP" required>
            </div>
            <button type="submit" class="btn btn-primary btn-verify-otp">Verify</button>
        </form> 
    </div>
</div>
</div>


    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
