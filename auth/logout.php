<?php
    session_start();
    session_destroy();
    header("Location: /myrecce/myrecce_root/index.php");
?>
