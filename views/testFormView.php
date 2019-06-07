<<<<<<< HEAD
	<?php


	require_once("config.php");
=======
	<?php /*
	require_once "config.php";
>>>>>>> 0091e984b66034cf4045774d999125b2795c8ae5
	$sql = "INSERT INTO `utilisateurs`(`UtilisateursNomDeFamille`) VALUES (".nom")";
	/*
	if ($link->query($sql) === TRUE) {
	echo "New record created successfully";
		}
	else {
	echo "Error: " . $sql . "<br>" . $link->error;
	}
<<<<<<< HEAD
	*/
     ?>
=======
     */?>
>>>>>>> 0091e984b66034cf4045774d999125b2795c8ae5


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
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
				   <form action="./views/config.php" method="POST">
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
