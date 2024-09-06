<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Job Applications</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Include navbar.php -->
  <style>
    /* Include the updated CSS here */
    body {
    background-color: #f8f9fa;
    padding-top: 70px; /* Adjust based on your header height */
    margin: 0;
}

header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1000; /* Ensure it stays above other content */
}

main {
    margin-top: 30px; /* Adjust based on your header height */
    margin-bottom: 50px; /* Adjust based on your footer height */
    padding: 20px;
    background-color: #f0f0f0;
    min-height: calc(100vh - 120px); /* Ensures main takes the full height minus header and footer */
    overflow-y: auto;
}

.card-body {
    background-color: #DCDCDC;
    color: black;
}

.card {
    height: 280px; /* Adjust the height as needed */
    width: 100%; /* Ensures card takes full width of its container */
    margin: auto;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.container {
    max-width: 1000px;
}

footer {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 50px; /* Adjust based on your footer height */
    background-color: #343a40; /* Ensure the footer has a background color */
    color: #fff;
    text-align: center;
    line-height: 50px; /* Center the text vertically */
    z-index: 1000; /* Ensure it stays above other content */
}

  </style>
</head>
<body>
  <header>
    <?php include 'assets/header.php'; ?>
  </header>

  <main>
    <div class="container">
      <h3 style="color: #3C9700; margin-top: 40px; padding-bottom: 30px;" class="text-center"><u>View Job Applicants</u></h3>
    </div>

    <div class="container">
      <?php
      $recruiter_id = $_SESSION['username'];

      $sql = "SELECT * FROM jobs WHERE company_username = '$recruiter_id'";
      $sql2 = "SELECT number_of_applicants FROM applications  WHERE company_username = '$recruiter_id'";

      $result2 = $conn->query($sql2);
      if ($result2->num_rows > 0) {
        while ($row = $result2->fetch_assoc()) {
          $number_of_applicants = $row['number_of_applicants'];
        }
      }

      $result1 = $conn->query($sql);
      if ($result1->num_rows > 0) {
        // Output data of each row
        while ($row = $result1->fetch_assoc()) {
          $job_id = $row['job_id'];
          $job_title = $row['job_title'];
          $company_username = $row['company_username'];
          $job_posted_time = $row['job_posted_time'];
      ?>

      <div class="card">
        <div class="card-header">
          Job ID: <?php echo htmlspecialchars($job_id); ?>
        </div>
        <div class="card-body">
          <h5 class="card-title"><?php echo htmlspecialchars($job_title); ?></h5>
          <p class="card-text">Posted on: <?php echo htmlspecialchars($job_posted_time); ?></p>
          <p class="card-text">Status: Active</p>
          <p class="card-text">Number of Applicants: <?php echo htmlspecialchars($number_of_applicants); ?></p>
          <a class="btn btn-primary btn-sm view-applicants-btn" href="manage_applicants.php?job_id=<?php echo $job_id; ?>">Manage Applicants</a>
        </div>
      </div> 
      <?php
          }
        } else {
          echo '<div class="alert alert-warning text-center" role="alert">No Jobs found</div>';
        }

        $conn->close();
      ?>
    </div>
  </main>

  <footer>
    <?php include 'assets/footer.php'; ?>
  </footer>
  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
</body>
</html>
