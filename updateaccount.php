<?php
    require('auth/connect.php');

    session_start();

    if(!(isset($_SESSION['usertype']))){
        header("Location: /myrecce/myrecce_root/index.php");
    }

    $new = sha1($_POST['newPassword']);
    $conf = sha1($_POST['confirmNewPassword']);

    echo $_SESSION['userType'] . $new;

    /*
    if($new == $conf){
        $query = "UPDATE users SET Password = $new WHERE id = $_SESSION['userID']";
        echo $query;
        mysqli_query($db_connect, $query);
    }*/
    //header('Location: myaccount.php')
?>
