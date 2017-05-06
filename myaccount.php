<?php
    $page = 'My Account';
    include('includes/header.php')
?>

<div class="myaccount-content">
    <div class="accountinfo">
        <h3>Edit Profile</h3>
        <div class="change-name">
            <form action="updateaccount.php" method="post">
                <input type="?" placeholder="<?php echo $_SESSION['firstName']?>" name="?"><br>
                <input type="?" placeholder="Surname" name="?"><br>
                <input type="submit" name="submit" value="Change Name">
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
