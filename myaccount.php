<?php
    $page = 'My Account';
    include('includes/header.php')
?>
        <div class='profile-picture'>
        </div>

        <div class='myaccount'>
          <h3 class="myaccount-title">Hi, <?php echo $_SESSION['firstName']?>!</h3>

          <div class="myaccount-content">
            <p>This page will display information about the user and give them the ability to change certain items.</p>

            <div class='editprofile-box'>

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
