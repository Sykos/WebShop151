<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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
                    <h2>Mes commandes</h2>
                </div>
            </div>
        </div>
    </body>
</html>
