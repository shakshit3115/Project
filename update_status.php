<!-- update_status.php -->
<?php
session_start();
include("php/config.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['tracking_id'])) {
    $trackingId = mysqli_real_escape_string($con, $_GET['tracking_id']);

    
    $query = "SELECT * FROM problems WHERE tracking_id='$trackingId'";
    $result = mysqli_query($con, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            
            echo "<h1>Update Status</h1>";
            echo "<p>Tracking ID: {$row['tracking_id']}</p>";
            echo "<p>User ID: {$row['user_id']}</p>";
            echo "<p>Address: {$row['address']}</p>";
            echo "<p>Problem Type: {$row['problem_type']}</p>";
            echo "<p>Problem Description: {$row['problem_description']}</p>";
            echo "<p>Status: {$row['status']}</p>";

            
            echo "<form action='process_update_status.php' method='post'>
                    <label for='status'>Update Status:</label>
                    <input type='text' id='status' name='status' required>
                    <input type='hidden' name='tracking_id' value='$trackingId'>
                    <button type='submit'>Submit</button>
                  </form>";
        } else {
            echo "Tracking ID not found.";
        }
    } else {
        echo "Error occurred while querying the database.";
    }
}
?>
