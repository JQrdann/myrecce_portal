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
                  <input class="form-control-ii" type="?" value="example@example.com" name="?"><br>
                </div>
        </div>
        <div class="change-firstlastname">
            <div class="change-firstname">
                <p>First name</p>
                <input class="form-control-ii" type="?" value="<?php echo $_SESSION['firstName']?>" name="?">
            </div>
            <div class="change-lastname">
                <p>Last name</p>
                <input class="form-control-ii" type="?" value="Jones" name="?"><br>
            </div>
        </div>
        <div class="change-fulladdress">
            <div class="change-address">
                <p>Address</p>
                <input class="form-control-iii" type="?" value="123 Example Lane" name="?">
            </div>
            <div class="change-city">
                <p>City</p>
                <input class="form-control-iiii" type="?" value="London" name="?">
            </div>
            <div class="change-country">
                <p>Country</p>
                <input class="form-control-iiii" type="?" value="United Kingdom" name="?">
            </div>
            <div class="change-postcode">
                <p>Postcode</p>
                <input class="form-control-iiii" type="?" value="AB1 2CD" name="?">
            </div>
        <div class="changeinfo-button">
            <input class="form-control-button" type="submit" name="submit" value="Update information">
            </form>
        </div>
        </div>
    </div>
    <div class="accountpass">
        <h3>Change Password</h3>
        <div class="change-password">
            <form action="updateaccount.php" method="post">
                <input class="form-control-pass" type="password" placeholder="Old Password" name="oldPassword"><br>
                <input class="form-control-pass-ii" type="password" placeholder="New Password" name="newPassword">
                <input class="form-control-pass-ii" type="password" placeholder="Confrim New Password" name="confirmNewPassword"><br>
                <input class="form-control-passbutton" type="submit" name="submit" value="Change Password">
            </form>
        </div>
    </div>
</div>

</main>
</body>
</html>
