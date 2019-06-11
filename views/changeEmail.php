<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href='../public/vendor/css/bootstrap.css'>
        <title>Espace membre</title>
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
                        <h2>Changement d'Email</h2>
                            <form action="?page=member" method="post">
                                <div class="form-group">
                                    <label>Mail :</label>
                                    <input type="text" name="newmail" placeholder="Mail" value="<?php echo $user['mail']; ?>" class="form-control" />
                                </div>
                            </form>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="submit" value="Valider">
                            <a href="?page=member"<button type="button" class="btn btn-primary" name="retour">Retour</button></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
