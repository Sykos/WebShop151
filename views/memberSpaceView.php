<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
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
        <div align="center">
           <h2>Edition de mon profil</h2>
           <div align="left">
              <form method="POST" action="" enctype="multipart/form-data">
                 <label>Pseudo :</label>
                 <input type="text" name="newpseudo" placeholder="Pseudo" value="<?php echo $user['pseudo']; ?>" /><br /><br />
                 <label>Mail :</label>
                 <input type="text" name="newmail" placeholder="Mail" value="<?php echo $user['mail']; ?>" /><br /><br />
                 <label>Mot de passe :</label>
                 <input type="password" name="newmdp1" placeholder="Mot de passe"/><br /><br />
                 <label>Confirmation - mot de passe :</label>
                 <input type="password" name="newmdp2" placeholder="Confirmation du mot de passe" /><br /><br />
                 <input type="submit" value="Mettre à jour mon profil !" />
              </form>
              <?php if(isset($msg))
              {
                  echo $msg;
              }else
              {
                 header("Location: loginView.php");
              }
              ?>
           </div>
        </div>
    </body>
</html>
