<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Job</title>
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
    .form-group label {
      font-weight: bold;
    }
    .job-details h1 {
      font-size: 2.5rem;
      margin-bottom: 20px;
    }

    .job-details {
      background-color: #F7EDED;
      color: black;
      opacity: 2.0;
      margin-top: 10px;
      margin-left: 200px;
      margin-bottom : 50px;
      border-radius: 10px;
      padding : 40px;
    }
    .job-details h5 {
      font-size: 1.5rem;
      margin-bottom: 20px;
    }
    .job-details p {
      font-size: 1rem;
      margin-bottom: 10px;
    }
  </style>
</head>

<body>

<header>
  <?php include 'assets/js_header.php'; ?>
</header>

<main>
    <div class="container job-details">
      <?php
      // Assuming a job_id is passed in the URL query string
      if (isset($_GET['job_id'])) {
        $job_id = $_GET['job_id'];

        // SQL query to get job details based on job_id
        $sql = "SELECT * FROM jobs j INNER JOIN company c ON j.company_username = c.comp_email WHERE j.job_id = '$job_id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();

          $job_title = $row['job_title'];
          $company_name = $row['comp_name'];
          $job_description = $row['job_description'];
          $required_experience = $row['required_experience'];
          $salary = $row['salary'];
          $required_skills = $row['required_skills'];
          $job_posted_time = $row['job_posted_time'];
       ?>
          <h1 class="mb-4"><?php echo $job_title; ?></h1>
          <h5 class="mb-4"><u><?php echo $company_name; ?></u></h5>
          <hr>
          <h6 class="mb-3"><b>Job Description:</b></h6>
          <p class="mb-4"><?php echo $job_description; ?></p>
          <p class="mb-3"><b>Required Experience:</b> <?php echo $required_experience; ?></p>
          <p class="mb-3"><b>Salary:</b> ₹ <?php echo $salary; ?></p>
          <p class="mb-3"><b>Required Skills:</b> <?php echo $required_skills; ?></p>
          <p class="mb-3"><b>Posted On:</b> <?php echo $job_posted_time; ?></p>
          <br>
          <a class='mb-4 btn btn-primary btn-md apply-job-btn' href="apply_job.php?job_id=<?php echo $job_id; ?>">Apply Job</a>
      <?php
        } else {
          echo "<p class='mb-4'>Job not found.</p>";
        }

        $conn->close();
      } else {
        echo "<p class='mb-4'>Error: No job ID provided.</p>";
      }
      ?>
    </div>
</main>

<footer>
  <?php include 'assets/js_footer.php'; ?>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
</body>
</html>
