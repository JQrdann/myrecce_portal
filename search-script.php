<?php
    session_start();

    if(!(isset($_SESSION['usertype']))){
        header("Location: /myrecce/myrecce_root/index.php");
    }

    require_once 'auth/connect.php';

    $action = $_POST['action'];
    switch($action){
      case 'search' : search($conn);break;
      case 'favourites' : favourites($conn);break;
    }

    function search($conn){
      $count = $_POST['count'];
      $limit = $count+50;
      $limit = "$count, $limit";

      $title = htmlentities($_POST['title']);

      $query =  "SELECT * FROM recces WHERE `Name` LIKE '%$title%' ORDER BY id DESC LIMIT $limit";

      $result = $conn->query($query);

      returnData($result);
    }

    function favourites($conn){
      $userID = $_SESSION['userID'];
      $query = "SELECT recceID FROM favourites WHERE `userID` = '$userID'";

      $result = $conn->query($query);

      if ($result->num_rows > 0) {
        for ($i = 0; $i < $result->num_rows; $i++) {
          $row = $result->fetch_assoc();

          $id = $row['recceID'];

          $query = "SELECT * FROM recces WHERE `ID` = '$id' ORDER BY id DESC";

          $result = $conn->query($query);
        }
        returnData($result);
      }else{
        echo 'No favourites found';
      }
    }

    function returnData($result){
      $jsonobject = array();
      while($row = $result->fetch_assoc()){
          $jsonobject[] = $row;
      }
      echo json_encode($jsonobject);
    }

?>
