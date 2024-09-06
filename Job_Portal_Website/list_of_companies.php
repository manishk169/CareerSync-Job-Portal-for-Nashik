<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company List</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        font-family: Arial, sans-serif;
        background-image: url("files/bg_image3.jpg");
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        background-size: cover;
        color: #343a40;
        opacity: 0.8;
    }

    #header {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1000;
        opacity: 1.2;
    }

    .navbar {
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

    .nav-item .nav-link:hover {
        border: 0.5px solid white !important;
        border-radius: 8px !important;
        color: white !important;
    }

    #content {
        margin-top: 50px;
        padding-top: 80px;
        padding: 20px;
    }

    .card-container {
        padding: 20px;
    }

    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: 0.3s;
        overflow: hidden;
        height: 350px;
    }

    .card-logo img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        background-color: red;
    }

    .card-body {
        padding: 20px;
    }

    .company-name {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .footer {
        position: fixed;
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
<div class="card-container">
<div class="row">
        <div class="col-12 text-center mb-3">
            <h2>Top Companies Hiring Now</h2>
            <br>
        </div>
    </div>
    <div class="row">
        <?php
        include 'dbconnect.php';

        $sql = "SELECT comp_name, comp_logo, comp_email FROM company";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $company_username = $row['comp_email'];
                $company_name = $row['comp_name'];
                $company_logo = $row['comp_logo'];
        ?>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="card mb-4" style="width: 100%;">
                <div class="card-logo">
                    <img src="<?php echo htmlspecialchars($company_logo); ?>" alt="Company Logo">
                </div>
                <div class="card-body">
                    <h3 class="card-title"><?php echo htmlspecialchars($company_name); ?></h3>
                </div>
                <div class="card-footer">
                    <a class="btn btn-primary btn-sm view-job-btn" href="Jobseeker/user_login_form.php?job_id=<?php echo htmlspecialchars($company_username); ?>">Login to view Jobs</a>
                </div>
            </div>
        </div>
        <?php
            }
        } else {
            echo "<p>No Companies are Registered on this job portal</p>";
        }

        $conn->close();
        ?>
    </div>
</div>
</div>

<footer class="footer mt-5">
        <div class="container">
            <p>&copy; 2024 CareerSync - a job portal for Nashik. All rights reserved.</p>
        </div>
</footer>
    </div>
</body>
</html>
