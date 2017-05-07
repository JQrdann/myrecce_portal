<?php
    $page = 'My Account';
    include('includes/header.php')
?>

<div class="myaccount-content">
    <div class="accountinfo">
        <h3>Edit Profile</h3>
        <div class="change-usernameemail">
            <form action="updateaccount.php" method="post">
                <div class='change-username'>
                  <p>Username</p>
                  <input class="form-control" type="?" value="<?php echo $_SESSION['username']?>" name="?">
                </div>
                <div class='change-email'>
                  <p>Email</p>
                  <input class="form-control" type="?" value="<?php echo $_SESSION['email']?>" name="?">
                </div>
            </form>
        </div>
        <div class="change-name">
            <form action="updateaccount.php" method="post">
                <p>Name</p>
                <input class="form-control" type="?" value="<?php echo $_SESSION['firstName']?>" name="?">
                <input class="form-control" type="?" value="<?php echo $_SESSION['lastName']?>" name="?">
            </form>
        </div>
        <div class="change-password">
            <form action="updateaccount.php" method="post">
                <input class="form-control" type="password" placeholder="Old Password" name="oldPassword"><br>
                <input class="form-control" type="password" placeholder="New Password" name="newPassword"><br>
                <input class="form-control" type="password" placeholder="Confrim New Password" name="confirmNewPassword"><br>
                <input class="form-control-button" type="submit" name="submit" value="Change Password">
            </form>
        </div>
    </div>
</div>

</main>
</body>
</html>
