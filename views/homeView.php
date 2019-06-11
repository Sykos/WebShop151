<!DOCTYPE html>
<html lang="en" dir="ltr">

<!-- VA RÉCUPÉRER LES DONNÉS DANS LE CONTROLLER DE LA VUE -->

 <head>
   <meta charset="utf-8">
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
      <div class="container-fluid">
          <div class="row">
              <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                  <?php require_once './templates/header.php'; ?>
              </div>
          </div>
          <div class="row">
              <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                  <?php require_once './templates/nav.php'; ?>
              </div>
          </div>
          <div class="row">
              <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                  <?php require_once './templates/homeBody.php'; ?>
              </div>
          </div>
          <div class="row">
              <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                  <?php require_once './templates/footer.php'; ?>
              </div>
          </div>
      </div>
  </body>
</html>
