<?php
  require_once 'auth/connect.php';

  session_start();

  $action = $_POST['action'];
  switch($action){
    case 'add' : addFavourite($conn);break;
    case 'remove' : removeFavourite($conn);break;
    case 'view' : findUserFavourites($conn);break;
  }

  function addFavourite($conn){
    $recceID = $_POST['recceID'];
    $userID = $_SESSION['userID'];
    $valid = true;

    $db_query = "SELECT favID FROM favourites WHERE `userID` = '$userID' AND `recceID` = '$recceID'";
    $result = $conn->query($db_query);

    if ($result->num_rows > 0) {
      $valid = false;
    }

    if($valid){
      $db_query = "INSERT INTO `favourites` (`favID`, `userID`, `recceID`) VALUES (NULL, '$userID', '$recceID')";
      $conn->query($db_query);
    }
  }

  function removeFavourite($conn){
    $recceID = $_POST['recceID'];
    $userID = $_SESSION['userID'];

    $db_query = "DELETE FROM `favourites` WHERE `favourites`.`recceID` = '$recceID' AND `favourites`.`userID` = '$userID'";
    $result = $conn->query($db_query);
  }

  function findUserFavourites($conn){
    $userID = $_SESSION['userID'];

    $db_query = "SELECT recceID FROM favourites WHERE `userID` = '$userID'";
    $result = $conn->query($db_query);

    $jsonobject = array();
    while($row = $result->fetch_assoc())
    {
        $jsonobject[] = $row;
    }

    echo json_encode($jsonobject);
  }
?>
