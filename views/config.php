<?php
// Include config file

$hostname = "127.0.0.1:49386";
$username = "azure";
$password = "6#vWHD_$";
$db = "raclettev2";

$dbconnect=mysqli_connect($hostname,$username,$password,$db);

if ($dbconnect->connect_error) {
  die("Database connection failed: " . $dbconnect->connect_error);
}

if(isset($_POST['submit'])) {
  $nom=$_POST['nom'];
  $prenom=$_POST['prenom'];
  $mail=$_POST['mail'];
  $pass=$_POST['password'];

    $query = "INSERT INTO utilisateurs (UtilisateursNomDeFamille, UtilisateursPrenom, UtilisateursEmailVerifiee, UtilisateursMotDePasse)
    VALUES ('$nom', '$prenom', '$mail', '$pass')";
	
	   if (!mysqli_query($dbconnect, $query)) {
        die('An error occurred when submitting your review.');
    } else {
      echo "Thanks for your review.";
    }
}
?>
