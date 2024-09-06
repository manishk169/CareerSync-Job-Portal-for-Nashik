<?php
session_start();

include('../dbconnect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cmpemail = $_POST["email"];
    $pass = $_POST["passwd"];

       
        $sql = "SELECT comp_name, comp_email, password FROM company WHERE comp_email = '$cmpemail'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $company_name = $row["comp_name"];

        if($result->num_rows == 1 && $cmpemail == $row['comp_email'] && password_verify($pass, $row['password']))
        {
            $_SESSION["user_id"] = $row['comp_id'];
            $_SESSION["user_email"] = $row['comp_email'];
            
           //set session variable
            $_SESSION['username'] = $cmpemail ;
            $_SESSION['comp_name'] = $company_name;
            header("Location: post_job.php");
        }
        else
        {
           echo "<script>alert('Invalid Email or Password');
            window.location.href='comp_login_form.php';</script>";
                     
        }
}

// Close MySQL connection
$conn->close();
?>
