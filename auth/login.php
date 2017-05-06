<head>
    <link href="../main.css" type="text/css" rel="stylesheet">
    <script src="../js/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="../js/main.js" type="text/javascript"></script>
</head>

<div class="ls-background">

<?php
    if($_POST['submit']){
        require_once 'connect.php';

        $username = htmlentities($_POST['username']);
        $password = sha1(htmlentities($_POST['password']));

        $db_query = "SELECT * FROM users WHERE Username = '$username' and Password = '$password'";

        $result = $conn->query($db_query);

        if ($result->num_rows > 0) {
            $row = $result -> fetch_assoc()

            session_start();

            $_SESSION['userID'] = $row['ID'];
            $_SESSION['usertype'] = $row['UserType'];
            $_SESSION['username'] = $row['Username'];
            $_SESSION['firstName'] = $row['FirstName'];
            $_SESSION['email'] = $row['Email'];

            header('Location: ../home.php');
        }
    }
?>

<!--Login form-->
<div class="login-signup-wrapper">
    <a href="#" class="login-button"><button>Login</button></a>
    <a href="#" class="register-button"><button>Register</button></a>

    <form class="login-form" action="login.php" method="POST"><br>
        <a href="#" class="close-modal-login">X</a>
        <h2 class="login-text">Login</h2>

        <input type="username" required name="username" placeholder="Username"><br>

        <input type="password" required name="password" placeholder="Password"><br>

        <a class="register-text" href="signup.php" target="_blank">Register</a>

        <input type="submit" name="submit" value="Go go go!">
    </form>

    <form class="signup-form" action="signup.php" method="POST">
        <a href="#" class="close-modal-signup">X</a>
        <h2 class="signup-text">Sign Up</h2>

        <h5 class="signupchat">Pick a fabulous username!</h5>
        <input type="username" name="username" required placeholder="Username"><br>

        <h5 class="signupchat">What's your electronic mail address?</h5>
        <input type="email" name="email" required placeholder="Email"><br>

        <h5 class="signupchat">My first name is James. What's yours?</h5>
        <input type="firstName" name="firstName" required placeholder="First Name"><br>

        <h5 class="signupchat">My surname is Bond, I told you my first name, Bond.</h5>
        <input type="lastName" name="lastName" required placeholder="Last Name"><br>

        <h5 class="signupchat">Pick a password. Don't tell anyone, ovbs!</h5>
        <input type="password" name="password" required placeholder="Password"><br>

        <h4 class="signupchat">Are you a Creator or Location owner?</h4>
        <input type="radio" name="usertype-c" value="Creator">Creator<br>
        <input type="radio" name="usertype-l" value="Location">Location<br>

        <a class="login-text" href="login.php" target="_blank">Login</a>

        <input type="submit" name="submit" value="Register">
    </form>

</div>
