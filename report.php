<!-- report.php -->
<html>
<head>
    <title>Report</title>
    <link rel="stylesheet" type="text/css" href="css/report.css">
</head>
<body>
    <a href="dashboard.php"><i class="arrow left"></i><u>Return to Home</u></a>
    <center>
        <form class="container" action="process_problems.php" method="post">
            <h1>Generate A Problem</h1>
            <!-- Your form fields go here -->
            <input type="text" name="address" placeholder="Address" required><br>
            <input type="text" name="problemType" Placeholder="Problem Type" required><br>
            <textarea name="problemDescription" rows="auto" col="10" required Placeholder="describe your problem"></textarea><br>
            <input type="submit" value="Submit" class="subbutton">
            <input type="reset" value="Reset" class="rebutton">
            <br><br>
            <BR>
            Want To Track Your Problem?<a href="track_problem.php">Track Problem</a>
        </form>
    </center>
</body>
</html>
