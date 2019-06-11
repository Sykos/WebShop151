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
                  <div class="wrapper">
                      <h2>Login</h2>
                      <p>Entrez vos informations pour vous connecter</p>
                      <form action = "?page=login" method = "post">
                          <div class="form-group <?php echo(!empty($usernameErr)) ? 'has-error' : ''; ?>">
                              <label>Nom d'utilisateur : </label>
                              <input type = "text" name = "username" class = "form-control" value="<?php if($username != ''{echo $username;} ?>"/>
                              <span class="help-block"><?php if($usernameErr != ''){echo $usernameErr;} ?></span>
                          </div>
                          <div class="form-group <?php echo(!empty($passwordErr)) ? 'has-error' : '' ?>">
                              <label>Mot de passe : </label>
                              <input type = "password" name = "password" class = "form-control"/>
                              <span class="help-block"><?php if($passwordErr != ''){echo $passwordErr;} ?></span>
                          </div>
                          <div class="form-group">
                            <input type = "submit" class="btn btn-primary" name="submit" value = "Login"/>
                          </div>
                      </form>
                  </div>
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
