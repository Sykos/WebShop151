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
    <?php require_once './templates/header.php'; ?>
    <?php require_once './templates/nav.php'; ?>
    <form class='' action='?page=signIn' method='post'>
      Titre:
      <select name='titre'>
        <option>M.</option>
        <option>Mme</option>
      </select>
      <br>
      Nom: <input type='text' name='nom' required>
      <br>
      Prénom: <input type='text' name='prenom' required>
      <br>
      Date de naissance: <input type='text' name='dateOfBirth' required>
      <br>
      E-mail: <input type='text' name='email' required>
      <br>
      Nom d'utilisateur: <input type='text' name='username' required>
      <br>
      Mot de Passe: <input type='password' name='password' required>
      <br>
      <input type='checkbox' name='legalAgreement'>J'accepte les mentions légales ta mère la pute <br>
      <input type='submit' name='submit' value='Inscription'>

    </form>
    <?php require_once './templates/footer.php'; ?>


  </body>
</html>
