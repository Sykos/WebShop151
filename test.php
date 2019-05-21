<?php
// Include config file
require_once "config.php";

$toto = "INSERT INTO `utilisateurs`(`UtilisateursPrenom`) VALUES ('toto')";

mysqli_stmt_execute($toto);

?>