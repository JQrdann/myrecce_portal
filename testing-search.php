<?php

session_start();

$filter = $_GET['f'];

$con = new mysqli('localhost', 'root', 'root', 'myrecce');

//default
$query = "SELECT * FROM recces";

if($filter == 'Name'){

    $query = "SELECT * FROM recces WHERE `Name` LIKE '$_GET[s]%'";

    if($_GET[t] != ''){
        $type = "AND `Type` LIKE '$_GET[t]'";
    }

    $query = $query . $addition;

}else if($filter == 'Submitter'){
  $query = "SELECT * FROM recces WHERE `Submitter` LIKE '$_GET[s]'";
}

$data=$con->query($query);
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
