<?php
    $page = 'My Account';
    include('includes/header.php')
?>

<div class="myaccount-content">
    <div class="accountinfo">
        <h3>Edit Profile</h3>
        <div class="change-usernameemail">
            <form action="updateaccount.php" method="post">
                <p>Username</p>
                <input type="?" placeholder="<?php echo $_SESSION['username']?>" name="?">
                <p>Email</p>
                <input type="?" placeholder="<?php echo $_SESSION['email']?>" name="?">
            </form>
        </div>
        <div class="change-name">
            <form action="updateaccount.php" method="post">
                <p>Name</p>
                <input type="?" placeholder="<?php echo $_SESSION['firstName']?>" name="?">
                <input type="?" placeholder="<?php echo $_SESSION['lastName']?>" name="?">
            </form>
        </div>
        <div class="change-password">
            <form action="updateaccount.php" method="post">
                <input type="password" placeholder="Old Password" name="oldPassword"><br>
                <input type="password" placeholder="New Password" name="newPassword"><br>
                <input type="password" placeholder="Confrim New Password" name="confirmNewPassword"><br>
                <input type="submit" name="submit" value="Change Password">
            </form>
        </div>
    </div>
</div>

</main>
</body>
</html>
