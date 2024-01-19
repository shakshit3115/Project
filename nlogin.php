<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/nlogin.css">
    <title>Welcome to Smart City</title>
</head>

<body>
    <div class="container">
        <div class="box">
            <?php
                include("php/config.php");
                if(isset($_POST['submit'])){
                    $email = mysqli_real_escape_string($con, $_POST['email']);
                    $pw = mysqli_real_escape_string($con, $_POST['pw']);
                    $hashedPassword = md5($pw);
                    $query = "SELECT * FROM users WHERE Email='$email' AND Password='$hashedPassword'";
                    $result = mysqli_query($con, $query) or die("error occurred");
                    $row = mysqli_fetch_assoc($result);

                    if(is_array($row) && !empty($row)){
                        $_SESSION['valid'] = $row['Email'];
                        $_SESSION['username'] = $row['Username'];
                        $_SESSION['mob'] = $row['Mob'];
                        $_SESSION['id'] = $row['Id'];
                        header("Location: dashboard.php");
                        exit();
                    } else {
                        echo "<div class='message'>
                             <p>Wrong Email or Password</p>
                             </div> <br>";
                        echo "<a href='nlogin.php'><button class='btn'>Go Back</button></a>";
                    }
                }
            ?>
            <div class="login-box">
                <center><h1>Go Urban!</h1></center>
                <form action="" method="post" class="login-form">
                    <input type="text" class="input-field" placeholder="Email" required name="email">
                    <br>
                    <input type="password" class="input-field" placeholder="Password" required name="pw">
                    <br>
                    <br>
                    <center><button type="submit" name="submit" class="signin-button">Sign In</button><br>
                    <a href="forgot.html">Forgot Password</a></center>
                </form>
                <br>
                <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
            </div>
        </div>
        <div id="box2">
            <center><h1>Welcome to Smart City</h1></center>
            <p>A smart city is a municipality that uses information and communication technologies (ICT) to increase
                operational efficiency, share information with the public and improve both the quality of government
                services and citizen welfare.</p>
        </div>
    </div>
</body>

</html>
