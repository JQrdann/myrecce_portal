<?php
    $page = 'My Account';
    include('includes/header.php')
?>

        <div class='myaccount'>
            <div class='editprofile-box'>
                <div class="change-password">
                    <form action="updateaccount.php" method="post">
                        <input type="password" placeholder="Old Password" name="oldPassword"><br>
                        <input type="password" placeholder="New Password" name="newPassword"><br>
                        <input type="password" placeholder="Confrim New Password" name="confirmNewPassword"><br>
                        <input type="submit" name="submit" value="Change Password">
                    </form>
                </div>
            </div>

            <div class='editprofile-box'>

            </div>
          </div>

    </main>
</body>
</html>
