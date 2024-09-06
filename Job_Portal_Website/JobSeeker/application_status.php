<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Track Application Status</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Include navbar.php -->
  <?php include 'assets/js_header.php'; ?>

  <style>
     
    header {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      z-index: 1000;
    }
    
    
    main {
      flex: 1;
      margin-top: 0px; /* Height of the header */
      margin-bottom: 50px; /* Height of the footer */
      overflow-y: auto;
      padding: 30px;
      background-color: white;
    }body {
      background-color: #f8f9fa;
      padding-top: 0px; /* Adjusted for fixed header */
    }
    .container {
      max-width: 1000px;
      margin: auto;
    }
    
    .btn-icon i {
      font-size: 1rem; 
      line-height: 1; 
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
<main>
  <h3 style="color: black; margin-top: 10px;" class="text-center">Track your job Application Status</h3>
  <br>
  <div class="container-fluid">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Job ID</th>
          <th scope="col">Job Title</th>
          <th scope="col">Company Username</th>
          <th scope="col">Application Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
    
        // Assuming you have a session variable storing the job seeker's email
     
        $js_username = $_SESSION['username']; // Make sure this session variable is set upon login

 /*       $sql_query = "SELECT * FROM company AS c INNER JOIN applications AS a ON c.comp_email = a.comp_username WHERE  a.js_username = '$js_username' ";
        $query_result = $conn->query($sql_query);
        if ($query_result->num_rows > 0) {
          // Output data of each row
          while($row = $result->fetch_assoc()) {
              $company_name = $row['comp_name'];
          }
*/
        // Fetch job application statuses
        $sql = "SELECT a.job_id, j.job_title, j.company_username, a.application_status 
                FROM applications a 
                JOIN jobs j ON a.job_id = j.job_id 
                WHERE a.js_username = '$js_username'";
        $stmt = $conn->prepare($sql);
       // $stmt->bind_param("s", '$js_username');
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row['job_id']) . "</td>
                        <td>" . htmlspecialchars($row['job_title']) . "</td>
                        <td>" . htmlspecialchars($row['company_username']) . "</td>
                        <td>" . htmlspecialchars($row['application_status']) . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No job applications found</td></tr>";
        }

        $stmt->close();
        $conn->close();
        ?>
      </tbody>
    </table>
    </div>
</main>
</body>
<?php include 'assets/js_footer.php'; ?>

</html>







    