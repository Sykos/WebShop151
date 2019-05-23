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
    <?php
      require_once('./templates/header.php');
      require_once('./templates/nav.php');
     ?>

     <!-- INSERT BODY -->

     <?php require_once('./templates/footer.php'); ?>

  </body>
</html>
