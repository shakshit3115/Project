<?php
session_start();
include("php/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the user is logged in
    if (isset($_SESSION['valid'])) {
        $userId = $_SESSION['id'];
    } else {
        // Handle the case where the user is not logged in
        // For now, let's set a default value
        $userId = 0;
    }

    $address = mysqli_real_escape_string($con, $_POST['address']);
    $problemType = mysqli_real_escape_string($con, $_POST['problemType']);
    $problemDescription = mysqli_real_escape_string($con, $_POST['problemDescription']);

    // Generate a tracking ID
    $trackingId = 'TRACK' . substr(md5(uniqid()), 0, 8);

    // Insert the problem into the database
    $insertQuery = "INSERT INTO problems (user_id, address, problem_type, problem_description, tracking_id) 
                    VALUES ('$userId', '$address', '$problemType', '$problemDescription', '$trackingId')";
    mysqli_query($con, $insertQuery) or die("Error occurred");

    // You may redirect the user or show a success message
    echo "<script>alert('Problem submitted successfully. Your tracking ID is: $trackingId');</script>";
    echo "<script>window.location.href='dashboard.php';</script>";
}
?>
