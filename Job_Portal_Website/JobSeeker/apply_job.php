<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Apply Job</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Include navbar.php -->
  <style>
    header {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      z-index: 1000;
    }
    body {
      background-color: #f8f9fa;
      padding-top: 70px; /* Adjusted for fixed header */
    }

    .apply-job{
        background-color: #F7EDED;
      color: black;
      opacity: 2.0;
      margin-top: 10px;
      margin-left: 200px;
      margin-bottom : 50px;
      border-radius: 10px;
      padding : 40px;
    }
    
  </style>
</head>

<body>

<header>
  <?php include 'assets/js_header.php'; ?>
</header>

<main>
<div class="container apply-job">
<?php
      // job_id is passed in the URL query string from view_job.php
      if (isset($_GET['job_id'])) {
        $job_id = $_GET['job_id'];

        //SQL query to retrive company and job details
        $sql = "SELECT * FROM jobs j INNER JOIN company c ON j.company_username = c.comp_email WHERE j.job_id = '$job_id'";
        
        //SQL query to retrive logged-in  jobseeker's details
        $sql2 = "SELECT * FROM jobseekers WHERE email = '$js_username'";

        //combined details of company, job (result)
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();

          $job_title = $row['job_title'];
          $comp_id = $row['comp_id'];
          $company_name = $row['comp_name'];
          $company_username = $row['comp_email']; 
          $job_posted_time = $row['job_posted_time'];  
        }

        //details of jobseeker in variable (result2)
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) {
          $row = $result2->fetch_assoc();
          
          $js_username = $row['email'];
          $js_name = $row['name'];
          $js_phone = $row['phone'];
        }
    }
?>

<?php
require 'cloudinary_config.php'; // Include Cloudinary configuration

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $job_id = $_POST['job_id'];
    $js_name = $_POST['jobseeker_name'];
    $js_email = $_POST['jobseeker_email'];
    $js_phone = $_POST['jobseeker_phone'];

    // Check whether the jobseeker already applied for the job or not
    $check_sql = "SELECT * FROM applications WHERE job_id = $job_id AND js_username = '$js_email'";
    $check_sql_result = $conn->query($check_sql);
    if ($check_sql_result->num_rows > 0) {
        echo "<script>alert('You have already applied for this job.');
        window.location.href='manage_applied_jobs.php';</script>";
        exit();
    }

    // SQL query to get company_username
    $sql3 = "SELECT * FROM jobs WHERE job_id = $job_id";
    $result3 = $conn->query($sql3);
    if ($result3->num_rows > 0) {
        $row = $result3->fetch_assoc();
        $company_username = $row['company_username'];
    }

    // Handle file upload to Cloudinary
    if ($_FILES['jobseeker_resume']['error'] == UPLOAD_ERR_OK) {
        $resume_tmp_path = $_FILES['jobseeker_resume']['tmp_name'];
        $resume_name = basename($_FILES['jobseeker_resume']['name']);

        // Specify the desired file format as PDF
        $upload_options = [
            'folder' => 'resumes/',
            'public_id' => pathinfo($resume_name, PATHINFO_FILENAME),
            'resource_type' => 'auto',
            'format' => 'pdf' // Convert the uploaded file to PDF format
        ];

        try {
            $upload_result = $cloudinary->uploadApi()->upload($resume_tmp_path, $upload_options);

            $resume_url = $upload_result['secure_url'];

            // Insert application details into the database
            $stmt = $conn->prepare("INSERT INTO applications (job_id, company_username, js_name, js_username, js_phone, js_resume, application_date) VALUES (?, ?, ?, ?, ?, ?, CURDATE())");
            $stmt->bind_param("isssss", $job_id, $company_username, $js_name, $js_email, $js_phone, $resume_url);
            $stmt->execute();
            
            $sql_get_applicants_no ="SELECT number_of_applicants FROM applications WHERE job_id = $job_id";
            $result4 = $conn->query($sql_get_applicants_no);
              if ($result4->num_rows > 0) {
                $row = $result4->fetch_assoc();
                $number_of_applicants= $row['number_of_applicants']; 
              
              $sql_query = "UPDATE applications  SET number_of_applicants = $number_of_applicants + 1 WHERE job_id = $job_id";
              $conn->query($sql_query);
              }
            echo "<script>alert('Your application has been submitted successfully!');
            window.location.href='application_status.php';</script>";
            exit();
        } catch (Exception $e) {
            echo 'Error uploading file: ' . $e->getMessage();
        }
    } else {
        echo 'Error with file upload.';
    }
}
?>

    <h1 class="mt-5">Apply for this Job</h1>
    <form action="apply_job.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="job_id" value="<?php echo $job_id; ?>">
        <div class="form-group">
            <label for="jobseeker_name">Name</label>
            <input type="text" class="form-control" id="jobseeker_name" name="jobseeker_name" required>
        </div>
        <div class="form-group">
            <label for="jobseeker_email">Email</label>
            <input type="email" class="form-control" id="jobseeker_email" name="jobseeker_email" required>
        </div>
        <div class="form-group">
            <label for="jobseeker_phone">Phone</label>
            <input type="text" class="form-control" id="jobseeker_phone" name="jobseeker_phone" required>
        </div>
        <div class="form-group">
            <label for="jobseeker_resume">Resume</label>
            <input type="file" class="form-control" id="jobseeker_resume" name="jobseeker_resume" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit Application</button>
    </form>
</div>
</main>

<footer>
  <?php include 'assets/js_footer.php'; ?>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
</body>
</html>


