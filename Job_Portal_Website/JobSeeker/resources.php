<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resources</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Include navbar.php -->
  <?php include 'assets/js_header.php'; ?>

  <style>
    body {
      background-color: #f8f9fa;
    }
    .container {
      margin-top: 50px;
      background-color : #EAD8D8;
      
        }
    h5 {
      color: #343a40;
      margin-bottom: 30px;
    }
    .form-group label {
      font-weight: bold;
    }
    .resource-list {
      display: none;
      margin-top: 20px;
    }
    .resource-list h5 {
      color: #495057;
      margin-bottom: 15px;
    }
    .resource-list ul {
      padding-left: 20px;
    }
    .resource-list ul li {
      margin-bottom: 10px;
    }
    .resource-list ul li a {
      text-decoration: none;
      color: #007bff;
    }
    .resource-list ul li a:hover {
      text-decoration: underline;
    }
  </style>
</head>



<body>
  
<main>
  
<div class="container">
    <h5>Interview Preparation Resources</h5>
    <div class="form-group">
      <label for="resourceSelect">Select a technology:</label>
      <select class="form-control" id="resourceSelect">
        <option value="java">Java</option>
        <option value="python">Python</option>
        <option value="php">PHP</option>
        <option value="mern">MERN</option>
      </select>
    </div>

    <div id="resourcesContainer">
      <div id="javaResources" class="resource-list">
        <h5>Java Interview Preparation Resources</h5>
        <ul>
          <li><a href="https://www.javatpoint.com/java-interview-questions">Java Interview Questions - javatpoint</a></li>
          <li><a href="https://www.geeksforgeeks.org/java/">Java Programming - GeeksforGeeks</a></li>
          <li><a href="https://www.tutorialspoint.com/java/index.htm">Java Tutorial - TutorialsPoint</a></li>
        </ul>
      </div>
      <div id="pythonResources" class="resource-list">
        <h5>Python Interview Preparation Resources</h5>
        <ul>
          <li><a href="https://www.javatpoint.com/python-interview-questions">Python Interview Questions - javatpoint</a></li>
          <li><a href="https://www.geeksforgeeks.org/python-programming-language/">Python Programming - GeeksforGeeks</a></li>
          <li><a href="https://www.tutorialspoint.com/python/index.htm">Python Tutorial - TutorialsPoint</a></li>
        </ul>
      </div>
      <div id="phpResources" class="resource-list">
        <h5>PHP Interview Preparation Resources</h5>
        <ul>
          <li><a href="https://www.javatpoint.com/php-interview-questions">PHP Interview Questions - javatpoint</a></li>
          <li><a href="https://www.geeksforgeeks.org/php/">PHP Programming - GeeksforGeeks</a></li>
          <li><a href="https://www.tutorialspoint.com/php/index.htm">PHP Tutorial - TutorialsPoint</a></li>
        </ul>
      </div>
      <div id="mernResources" class="resource-list">
        <h5>MERN Interview Preparation Resources</h5>
        <ul>
          <li><a href="https://www.geeksforgeeks.org/introduction-to-mern-stack/">Introduction to MERN Stack - GeeksforGeeks</a></li>
          <li><a href="https://www.mongodb.com/mern-stack">MERN Stack Tutorial - MongoDB</a></li>
          <li><a href="https://www.freecodecamp.org/news/mern-stack-tutorial/">MERN Stack Tutorial - freeCodeCamp</a></li>
        </ul>
      </div>
    </div>
  </div>

  <!-- Include navbar.php -->
  <?php include 'assets/js_footer.php'; ?>

  <!-- Include jQuery and Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>
    $(document).ready(function() {
      // Show the default resource (Java)
      $('#resourceSelect').val('java');
      $('#javaResources').show();
      
      // Handle the dropdown change event
      $('#resourceSelect').change(function() {
        $('.resource-list').hide();
        var selectedResource = $(this).val();
        if (selectedResource) {
          $('#' + selectedResource + 'Resources').show();
        }
      });
    });
  </script>

  </main>
</body>




<!-- Include navbar.php -->
<?php include 'assets/js_footer.php'; ?>
</html>