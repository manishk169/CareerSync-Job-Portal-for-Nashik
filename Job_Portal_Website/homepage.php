
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
            background-image: url("files/bg_image3.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
            color: #343a40;
        }
        #header {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            background-color: #343a40;
            opacity : 0.8;
        }
        .navbar {
            background-color: #343a40;
        }
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #fff;
        }
        .navbar-nav .nav-link {
            font-size: 1.2rem;
            margin-left: 20px;
            color: white !important;
        }
        .nav-item .nav-link:hover {
            border: 0.5px solid !important;
            border-radius: 8px 8px 8px 8px !important;
            color: white !important;
        }
        #content {
            padding-top: 100px;
            padding-bottom: 50px;
        }
        .jumbotron {
            background-color: #F5E0E0;
            color: black;
            opacity : 0.8;
            padding: 60px;
            border-radius: 15px;
            text-align :center;
        }
        .feature {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .feature:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }
        .feature h3 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #343a40;
        }
        .feature p {
            font-size: 1.1rem;
            color: #6c757d;
        }

        .text-center {
            text-align: center;
            color : blue;
        }
        .job-listing {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
        }
        .job-listing:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }
        .job-listing h4 {
            font-size: 1.8rem;
            color: #343a40;
            margin-bottom: 10px;
        }
        .job-listing p {
            font-size: 1.1rem;
            color: #6c757d;
        }
        .job-listing .apply-btn {
            margin-top: 10px;
        }
        .footer {
            background-color: #343a40;
            color: #fff;
            padding: 30px 0;
            text-align: center;
            opacity : 0.8;
        }
        .footer-links a {
            color: #ffffff;
            margin: 0 10px;
            text-decoration: none;
        }
        .footer-links a:hover {
            text-decoration: underline;
        }
        .navbar-brand img {
        max-height: 45px; 
        width: 80px; 
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
                            <a class="nav-link" href="single_login_dashboard.php">Login / Register</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div id="content">
        <div class="container">
            <div class="jumbotron">
                <h1>Welcome to the Job Platform for Nashik</h1>
                <p class="lead">Find Your Dream Job or Post Job Vacancies in Nashik</p>
                <hr class="my-4">
                <p>Our platform connects talented job seekers with top companies in Nashik city.</p>
            </div>
            <br>

            <h2 class="mt-5 text-center">Latest Job Openings</h2>
            <div class="row">
                <?php
                include 'dbconnect.php';

                $sql = "SELECT * FROM company AS c INNER JOIN jobs AS j ON c.comp_email = j.company_username";
                // Adjust the query as per your database schema
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='col-md-4 job-listing'>";
                        echo "<h4>" . $row["job_title"] . "</h4>";
                        echo "<p>Company: " . $row["comp_name"] . "</p>";
                        echo "<button class='btn btn-primary apply-btn' onclick='redirectToLogin()'>Apply Job</button>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No job listings found.</p>";
                }

                $conn->close();
                ?>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 CareerSync - a job portal for Nashik. All rights reserved.</p>
            <div class="footer-links">
                <a href="homepage.php">Home</a> | 
                <a href="about_us.php">About Us</a> | 
                <a href="list_of_companies.php">Companies</a> | 
                <a href="single_login_dashboard.php">Login/Register</a> | 
                <a href="contact_us.php">Contact Us</a>
            </div>
            <p>Contact us at: <a href="mailto:support@careersync.com" style="color: #ffffff;">careersync2024@gmail.com</a></p>
            <p>Follow us on: 
                <a href="https://www.facebook.com" target="_blank">Facebook</a>, 
                <a href="https://www.twitter.com" target="_blank">Twitter</a>, 
                <a href="https://www.linkedin.com" target="_blank">LinkedIn</a>
            </p>
            <p>CareerSync is dedicated to connecting job seekers with top employers in Nashik. We provide a seamless platform for both employers and job seekers, making the job search and hiring process efficient and effective. Join CareerSync today and take the next step in your career!</p>
        </div>
    </footer>
</div>

<script>
    function redirectToLogin() {
        window.location.href = 'JobSeeker/user_login_form.php';
    }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
