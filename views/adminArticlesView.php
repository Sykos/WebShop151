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
                    <?php
                    //NE FONCTIONNE PAS
                    /*echo $_GET['article'];
                    require_once 'function.php';

                    getArticle($db, 1, $_GET['id']);*/
                    ?>
                    <h1>Gestion des articles</h1>
                    <h2><?php //echo $article->name; ?></h2>
                    <h5><?php //echo $article->content ?></h5>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <?php
                    //NE FONCTIONNE PAS
                    /*if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
                        echo '<div class="row">
                          <a href="delete_article.php"><h5>Supprimer cet article</h5>
                          <a href="modify_article.php"><h5>Modifier cet article</h5>';
                    }*/
                    ?>
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
