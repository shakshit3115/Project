<?php
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['valid'])) {
    header("Location: nlogin.php");
    exit();
}

// Handle logout
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: nlogin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
    <title>Welcome to Smart City Dashboard</title>

    <script>
        <?php
        // Only enable back button functionality if the user is logged out
        if (!isset($_SESSION['valid'])) {
            echo 'history.pushState(null, null, location.href);';
            echo 'window.onpopstate = function () { history.go(1); };';
        }
        ?>
    </script>

</head>

<body>

    <div class="navigation-box">
        <div>
            <img src="images/img.jpg" class="logo"><b>SMART CITY</b>
        </div>
        <div class="navbar">
            <ul>
                <li><a href="report.php">REPORT PROBLEM</a></li>
                <li><a href="loc.php">LOCATION</a></li>
                <li><a href="job.php">JOB PROFILE</a></li>
                <li><a href="about.php">ABOUT</a></li>
                <li><a href="sugg.php">SUGGESTION</a></li>
            </ul>
        </div>
        <div>
            <img src="images/icon.png" class="icon">
        </div>
    </div>

    <div class="square">
        <div class="box1">Total Problems Submitted</div>
        <div class="box2"> Solved Problems</div>
        <div class="box3">Job Uploaded</div>
        <div class="box4"> Live Vacancy</div>
    </div>
        <div>
            <img src="images/shakshi.jpeg" class="img1">
            <b>Shakshi Singh</b>
        </div>
        <div>
            <img src="images/aazad.jpeg" class="img1">
            <p>Tiwari Aazad Pramod</p>
        </div>
        <div>
            <img src="images/shashank.jpeg" class="img1">
            <p>Shashank Singh</p>
        </div>
    <footer>
        <div class="footer-content">
            <p>&copy; 2023</p>
        </div>
    </footer>

</body>

</html>