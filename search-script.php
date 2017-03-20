<?php
require_once 'auth/connect.php';

session_start();

$filter = $_GET['f'];
$lim = $_POST['limit'];

//default
$query = "SELECT * FROM recces LIMIT 1,50";
$limit = " LIMIT $lim";

if($filter == 'Name'){

    $query = "SELECT * FROM recces WHERE `Name` LIKE '%$_POST[s]%'";
    $order = " ORDER BY ID DESC";
    $type = '';

    if ($_GET['t'] != '') {
        $type = " AND `Type` LIKE '$_POST[t]'";
    }

    $query .= $type . $order . $limit;

}else if($filter == 'Submitter'){
    $username = $_SESSION['username'];
    $query = "SELECT * FROM recces WHERE `Submitter` LIKE '$username'";
}

$data=$conn->query($query);
while($row=$data->fetch_assoc()){
    $image = $row['Photo1'];
    $title = $row['Name'];
    $desc = $row['Description'];
    $id = $row['ID'];

    echo "
        <a href='recce-view.php?id=$id' class='home-recce-link'><div class='home-recce' style='background-image: url(" . '"' . $image . '"' . "')>
        <div class='home-recce-image'>
        </div>
        <div class='home-recce-title'>
          <h1> $title </h1>
        </div>
        <a href='recce-view.php?id=$id' class='home-recce-overlay-button'><div class='home-recce-overlay'></div></a>
        <div class='home-recce-desc'><p>$desc</p></div>
        </div></a>
    ";
}

?>
