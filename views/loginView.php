<?php
   include("config.php");
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
<<<<<<< HEAD:views/login.php
      // USERNAME AND PASSWORD SENT FROM FORM
=======
      // username and password sent from form
>>>>>>> 0091e984b66034cf4045774d999125b2795c8ae5:views/loginView.php

      $myusername = mysqli_real_escape_string($db,$_POST['UtilisateursNomDeFamille']);
      $mypassword = mysqli_real_escape_string($db,$_POST['UtilisateursMotDePasse']);

      $sql = "SELECT id FROM utilisateurs WHERE UtilisateursNomDeFamille = '$myusername' and UtilisateursMotDePasse = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];

      $count = mysqli_num_rows($result);

<<<<<<< HEAD:views/login.php
      // IF RESULT MATCHED $MYUSERNAME AND $MYPASSWORD, TABLE ROW MUST BE 1 ROW
=======
      // If result matched $myusername and $mypassword, table row must be 1 row
>>>>>>> 0091e984b66034cf4045774d999125b2795c8ae5:views/loginView.php

      if($count == 1) {
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;

         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
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
                  <input type = "submit" value = " Submit "/><br />
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