<?php
session_start();
include '../dbconnect.php';

$company_name = $_SESSION['comp_name'];
$company_username = $_SESSION['username'];

// Check if user is not logged in, redirect to login page
if(!isset($_SESSION['username'])) {
    header("Location: comp_login_form.php");
    exit;
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">

<div class = "container-fluid">  
<a class="navbar-brand" href="homepage.php"><img src="../files/careersync-logo4.png"  alt="CareerSync-Logo"></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mx-auto">
      <li class="nav-item">
        <a class="nav-link" href="post_job.php">Post Job</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="manage_jobs.php">Manage Jobs</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="job_applications.php"> Job Applications</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="company_profile.php"> Profile </a>
      </li>
    </ul>
    <div class="nav-item dropdown user-dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fa-solid fa-user-tie"></i> <b><?php echo $company_name;?></b>
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="company_profile.php?company_username=<?php echo $company_username; ?>  ">Profile</a>
        <a class="dropdown-item" href="comp_logout.php">Logout</a>
      </div>
    </div>
  </div>
  
</div>
</nav>

<style>
  body {
            font-family: Arial, sans-serif;
            background-image: url("../files/bg_image3.jpg");  /* Replace with your image path */
            background-repeat: no-repeat;  /* Prevent image tiling */
            background-attachment: fixed;  /* Keep image fixed on scroll */
            background-position: center;  /* Center the image */
            background-size: cover;  /* Resize image to cover the container */
            opacity: 0.8;  /* Set body opacity to 80% for a faint background */
            color: #343a40;
            }
    .navbar-brand-text {
      font-weight: bold;
      color: #fff;
    }
    .navbar {
      background-color: #007bff;
    }
    .navbar-nav .nav-link {
      color: #fff;
      margin-left : 20px;
      margin-right : 20px;
      font-size: 1.2rem;
      color: white !important;
    }

    .nav-item .nav-link{
      color: #CDFF00 ;
    }

    .nav-item .nav-link:hover{
            border : 0.5px solid  !important;
            border-radius: 8px 8px 8px 8px !important;
            color : white !important;
        }
    .navbar-nav .nav-link:hover {
      color: #f8f9fa;
    }
    .navbar-toggler {
      border-color: #fff;
    }
    .navbar-toggler-icon {
      background-color: #fff;
    }

    .user-dropdown .dropdown-menu {
      right: 0;
      left: auto;
      opacity: 1.2rem;
      background-color: #DDDDDD ;
      
    }
    .navbar-brand img {
        max-height: 50px; /* Adjust the height as needed */
        width: 110px; /* Ensures image width adjusts automatically */
        
    }

    .footer {
      position : fixed;
      bottom : 0;
      left : 0;
      height: 7%;
      width: 100%;
      background-color:#484848;
      color: #FEFEFC;
    }
  </style>

<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" 
integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
