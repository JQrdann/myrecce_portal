<?php
    session_start();

    if(!(isset($_SESSION['usertype']))){
        header("Location: /myrecce/myrecce_root/index.php");
    }

    require_once 'auth/connect.php';

    $id = htmlentities($_POST['id']);

    $query =  "SELECT * FROM recces WHERE `id` = '$id'";

    $result = $conn->query($query);

    $jsonobject = array();
    while($row = $result->fetch_assoc())
    {
        $jsonobject[] = $row;
    }

    //return json object
    echo json_encode($jsonobject);
?>
