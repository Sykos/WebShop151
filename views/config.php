<?php
// Include config file

$hostname = "127.0.0.1:49386";
$username = "azure";
$password = "X6#vWHD_$";
$db = "raclettev2";

$dbconnect=mysqli_connect($hostname,$username,$pass,$db);

if ($dbconnect->connect_error) {
  die("Database connection failed: " . $dbconnect->connect_error);
}

if(isset($_POST['submit'])) {
  $nom=$_POST['nom'];
  $prenom=$_POST['prenom'];
  $mail=$_POST['mail'];
  $pass=$_POST['pass'];

    $query = "INSERT INTO `utilisateurs` (`UtilisateursNomDeFamille`, `UtilisateursPrenom`) VALUES ('" . $nom."', '" . $prenom . "')";
	
	die($query);
}
?>
