
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Post a job</title>
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
        .container-post-job {
            padding : 20px; 
            background-color : #DADADA; 
            color : black;
            opacity : 3;
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
<div class="container-post-job">
        <h2 class="mb-4">Post a Job</h2>
        <form action="post_job.php" method="POST">
            <div class="form-group">
                <label for="job_title">Job Title:</label>
                <input type="text" class="form-control" id="job_title" name="job_title" required>
            </div>

            <div class="form-group">
                <label for="job_description">Job Description:</label>
                <textarea class="form-control" id="job_description" name="job_description" rows="6" required></textarea>
            </div>

            <div class = "form-group">
            <label for="qualificatiion">Qualification Required : </label><br>
            <select id="required_qualification" name="required_qualification" required>
            <option value="Post Graduate:ME/M.Tech./MCA">Post Graduate : ME/M.Tech./MCA</option>
            <option value="Under Graduate:BE/B.Tech./BCA/Bsc CS.">Under Graduate : BE/B.Tech./BCA/Bsc CS.</option>
            </select>
            </div><br>

        
            <div class = "form-group">
                <label for="skills">Key Skills Required : </label>
                <input type="text" class="form-control" id ="required_skills" name="required_skills" required>
            </div><br>

            <div class = "form-group">
            <label for="experience">Experience Required : </label><br>
            <select id="required_experience" name="required_experience" required>
            <option value="fresher">Fresher (Pursuing)</option>
            <option value="(0-6)months">0-6 Months</option>
            <option value="(1-2)years">1-2 years</option>
            <option value="(2-3)years">2-3 years</option>
            <option value="(3-5)years">3-5 years</option>
            <option value="(5-7)years">5-7 years</option>
            <option value="(8-10)years"> 8-10 years</option>
            </select>
            </div><br>

            <div class="form-group">
                <label for="job_salary">Salary:</label>
                <input type="text" class="form-control" id="job_salary" name="job_salary">
            </div><br>

            <button type="submit" class="btn btn-primary">Post Job</button>
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

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['job_title'];
    $description = $_POST['job_description'];
    $qualification = $_POST["required_qualification"];
    $skills = $_POST['required_skills'];
    $experience = $_POST["required_experience"];
    $salary = $_POST["job_salary"];
    $company_username =$_SESSION['username'];

    

     // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO jobs (company_username, job_title, job_description, required_qualification, required_skills, required_experience, salary, job_posted_time) VALUES (?, ?, ?, ?, ?, ?, ?, CURDATE())");
    $stmt->bind_param("sssssss", $company_username, $title, $description, $qualification, $skills, $experience, $salary);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>alert('Job Posted successfully!');
        window.location.href='post_job.php';</script>";
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>