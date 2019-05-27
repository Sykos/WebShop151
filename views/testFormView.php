<?php
// Include config file
require_once "config.php";

$toto = "INSERT INTO `utilisateurs`(`UtilisateursNomDeFamille`) VALUES ('"$nom"')";

if ($link->query($toto) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $toto . "<br>" . $link->error;
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
