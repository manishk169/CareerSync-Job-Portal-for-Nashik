<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Company Profile</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!-- Include navbar.php -->
<style>
       main {
            flex: 1;
            margin-top: 0px; /* Height of the header */
            margin-bottom: 50px; /* Height of the footer */
            overflow-y: auto;
            padding: 20px;
            background-color: #f0f0f0;
        }


      header{
        position : fixed;
        top : 0;
        left : 0;
        width: 100%;

      }

  <!-- Custom CSS -->
        body {
            background-color: #f8f9fa;
            padding-top: 50px;
        }
        .container {
            max-width: 1000px;
            margin-top : 50px;
        }
        .form-group label {
            font-weight: bold;
        }

        .container-profile {
        color: black;
       
        margin-top: 70px;
        margin-left: auto;
        margin-right: auto;
        height: 570px;
        width: 600px;
        display: flex;
        flex-direction: column;
        }

    .company-logo {
        opacity : 1;
        margin-left :100px;
        padding-top : 8px;
        margin-bottom : 10px;
        height: 200px;
        width: 400px;
        object-fit: contain; /* Ensures the image retains its aspect ratio */
    } 
    
</style>
</head>


<body>

<header>
<?php include 'assets/header.php'; ?>
</header>

<main>

<div class="container-profile">

    <?php
      include('../dbconnect.php');
      
      require 'vendor/autoload.php';
      require 'cloudinary_config.php'; // Include your Cloudinary configuration file
      
    
      
     // $company_usernames = $_GET['company_username'];  // Assuming the company ID is passed as a GET parameter
    //  echo "$company_username";
      $sql = "SELECT comp_name, comp_phone, comp_email, comp_regno, comp_url, comp_logo FROM company WHERE comp_email = '$company_username'";

      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();

          $company_username = $row['comp_email'];
          $company_logo = $row['comp_logo'];
          
          if (!empty($row["comp_logo"])) {
            //echo "<img src='" . $row["comp_logo"] . "' alt='Company Logo'  class='company-logo'>";
            echo "<img src='" . $company_logo . "' alt='Company Logo' class='company-logo'>";
          }
          echo "<h2>" . $row["comp_name"] . "</h2>";
          echo "<p><strong>Phone:</strong> " . $row["comp_phone"] . "</p>";
          echo "<p><strong>Email:</strong> " . $row["comp_email"] . "</p>";
          echo "<p><strong>Registration Number:</strong> " . $row["comp_regno"] . "</p>";
          echo "<p><strong>Website:</strong> <a href='" . $row["comp_url"] . "'>" . $row["comp_url"] . "</a></p>";


      } else {
          echo "<p>No company details found.</p>";
      }
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       // $company_username = $_POST['company_username'];
        echo $company_username;
        // Handle file upload to Cloudinary
        if ($_FILES['comp_logo']['error'] == UPLOAD_ERR_OK) {
          $logo_tmp_path = $_FILES['comp_logo']['tmp_name'];
          $logo_name = basename($_FILES['comp_logo']['name']);
      
          // Specify upload options
          $upload_options = [
              'folder' => 'company_logos/',
              'public_id' => pathinfo($logo_name, PATHINFO_FILENAME),
              'resource_type' => 'image'
          ];
      
          try {
            
              // Upload the logo to Cloudinary
              $upload_result = $cloudinary->uploadApi()->upload($logo_tmp_path, $upload_options);
      
              $logo_url = $upload_result['secure_url'];
      
              // Update the company record in the database with the new logo URL
              $update_sql = "UPDATE company SET comp_logo = '$logo_url' WHERE comp_email = '$company_username'";
              if ($conn->query($update_sql) === TRUE) {
                  echo "<script>alert('Logo uploaded and updated successfully!');
                  window.location.href='company_profile.php?company_username='$company_username'';</script>";
                  exit();
              } else {
                  echo 'Error updating logo in the database: ' . $conn->error;
              }
          } catch(Exception $e) {
              echo 'Error uploading file: ' . $e->getMessage();
          }
      }
      
    }


 ?>

    <form action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="comp_logo">Upload or Update Company Logo:</label>
        <input type="file" class="form-control-file" id="comp_logo" name="comp_logo" accept="image/*" required>
      </div>
      <button type="submit" class="btn btn-primary">Upload Logo</button>
    </form>
</div>

</main>
    
<footer>
  <?php include 'assets/footer.php';?>
</footer>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
</body>
</html>