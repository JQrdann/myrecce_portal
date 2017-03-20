<?php
        require_once 'auth/connect.php';

        session_start();

        $name = htmlentities($_POST['name']);
        $association = htmlentities($_POST['association']);
        $description = htmlentities($_POST['description']);
        $type = htmlentities($_POST['type']);
        $address_line1 = htmlentities($_POST['address-line1']);
        $address_line2 = htmlentities($_POST['address-line2']);
        $city = htmlentities($_POST['city']) ;
        $region = htmlentities($_POST['region']);
        $postcode = htmlentities($_POST['postal-code']);
        $country = htmlentities($_POST['country']);
        $pics = array('pic1','pic2','pic3','pic4','pic5','pic6');
        $features = htmlentities($_POST['features']);
        $features = implode(",", $features);
        $price = htmlentities($_POST['price']);
        $extras = htmlentities($_POST['extras']);
        $extras = implode(", ", $extras);
        $submitter = $_SESSION['username']);
        $owner = htmlentities($_POST['owner-name']);

        $valid = true;

        $target_dir = 'users/'.$_SESSION['username'].'/'.'uploads/';

        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $i = 0;

        foreach($pics as $picture){
            $target_file = $target_dir . basename($_FILES[$picture]["name"]);

            $pics[$i] = $target_file;
            $i = $i + 1;

            if (move_uploaded_file($_FILES[$picture]["tmp_name"], $target_file)) {
                echo "The file ". basename($_FILES[$picture]["name"]). " has been uploaded. <br>" ;
            } else {
                echo "Sorry, there was an error uploading the file: " . basename( $_FILES[$picture]["name"]);
            }
        }

        if($valid){
            $db_query = "INSERT INTO `recces` (`Name`, `Association`, `Description`, `Type`, `AddressLine1`, `AddressLine2`, `City`, `State/County`, `Zip/Postcode`, `Country`, `Photo1`, `Photo2`, `Photo3`, `Photo4`, `Photo5`, `Photo6`, `Location Features`, `Price`, `Extras`, `Submitter`, `Owner`) VALUES ('$name', '$association', '$description', '$type', '$address_line1', '$address_line2', '$city', '$region', '$postcode', '$country', '$pics[0]', '$pics[1]', '$pics[2]', '$pics[3]', '$pics[4]', '$pics[5]', '$features', '$price', '$extras', '$submitter', '$owner')";

            if ($conn->query($sql) === TRUE) {
                echo 'Recce creates successfully!';
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

?>
