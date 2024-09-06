<?php
include('../dbconnect.php');

if (isset($_GET['job_id'])) {
    $job_id = $_GET['job_id'];

    // Prepare and bind
    $stmt = $conn->prepare("DELETE FROM jobs WHERE job_id = ?");
    $stmt->bind_param("i", $job_id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>alert('Job deleted successfully!');
        window.location.href='manage_jobs.php';</script>";
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
