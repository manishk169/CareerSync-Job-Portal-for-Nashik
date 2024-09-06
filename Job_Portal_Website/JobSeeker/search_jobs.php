<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Jobs</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Include navbar.php -->
  <?php include 'assets/js_header.php'; ?>

  <style>
    /* card formatting & designing */
    .card-body, .card-footer {
        background-color: #DCDCDC;
    }

    .card {
        height: 100%; /* Adjust the height as needed */
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .card-body {
        color: black;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .card-footer {
        color: black;
    }

    .view-job-btn {
        width: 100px;
    }

    .search {
        max-width: 1000px;
    }

    .form-control{
        border : solid #A9A9A9 1px;
    }

    .no-jobs-message {
        color: red;
        text-align: center;
        margin: auto;
    }
  </style>
</head>

<body>
    <div class="container-fluid">
        <h3 style="color: #3C9700; margin-top: 10px; padding-bottom: 20px;" class="text-center"><u>Search your desired Job</u></h3>
    </div>

    <div class="container">
        <div class="row">
            <!-- Search Form -->
            <div class="search">
                <form method="GET" action="" class="form-inline mb-4">
                    <input type="text" name="search" class="form-control mr-sm-2" placeholder="Search by job title" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">

                    <!-- Dropdown for required_experience -->
                    <select name="required_experience" class="form-control mr-sm-2">
                        <option value="">Select Experience</option>
                        <option value="(0-6)months">0-6 Months</option>
                        <option value="(1-2)years">1-2 years</option>
                        <option value="(2-3)years">2-3 years</option>
                        <option value="(3-5)years">3-5 years</option>
                        <option value="(5-7)years">5-7 years</option>
                        <option value="(8-10)years">8-10 years</option>
                        <!-- Add more options as needed -->
                    </select>

                    <!-- Text input for salary -->
                    <input type="text" name="salary" class="form-control mr-sm-2" placeholder="Salary">

                    <button type="submit" class="btn btn-success">Search</button>
                </form>
            </div>
        </div>

        <div class="row">
        <?php
        $search_terms = [];
        // Initialize the SQL query
        $sql = "SELECT * FROM company AS c INNER JOIN jobs AS j ON c.comp_email = j.company_username";

        // Check if there is a search input
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search_terms_array[] = "(j.job_title LIKE '%" . $conn->real_escape_string($_GET['search']) . "%')";
        }

        if (isset($_GET['required_experience']) && !empty($_GET['required_experience'])) {
            $experience = $conn->real_escape_string($_GET['required_experience']);
            $search_terms['required_experience'] = " j.required_experience = '$experience' ";
        }

        if (isset($_GET['salary']) && !empty($_GET['salary'])) {
            $salary = $conn->real_escape_string($_GET['salary']);
            $search_terms['salary'] = " j.salary = '$salary' "; // Adjust the comparison operator as needed
        }

        $search_clause = "";
        if (count($search_terms) > 0) {
            $search_clause = " WHERE " . implode(" AND ", $search_terms);
        }

        $sql .= $search_clause;

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                $job_id = $row['job_id'];
                $job_title = $row['job_title'];
                $company_username = $row['company_username'];
                $job_description = $row['job_description'];
                $job_posted_time = $row['job_posted_time'];
                $company_username = $row['comp_name'];
                $required_experience = $row['required_experience'];
                $salary = $row['salary'];
                $required_skills = $row['required_skills'];
        ?>
            <div class="col-12 col-sm-6 col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h3 class="card-title"><?php echo htmlspecialchars($job_title); ?></h3>
                        <h5 class="card-comp-name"><?php echo htmlspecialchars($company_username); ?></h5>

                        <div class="d-flex">
                            <i class="fas fa-briefcase mr-2"></i>
                            <h6><?php echo $required_experience; ?></h6>
                        </div>
                        <div class="d-flex">
                            <i class="fas fa-rupee-sign mr-2"></i> 
                            <h6><?php echo $salary; ?></h6>
                        </div>

                        <div class="d-flex">
                            <i class="fas fa-file-alt mr-2"></i>
                            <h6><?php echo $required_skills; ?></h6>
                        </div>

                        <p class="card-text"><?php echo htmlspecialchars(substr($job_description, 0, 100)) . '...'; ?></p>
                        <a class='btn btn-primary btn-sm view-job-btn' href="view_job.php?job_id=<?php echo $job_id; ?>">View Job</a>
                    </div>
                    <div class="card-footer">
                        <small>Posted on <?php echo htmlspecialchars($job_posted_time); ?></small>
                    </div>
                </div>
            </div>
            
        <?php
            }
        } else {
            echo '<div class="alert alert-warning text-center" role="alert">No results found.</div>';
        }

        $conn->close();
        ?>
        </div>
    </div>

    <?php include 'assets/js_footer.php'; ?>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
