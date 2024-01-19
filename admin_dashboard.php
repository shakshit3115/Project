<?php
session_start();

// Check if admin is not logged in, redirect to login page
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

// Include the configuration file using absolute path
include(__DIR__ . "/php/config.php");

// Rest of the admin dashboard code here
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/admin_dash.css">
    <title>Admin Dashboard</title>
</head>
<body>
    <div class="container">
    <h1>Admin Dashboard</h1>
    <?php
    // Query all problems
    $query = "SELECT * FROM problems";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<table border='1'>
                <tr>
                    <th>Tracking ID</th>
                    <th>User ID</th>
                    <th>Address</th>
                    <th>Problem Type</th>
                    <th>Problem Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['tracking_id']}</td>
                    <td>{$row['user_id']}</td>
                    <td>{$row['address']}</td>
                    <td>{$row['problem_type']}</td>
                    <td>{$row['problem_description']}</td>
                    <td>{$row['status']}</td>
                    <td><a href='update_status.php?tracking_id={$row['tracking_id']}'>Update Status</a></td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "Error occurred while querying the database.";
    }
    ?>
    </div>
</body>
</html>
