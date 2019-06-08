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

               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "UtilisateursNomDeFamille" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "UtilisateursMotDePasse" class = "box" /><br/><br />
<<<<<<< HEAD
                  <input type = "submit" value = " Submit "/><br>
=======
                  <img src="captcha.php">

                  <input type = "submit" value = " Submit "/><br />
>>>>>>> 22ef5811d68da6b0ea97295ff8ff4e5e5925c20d
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
