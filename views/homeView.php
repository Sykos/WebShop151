<!DOCTYPE html>
<html lang="en" dir="ltr">

<!-- VA RÉCUPÉRER LES DONNÉS DANS LE CONTROLLER DE LA VUE -->

 <head>
   <meta charset="utf-8">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title><?php echo $this->aContent['pageTitle']; ?></title>
    <?php
    //CHARGE TOUTES LES PAGES JS

    foreach($this->aContent['js'] as $sJsPath)
    {
      echo "<script src='".$sJsPath."'></script>";
    }

    //CHARGE TOUTES LES PAGES CSS
    foreach($this->aContent['css'] as $sCssPath)
    {
        echo "<link rel='stylesheet' href='".$sCssPath."'>";
    }

    ?>
  </head>
  <body>
    <?php
        //APPEL DE TOUTES LES PARTIES DE LA PAGE
        require_once('./templates/header.php');
        require_once('./templates/nav.php');
        require_once('./templates/homeBody.php');
        require_once('./templates/footer.php');
    ?>
  </body>
</html>
