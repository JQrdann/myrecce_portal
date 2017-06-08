<?php
    session_start();

    if(!(isset($_SESSION['usertype']))){
        header("Location: /myrecce/myrecce_root/index.php");
    }

    require_once 'auth/connect.php';

    $count = $_POST['count'];
    $limit = $count+50;
    $limit = "$count, $limit";

    //placeholder limit, implement top lines
    //$limit = "50";

    $title = htmlentities($_POST['title']);

    $query =  "SELECT * FROM recces WHERE `Name` LIKE '%$title%' ORDER BY id DESC LIMIT $limit";

    $result = $conn->query($query);

    $jsonobject = array();
    while($row = $result->fetch_assoc())
    {
        $jsonobject[] = $row;
    }

    //return json object
    echo json_encode($jsonobject);
?>
