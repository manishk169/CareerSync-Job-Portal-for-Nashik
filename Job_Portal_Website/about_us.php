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
        max-height: 45px; /* Adjust the height as needed */
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
    <div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="about-us">
                <div class="row">
                    <div class="col-md-6">
                        <img src="files/about_us_image.jpg" class="img-fluid" alt="About Us Image" style="border-radius: 10px;">
                    </div>
                    <div class="col-md-6">
                        <h2>About Us</h2>
                        <hr class="my-4">
                        <p>We are <strong>CareerSync</strong>, a dedicated local job portal for Nashik city. Our mission is to bridge the gap between job seekers and employers in Nashik, fostering a thriving local job market. Whether you're looking for your dream job or the perfect candidate, CareerSync is here to help.</p>
                        <p>Our platform is designed with a deep understanding of the local job market and aims to provide a seamless and efficient job search experience. We believe in the potential of Nashik's talent pool and are committed to connecting skilled professionals with top employers in the region.</p>
                        <p>Join us on this journey to build a prosperous career or find the ideal candidate for your business. At CareerSync, we are more than just a job portal – we are a community dedicated to career growth and success in Nashik.</p>
                        <h6><b>Reach us at -</b></h6>
                        <p>Email : careersync2024@gmail.com</p>
                        <p>Website : careersync.com</p>
                        <p>Phone No. : 8459223910</p>
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
