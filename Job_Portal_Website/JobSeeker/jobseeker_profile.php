<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>JobSeeker Profile</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Include navbar.php -->
 
  <style>
    body {
        background-color: #f8f9fa;
        padding-top: 50px;
    }

    main {
        flex: 1;
        margin-top: 0px; /* Height of the header */
        margin-bottom: 50px; /* Height of the footer */
        overflow-y: auto;
        padding: 20px;
        background-color: #f0f0f0;
        min-height: calc(100vh - 100px); /* Full height minus header and footer */
    }

    header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
    }

    .container-profile {
        max-width: 600px;
        margin: auto;
        margin-top: 120px;
        padding: 25px;
        border: solid #EEE4E4 1px;
        border-radius: 8px;
        background-color: #F0E2E2;
        color: black;
    }

    #profile-header {
        text-align: center;
        margin-bottom: 20px;
    }

    #profile-body h5 {
        margin-bottom: 15px;
    }

    .form-group label {
        font-weight: bold;
    }
  </style>
</head>

<body>
<header>
  <?php include 'assets/js_header.php'; ?>
</header>

<main>
  <?php
  $sql = "SELECT * FROM jobseekers WHERE email = '$js_username'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();

      $js_username = $row['email'];
      $js_name = $row['name'];
      $js_phone = $row['phone'];
      $js_type = $row['type'];
  }
  ?>

  <div class="container-profile">
    <div id="profile-header">
      <h2>Your Profile</h2>
    </div>

    <div id="profile-body">
      <h5><strong>Name:</strong> <?php echo $js_name; ?></h5>
      <h5><strong>Phone:</strong> <?php echo $js_phone; ?></h5>
      <h5><strong>Email:</strong> <?php echo $js_username; ?></h5>
      <h5><strong>Type:</strong> <?php echo $js_type; ?></h5>
    </div>
  </div>
</main>

<footer>
  <?php include 'assets/js_footer.php'; ?>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
</body>
</html>
