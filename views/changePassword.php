<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href='../public/vendor/css/bootstrap.css'>
        <title>Espace Membre</title>
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
                        <h2>Changement du mot de passe</h2>
                        <form action="?page=member" method="post">
                            <div class="form-group">
                                <label>Mot de passe :</label>
                                <input type="text" name="newmdp1" placeholder="Mot de passe" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Confirmation - mot de passe :</label>
                                <input type="password" name="newmdp2" placeholder="Confirmation du mot de passe" class="form-control" />
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="submit" value="Valider">
                                <a href="?page=member"<button type="button" class="btn btn-primary" name="retour">Retour</button></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
