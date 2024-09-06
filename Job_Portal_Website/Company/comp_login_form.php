<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Login page</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
    body {
            font-family: Arial, sans-serif;
            background-image: url("../files/bg_blurry2.jpg");  
            background-repeat: no-repeat;  
            background-attachment: fixed; 
            background-position: center;  
            background-size: cover;  
            opacity: 0.8;  
            color: #343a40;
            }
            
        /*navbar styling*/
       .navbar {
            opacity: 1.2;  
            background-color: #343a40;
        }
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .navbar-nav .nav-link{
            font-size: 1.2rem;
            margin-left : 40px;
            color: white !important;  
            display : inline-block;
        }

        .nav-item .nav-link:hover{
            border : 0.5px solid  !important;
            border-radius: 8px 8px 8px 8px !important;
            color : yellow !important;
        }

        /*body content style*/
        .container-login-form{
            opacity: 0.8;
            margin-top :80px;
            margin-left : 600px;
        }
       .card {
            background-color : #F5E0E0;
            width: 400px;
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
        }

        .form-control {
            border-radius: 25px;
            padding: 10px 20px;
        }

        .btn-login {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 25px;
            padding: 10px 20px;
            width: 100%;
        }

        .btn-login:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .forgot-password {
            text-align: center;
            margin-top: 15px;
        }

        .forgot-password a {
            color: #007bff;
            text-decoration: none;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }
     
        /*footer style */
        .footer {
        position : fixed;
        bottom: 0;
        height: 7%;
        width: 100%;
        background-color: #343a40;
        color: #fff;
        padding: 20px 0;
        text-align: center;
        opacity: 1.2;  
        }
        .navbar-brand img {
        max-height: 45px; 
        width: 80px; 
        
    }


.form-group {
  position: relative;
}

#password-toggle {
  position: absolute; 
  top: 30%;
  right: 4px;
  color : #C8B6B6;
  border-color :#F5D5D5;
  transform: translateY(-50%);
  border-radius: 50%;
}
    </style>

<script>
        function togglePasswordVisibility() {
            var passwordField = document.getElementById("passwd");
            var passwordToggle = document.getElementById("password-toggle");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                passwordToggle.innerHTML = "&#128064;"; // Eye slash icon symbol
                
            } else {
                passwordField.type = "password";
                passwordToggle.innerHTML = "&#128065;"; // Eye icon symbol
            }
        }
    </script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
        <a class="navbar-brand" href="homepage.php"><img src="../files/careersync-logo4.png"  alt="CareerSync-Logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../homepage.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../about_us.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../list_of_companies.php">Companies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../single_login_dashboard.php">Login /Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<div class ="container-login-form">
<div class="card">
    <div class="card-header">
        <h4>Company Login</h4>
    </div>
    <div class="card-body">
        <form action="comp_login_verify.php" method="post">
            <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email ID" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="passwd" name="passwd" placeholder="Password" required>
                <button type="button" id="password-toggle" onclick="togglePasswordVisibility()">&#128065;</button><br>
            </div>
            <button type="submit" class="btn btn-primary btn-login">Login</button>
        </form>
        <!-- <div class="forgot-password">
            <a href="#">Forgot password?</a>
        </div> -->
        <br>
        <div class="new-recuriter-register" align="center">
            <h6>New User?</h6>
            <a href="comp_reg_form.php">Register Here</a>
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
