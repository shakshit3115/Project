<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/sign-up.css">

    <title>Sign Up - Smart City</title>
</head>

<body>
    <div class="container">
        <div class="signup-box">
            <?php
            echo "<link rel='stylesheet' type='text/css' href='C:xampp/htdocs/Smartcity/css/sign-up.css'/>";
            include("php/config.php");
            if (isset($_POST['submit'])) {
                $username = $_POST['uname'];
                $email = $_POST['email'];
                $mob_num = $_POST['num'];
                $pw = $_POST['pw'];
                $cpw = $_POST['cpw'];
                $hashedPassword = md5($pw);
                $verify_query = mysqli_query($con, "SELECT Email FROM users WHERE Email='$email' ");

                if (mysqli_num_rows($verify_query) != 0) {
                    echo "<div class='message'>
                             <p>This email is used, Try using another please!</p>
                             </div> <br>";
                    echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
                } else {
                    $insert_query = "INSERT INTO users(Username,Email,Mob,Password) VALUES('$username','$email','$mob_num','$hashedPassword')";
                    if (mysqli_query($con, $insert_query)) {
                        echo "<div class='message'>
                            <p>Registration Successful!</p>
                            </div> <br>";
                        echo "<a href='nlogin.php'><button class='btn'>Login Now</button></a>";
                    } else {
                        echo "Error: " . $insert_query . "<br>" . mysqli_error($con);
                    }
                }
            }
            ?>
            <center>
                <h1>Create an Account</h1>
                <form action="" method="post" class="signup-form">
                    <input type="text" class="input-field" placeholder="Username" required name="uname">
                    <br>
                    <input type="email" class="input-field" placeholder="Email Address" name="email">
                    <br>
                    <input type="text" class="input-field" placeholder="Mobile Number" required pattern="[0-9]{5}[0-9]{5}" name="num">
                    <br>
                    <input type="password" class="input-field" placeholder="Password" required name="pw">
                    <br>
                    <input type="password" class="input-field" placeholder="Confirm Password" required name="cpw">
                    <br>
                    <br>
                    <button type="submit" name="submit" class="signup-button">Sign Up</button>
                </form>
            </center>
        </div>
    </div>
</body>

</html>
