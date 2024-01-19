
<?php
session_start();
include("php/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $trackingId = mysqli_real_escape_string($con, $_POST['tracking_id']);
    $newStatus = mysqli_real_escape_string($con, $_POST['status']);

    // Update the status in the database
    $updateQuery = "UPDATE problems SET status='$newStatus' WHERE tracking_id='$trackingId'";
    mysqli_query($con, $updateQuery) or die("Error occurred");

    // Redirect back to the admin dashboard
    header("Location: admin_dashboard.php");
    exit();
}
?>
