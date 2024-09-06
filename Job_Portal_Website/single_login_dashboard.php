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
            margin-left : 40px;
            color: white !important;
        }
        .nav-item .nav-link:hover{
            border : 0.5px solid  !important;
            border-radius: 8px 8px 8px 8px !important;
            color : white !important;
        }
        
        /*body content styling*/
        .container-login{
            opacity: 0.8;
            margin: 50px;
        }
        .jumbotron {
            background-color : #F5E0E0;
            /*background-color: #007bff;    background-color: #FFCECE;*/
            color: black;
            padding: 70px;
            border-radius: 10px;
        }
        .btn-primary {
            background-color : #002F9B  ;
            /*background-color: #17a2b8;*/
            border-color: #17a2b8;
            margin-right :10px;
            margin-left : 15px;
        }
        .btn-primary:hover {
            background-color: blue;
            /*background-color: #138496;*/
            border-color: black;
        }
        .option-links {
            margin-top: 20px;
            color: black; /* Text color for the register options */
        }
        .option-links a {
            margin-left : 20px; 
            margin-right: 15px;
            color: black; /* Text color for the register options */
        }
        .option-links a:hover {
            color: #ccc; /* Text color on hover for the register options */
            text-decoration: none; /* Remove underline on hover */
        }

        .navbar-brand img {
        max-height: 45px; /* Adjust the height as needed */
        width: 80px; /* Ensures image width adjusts automatically */
        
    }

.footer {
  position : fixed;
  bottom: 0;
  height: 7%;
  width: 100%;
  background-color: #343a40;
  color: #fff;
  padding: 20px 0;
  text-align: center;
  opacity: 1.2;  /* Set footer opacity to 100% for solid background */
}
</style>
</head>
<body>
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

    <main>
    <div class="container-login">
        <div class="jumbotron text-center">
            <h2><b>Find Your Dream Job or Post Job Vacancies</b></h2>
            <hr class="my-4">
            <h5>Our platform connects talented job seekers with top companies.</h5><br>
            <a class="btn btn-primary btn-lg" href="JobSeeker/user_login_form.php?type=jobseeker" role="button">Login as Job Seeker</a>
            <a class="btn btn-primary btn-lg" href="Company/comp_login_form.php?type=company" role="button">Login as Company</a><br><br>
            <div class="option-links">
                <span>Not registered yet?</span><br><br>
                <a type = "button" class="btn btn-outline-dark btn-md" href="Jobseeker/user_reg_form.php?type=jobseeker"><b>Register as Job Seeker</b></a>
                <a type = "button" class="btn btn-outline-dark btn-mds" href="Company/comp_reg_form.php?type=company"><b>Register as Company</b></a>
            </div>
        </div>
    </div>
    </main>

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

