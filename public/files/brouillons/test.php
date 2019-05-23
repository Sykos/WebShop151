<?php
// Include config file
require_once "config.php";

$toto = "INSERT INTO `utilisateurs`(`UtilisateursPrenom`) VALUES ('toto')";

if ($link->query($toto) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $toto . "<br>" . $link->error;
}

?>