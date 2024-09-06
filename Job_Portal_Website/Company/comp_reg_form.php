<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
            display: inline-block;
        }
        .nav-item .nav-link:hover {
            border: 0.5px solid !important;
            border-radius: 8px !important;
            color: yellow !important;
        }
        .navbar-brand img {
        max-height: 45px; 
        width: 80px; 
        }
        /*body-content style*/
        #content {
            margin-top: 50px;
            padding-top: 80px;
            padding: 20px;
        }
        .container-cmpreg-form {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background-color: #D8D8D8;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        .btn-verify {
            margin-top: 10px;
        }
        .btn-submit {
            margin-top: 20px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        /*footer style*/
        .footer {
            background-color: #343a40;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
        .error {
            color: red;
            font-size: 0.9rem;
        }
    </style>
    <script>
        function togglePasswordVisibility() {
            var passwordField = document.getElementById("password");
            var passwordToggle = document.getElementById("password-toggle");
            if (passwordField.type === "password") {
                passwordField.type = "text";
                passwordToggle.innerHTML = "&#128065;"; // Eye icon symbol
            } else {
                passwordField.type = "password";
                passwordToggle.innerHTML = "&#128064;"; // Eye slash icon symbol
            }
        }

        function validateForm() {
            // Get form fields
            var phone = document.getElementById("comp_phone").value;
            var email = document.getElementById("comp_email").value;
            var password = document.getElementById("password").value;
            var errors = [];

            // Validate phone number
            if (phone.length !== 10 || !/^\d{10}$/.test(phone)) {
                errors.push("Phone number must be exactly 10 digits.");
            }

            // Validate email
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                errors.push("Please enter a valid email address.");
            }

            //validate password
            var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,15}$/;
            if (!passwordPattern.test(password)) {
                errors.push("Password must be 8-15 characters long, contain at least one uppercase letter, one lowercase letter, one number, and one special character.");
            }

            if (errors.length > 0) {
                alert(errors.join("\n"));
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
<div class="wrapper">
    <div id="header">
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
                            <a class="nav-link" href="../single_login_dashboard.php">Login/ Register</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div id="content">
        <div class="container-cmpreg-form">
            <h2 class="mb-4">Company Registration</h2>
            <form action="verify_address.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                <div class="form-group">
                    <label for="comp_name">Company Name:</label>
                    <input type="text" class="form-control" id="comp_name" name="comp_name" placeholder="Enter name of your Company" required>
                </div>
                <div class="form-group">
                    <label for="comp_phone">Phone No:</label>
                    <input type="tel" class="form-control" id="comp_phone" name="comp_phone" placeholder="Enter your phone number" required>
                    <div id="comp_phone_error" class="error"></div>
                </div>
                <div class="form-group">
                    <label for="comp_email">Email ID:</label>
                    <input type="email" class="form-control" id="comp_email" name="comp_email" placeholder="Enter your email address" required>
                    <div id="comp_email_error" class="error"></div>
                </div>
                <div class="form-group">
                    <label for="password">Set a Password:</label><br>
                    <input type="password" id="password" name="password" required>
                    <button type="button" id="password-toggle" onclick="togglePasswordVisibility()">&#128065;</button><br>
                    <div id="password_error" class="error"></div>
                </div>
                <div class="form-group">
                    <label for="comp_regno">Company Registration Number:</label>
                    <input type="text" class="form-control" id="comp_regno" name="comp_regno" placeholder="Enter Registration Number of your Company" required>
                </div>
                <div class="form-group">
                    <label for="comp_url">Company Website:</label>
                    <input type="text" class="form-control" id="comp_url" name="comp_url" placeholder="Enter Website URL of your Company" required>
                </div>
                <div class="form-group">
                    <label for="address_proof">Upload Company Address Proof (Image):</label>
                    <input type="file" id="address_proof" class="form-control-file" name="address_proof" accept="image/jpeg, image/png" required><br>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary btn-verify">Register Company</button>
                </div>
            </form>
        </div>
    </div>

    <footer class="footer mt-5">
        <div class="container">
            <p>&copy; 2024 CareerSync - a job portal for Nashik. All rights reserved.</p>
        </div>
    </footer>
</div>
<!-- Bootstrap JS (optional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>