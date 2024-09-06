<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page(JobSeeker)</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!-- Include navbar.php -->
<style>
       main {
            flex: 1;
            margin-top: 0px; /* Height of the header */
            margin-bottom: 50px; /* Height of the footer */
            overflow-y: auto;
            padding: 20px;
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
        .container {
            max-width: 10s00px;
            margin: auto;
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

</main>
    
    <footer>
    <?php include 'assets/js_footer.php';?>
    </footer>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
</body>
</html>