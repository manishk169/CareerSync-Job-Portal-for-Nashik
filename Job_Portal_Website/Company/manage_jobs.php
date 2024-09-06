<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage jobs</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- Include navbar.php -->
  <style>
    main {
      flex: 1;
      margin-bottom: 50px; /* Height of the footer */
      overflow-y: auto;
      padding: 30px;
      background-color: white;
    }
    header {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      z-index: 1000;
      height: 50px; /* Adjust this value based on the actual height of your header */
    }
    body {
      background-color: #f8f9fa;
      padding-top: 50px; /* Must be equal to or greater than the header's height */
    }
    .container {
      max-width: 1000px;
      margin: auto;
    }
    .form-group label {
      font-weight: bold;
    }
    .form-control-borderless {
      border: none;
    }
    .btn-icon i {
      font-size: 1rem; /* Adjust the size of the icon if necessary */
      line-height: 1; /* Ensure proper alignment */
    }
    .edit-btn i,
    .delete-btn i {
      display: block;
      position: relative;
    }
    .table tbody tr:hover td, .table tbody tr:hover th {
      background-color: #F3DCDC;
    }
    .table thead {
      background-color: #C2C2C2;
    }
  </style>
</head>
<body>
<header>
  <?php include 'assets/header.php'; ?>
</header>
<main>
  <div class="container mt-5">
    <h3 style="color: seagreen; margin-bottom: 10px;" class="text-center">Update or Delete your Posted Jobs</h3>
    <div class="page-header" style="background: #f4511e"></div>
    <form method="GET" action="">
      <div class="form-group">
        <div class="input-group" style="max-width: 400px; margin: auto;">
        <input type="text" name="search" class="form-control mr-sm-2" placeholder="Search by job title" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
        <div class="input-group-append">
            <button type="submit" class="btn btn-primary">Search</button>
          </div>
        </div>
      </div>
    </form>
  </div>
  <br>
  <div class="container-fluid">
    <?php
    $recruiter_id = $_SESSION['username'];
    $sql = "SELECT * FROM jobs WHERE company_username = '$recruiter_id'";

    if (isset($_GET['search']) && !empty($_GET['search'])) {
      $search = $conn->real_escape_string($_GET['search']);
      $sql .= " AND job_title LIKE '%$search%'";
    }

    $result = $conn->query($sql);
    if (!$result) {
      die("Invalid query!");
    }

    if ($result->num_rows > 0) {
      echo '<table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">JOB ID</th>
                  <th scope="col">Job Title</th>
                  <th scope="col">Job Description</th>
                  <th scope="col">Job Posted Time</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>';
      
      while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <th>{$row['job_id']}</th>
                <td>{$row['job_title']}</td>
                <td>{$row['job_description']}</td>
                <td>{$row['job_posted_time']}</td>
                <td>
                  <a class='btn btn-primary btn-sm btn-icon edit-btn' href='edit_job.php?job_id={$row['job_id']}'><i class='fas fa-pencil-alt'></i></a>
                  <a class='btn btn-danger btn-sm btn-icon delete-btn' href='delete_job.php?job_id={$row['job_id']}'><i class='fas fa-trash-alt'></i></a>
                </td>
              </tr>";
      }
      
      echo '</tbody></table>';
    } else {
      echo '<div class="alert alert-warning text-center" role="alert">You have not posted any job yet.</div>';
    }
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
