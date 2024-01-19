<?php
session_start();
include("php/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Query the database to check admin credentials
    $query = "SELECT * FROM admins WHERE username='$username' AND password='$password'";
    $result = mysqli_query($con, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            // Valid admin login
            $_SESSION['admin'] = $username;
            header("Location: admin_dashboard.php");
            exit();
        } else {
            // Invalid admin login
            echo "Invalid username or password. <a href='admin_login.php'>Go back</a>";
        }
    } else {
        echo "Error occurred while querying the database.";
    }
}
?>
