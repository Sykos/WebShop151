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
  $nom=$_POST['name'];
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

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
		<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <title><?php echo $this->aContent['pageTitle']; ?></title>
    <?php
    //CHARGE TOUTES LES PAGES CSS
    foreach($this->aContent['css'] as $sCssPath) {
      echo "<link rel='stylesheet' href='".$sCssPath."'>";
    }
    //CHARGE TOUTES LES PAGES JS
    foreach($this->aContent['js'] as $sJsPath){
      echo "<script src='".$sJsPath."'></script>";
    }
     ?>
	
  </head>
  <body>
	
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                  <?php require_once('./templates/header.php'); ?>
              </div>
          </div>
          <div class="row">
              <div class="col-md-12">
                  <? require_once('./templates/nav.php'); ?>
              </div>
          </div>

          <div class="row">
              <div class="col-md-12">
                  <!-- INSERT BODY -->
                  <form class="testForm" action="index.html" method="get">
                      Nom: <input type="text" name="nom" value="">
                      Prénom: <input type="text" name="prenom" value="">
                      E-mail: <input type="text" name="mail" value="">
                      Mot de Passe : <input type="password" name="pass" value="">
                      <input type="submit" name="submit" value="">
                  </form>
              </div>
          </div>

          <div class="row">
              <div class="col-md-12">
                 <?php require_once('./templates/footer.php'); ?>
              </div>
          </div>

      </div>









  </body>
</html>
