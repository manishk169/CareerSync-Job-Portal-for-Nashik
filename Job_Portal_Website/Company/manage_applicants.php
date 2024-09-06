<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Applicants</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Include navbar.php -->
  <style>
    main {
      flex: 1;
      margin-top: 0px; /* Height of the header */
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
    }
    body {
      background-color: #f8f9fa;
      padding-top: 50px;
    }
    .container {
      max-width: 1000px;
      margin: auto;
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
  <h3 style="color: seagreen; margin-top: 10px;" class="text-center">Manage Job Applicants</h3>
  <br>
  <div class="container-fluid">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">JOB ID</th>
          <th scope="col">User Name</th>
          <th scope="col">User Email</th>
          <th scope="col">Mobile No.</th>
          <th scope="col">Resume</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (isset($_GET['job_id'])) {
          $job_id = $_GET['job_id'];
          $recruiter_id = $_SESSION['username'];

          $sql_query = "SELECT * FROM company WHERE comp_name = '$recruiter_id'";
          $query_result = $conn->query($sql_query);
          if($query_result->num_rows == 1){
            $row = $query_result->fetch_assoc();
            $company_name = $row['comp_name'];
          }

          $sql = "SELECT * FROM jobs as j INNER JOIN applications as a ON j.job_id = a.job_id WHERE a.job_id = $job_id";
          $result = $conn->query($sql);
          if (!$result) {
            die("Invalid query!");
          }
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              $applicant_name = urlencode($row['js_name']);
              $applicant_email = urlencode($row['js_username']);
              $job_title = urlencode($row['job_title']);
              $job_id = urlencode($row['job_id']);
              echo "<tr>
                      <th>{$row['job_id']}</th>
                      <td>{$row['js_name']}</td>
                      <td>{$row['js_username']}</td>
                      <td>{$row['js_phone']}</td>
                      <td>
                          <a class='btn btn-primary btn-sm btn-icon edit-btn' href='{$row['js_resume']}'>
                            View Resume
                          </a>
                      </td>
                      <td>
                        <a class='btn btn-primary btn-sm btn-icon edit-btn' href='accept.php?applicant_email={$applicant_email}&applicant_name={$applicant_name}&company_name={$company_name}&job_title={$job_title}&job_id={$job_id}'> Accept </a>
                        <a class='btn btn-danger btn-sm btn-icon delete-btn' href='reject.php?applicant_email={$applicant_email}&applicant_name={$applicant_name}&company_name={$company_name}&job_title={$job_title}&job_id={$job_id}'> Reject </a>
                      </td>
                    </tr>";
            }
          } else {
            echo '<tr><td colspan="6"><div class="alert alert-warning text-center" role="alert">No job applcations found.</div></td></tr>';
          }
        }
        ?>
      </tbody>
    </table>
  </div>
</main>

<footer>
  <?php include 'assets/footer.php'; ?>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
</body>
</html>
