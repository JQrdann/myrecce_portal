<?php
    if($_POST['submit']){
        require_once 'connect.php';

        $username = htmlentities($_POST['username']);
        $email = htmlentities($_POST['email']);
        $firstname = htmlentities($_POST['firstName']);
        $lastname = htmlentities($_POST['lastName']);
        $password = sha1(htmlentities($_POST['password']));
        $usertype = htmlentities($_POST['usertype']);
        $valid = true;

        $db_query = "SELECT * FROM users WHERE Username = '$username'";

        $db_result = $conn->query($db_query);

        if($db_result->num_rows > 0){
            echo "Username taken";
            $valid = false;
        }

        $db_query = "SELECT * FROM users WHERE Email = '$email'";

        $db_result = $conn->query($db_query);

        if($db_result->num_rows > 0){
            echo "There is already an account with this email<br>If you have forgotton your password, please follow this link <a href='forgot.php'>I forgot</a>";
            $valid = false;
        }

        if($valid){
            $db_query = "INSERT INTO `users` (`Username`, `Email`, `FirstName`, `LastName`, `Password`, `UserType`) VALUES ('$username', '$email', '$firstname', '$lastname', '$password', '$usertype')";

            if ($conn->query($sql) === TRUE) {
                echo 'Registration completed <a href="login.php">login</a>';
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
?>
<form action="signup.php" method="POST">
    <input type="text" name="username" required placeholder="Username"><br>
    <input type="email" name="email" required placeholder="Email"><br>
    <input type="text" name="firstName" required placeholder="First Name"><br>
    <input type="text" name="lastName" required placeholder="Last Name"><br>
    <input type="password" name="password" required placeholder="Password"><br>
    <input type="radio" name="usertype" value="Creator" checked>Creator<br>
    <input type="radio" name="usertype" value="Location">Location<br>
    <input type="submit" name="submit" value="Register">
</form>
