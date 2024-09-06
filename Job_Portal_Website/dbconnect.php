<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "jobportal";

$conn = new mysqli($servername, $username, $password, $database);
//$con = mysqli_connect("localhost","root", "", "jobportal");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

