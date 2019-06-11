<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang='en' dir='ltr'>
  <head>
    <meta charset='utf-8'>
    <title><?php echo $this->aContent['pageTitle']; ?></title>
    <?php
    //CHARGE TOUTES LES PAGES JS

    foreach($this->aContent['js'] as $sJsPath){
      echo '<script src='.$sJsPath.'></script>';
    }

      //CHARGE TOUTES LES PAGES CSS
      foreach($this->aContent['css'] as $sCssPath) {
        echo '<link rel=stylesheet href='.$sCssPath.'>';
      }
    ?>
  </head>
  <body>
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                  <?php require_once './templates/header.php'; ?>
              </div>
          </div>
          <div class="row">
              <div class="col-md-12">
                  <?php require_once './templates/nav.php'; ?>
              </div>
          </div>
          <div class="row">
              <div class="col-md-12">
                  <div class="wrapper">
                      <h2>Inscription</h2>
                      <p>Insérez vos informations pour créer votre compte</p>
                      <form action="?page=signIn" method="post">
                          <div>
                              <label>Nom : </label>
                              <input type="text" name="nom" class="form-control">
                          </div>
                          <div>
                              <label>Prénom : </label>
                              <input type="text" name="prenom" class="form-control">
                          </div>
                          <div>
                              <label>Date de naissance : </label>
                              <input type="text" name="dateDeNaissance" class="form-control">
                          </div>
                          <div>
                              <label>E-mail : </label>
                              <input type="text" name="email" class="form-control">
                          </div>
                          <div>
                              <label>Nom d'utilisateur : </label>
                              <input type="text" name="username" class="form-control">
                          </div>
                          <div>
                              <label>Mot de passe : </label>
                              <input type="password" name="password" class="form-control">
                          </div>
                          <div>
                              <label>Confirmer mot de passe : </label>
                              <input type="password" name="confirmPassword" class="form-control">
                          </div>
                          <div>
                              <input type="submit" name="submit" value="S'enregistrer" class="btn btn-default">
                          </div>
                      </form>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-md-12">
                  <?php require_once './templates/footer.php'; ?>
              </div>
          </div>
      </div>



  </body>
</html>
