<?php
session_start();
include("php/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $trackingId = mysqli_real_escape_string($con, $_POST['trackingId']);

    $statusQuery = "SELECT status FROM problems WHERE tracking_id='$trackingId'";
    $result = mysqli_query($con, $statusQuery);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            $status = $row['status'];
            echo "Status for Tracking ID $trackingId: $status";
        } else {
            echo "Tracking ID not found.";
        }
    } else {
        echo "Error occurred while querying the database.";
    }
}
?>
