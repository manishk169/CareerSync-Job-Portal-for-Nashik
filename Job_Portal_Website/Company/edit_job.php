<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Job</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    main {
      flex: 1;
      margin-top: 0px; /* Height of the header */
      margin-bottom: 50px; /* Height of the footer */
      overflow-y: auto;
      padding: 70px;
      background-color: #f0f0f0;
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
    .form-group label {
      font-weight: bold;
    }
  </style>
</head>
<body>
<header>
  <?php include 'assets/header.php'; ?>
</header>
<main>
<div class="container">
  <h2 class="mb-4">Edit Job</h2>
  <?php
  include('../dbconnect.php');

  if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['job_id'])) {
    $job_id = $_GET['job_id'];

    // Fetch job details from the database
    $stmt = $conn->prepare("SELECT * FROM jobs WHERE job_id = ?");
    $stmt->bind_param("i", $job_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
    } else {
      echo "Job not found.";
      exit();
    }
  } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $job_id = $_POST['job_id'];
    $title = $_POST['job_title'];
    $description = $_POST['job_description'];
    $qualification = $_POST["required_qualification"];
    $skills = $_POST['required_skills'];
    $experience = $_POST["required_experience"];
    $salary = $_POST["job_salary"];

    // Update job details in the database
    $stmt = $conn->prepare("UPDATE jobs SET job_title = ?, job_description = ?, required_qualification = ?, required_skills = ?, required_experience = ?, salary = ? WHERE job_id = ?");
    $stmt->bind_param("ssssssi", $title, $description, $qualification, $skills, $experience, $salary, $job_id);

    if ($stmt->execute()) {
      
      echo "<script>alert('Job updated successfully!');
      window.location.href='manage_jobs.php';</script>";
      exit();
    } else {
      echo "Error: " . $stmt->error;
    }
  } else {
    echo "Invalid request.";
    exit();
  }
  ?>
  <form action="edit_job.php" method="POST">
    <input type="hidden" name="job_id" value="<?php echo $row['job_id']; ?>">
    <div class="form-group">
      <label for="job_title">Job Title:</label>
      <input type="text" class="form-control" id="job_title" name="job_title" value="<?php echo $row['job_title']; ?>" required>
    </div>
    <div class="form-group">
      <label for="job_description">Job Description:</label>
      <textarea class="form-control" id="job_description" name="job_description" rows="6" required><?php echo $row['job_description']; ?></textarea>
    </div>
    <div class="form-group">
      <label for="required_qualification">Qualification Required:</label>
      <select id="required_qualification" name="required_qualification" class="form-control" required>
        <option value="Post Graduate:ME/M.Tech./MCA" <?php if ($row['required_qualification'] == "Post Graduate:ME/M.Tech./MCA") echo "selected"; ?>>Post Graduate: ME/M.Tech./MCA</option>
        <option value="Under Graduate:BE/B.Tech./BCA/Bsc CS." <?php if ($row['required_qualification'] == "Under Graduate:BE/B.Tech./BCA/Bsc CS.") echo "selected"; ?>>Under Graduate: BE/B.Tech./BCA/Bsc CS.</option>
      </select>
    </div>
    <div class="form-group">
      <label for="required_skills">Key Skills Required:</label>
      <input type="text" class="form-control" id="required_skills" name="required_skills" value="<?php echo $row['required_skills']; ?>" required>
    </div>
    <div class="form-group">
      <label for="required_experience">Experience Required:</label>
      <select id="required_experience" name="required_experience" class="form-control" required>
        <option value="fresher" <?php if ($row['required_experience'] == "fresher") echo "selected"; ?>>Fresher (Pursuing)</option>
        <option value="(0-6)months" <?php if ($row['required_experience'] == "(0-6)months") echo "selected"; ?>>0-6 Months</option>
        <option value="(1-2)years" <?php if ($row['required_experience'] == "(1-2)years") echo "selected"; ?>>1-2 years</option>
        <option value="(2-3)years" <?php if ($row['required_experience'] == "(2-3)years") echo "selected"; ?>>2-3 years</option>
        <option value="(3-5)years" <?php if ($row['required_experience'] == "(3-5)years") echo "selected"; ?>>3-5 years</option>
        <option value="(5-7)years" <?php if ($row['required_experience'] == "(5-7)years") echo "selected"; ?>>5-7 years</option>
        <option value="(8-10)years" <?php if ($row['required_experience'] == "(8-10)years") echo "selected"; ?>>8-10 years</option>
      </select>
    </div>
    <div class="form-group">
      <label for="job_salary">Salary:</label>
      <input type="text" class="form-control" id="job_salary" name="job_salary" value="<?php echo $row['salary']; ?>">
    </div>
    <button type="submit"  onclick = "showalert()" class="btn btn-primary">Update Job</button>
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
