<?php
    class Controller extends mainController
    {
        public function __construct()
        {

            parent::__construct();

            $this->aContent['viewPath'] = './views/memberSpaceView.php';
            $this->aContent['pageTitle'] = 'Espace membre';
        }

        public function render()
        {
            parent::render();
        }

        public static function connexionToDB(){
            $bdd = new PDO('mysql:host=127.0.0.1:49386;dbname=raclettev2', 'azure', '6#vWHD_$');
            return $bdd;
        }

        public static function setUsername()
        {
            self::connexionToDB();
            if(isset($_SESSION['id']))
            {
               $requser = $bdd->prepare("SELECT * FROM utilisateurs WHERE UtilisateursID = ?");
               $requser->execute(array($_SESSION['id']));
               $user = $requser->fetch();
               if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $user['pseudo']) {
                  $newpseudo = htmlspecialchars($_POST['newpseudo']);
                  $insertpseudo = $bdd->prepare("UPDATE utilisateurs SET UtilisateursUser = ? WHERE UtilisateursID = ?");
                  $insertpseudo->execute(array($newpseudo, $_SESSION['id']));
                  header('Location: profil.php?id='.$_SESSION['id']);
               }
            }
        }

        public static function setEmail()
        {
            if(isset($_SESSION['id']))
            {
                if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['mail'])
                {
                   $newmail = htmlspecialchars($_POST['newmail']);
                   $insertmail = $bdd->prepare("UPDATE utilisateurs SET UtilisateursEmail = ? WHERE UtilisateursID = ?");
                   $insertmail->execute(array($newmail, $_SESSION['id']));
                }
            }

        }

        public static function setPassword()
        {
            if(isset($_SESSION['id']))
            {
                if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2']))
                {
                   $mdp1 = sha1($_POST['newmdp1']);
                   $mdp2 = sha1($_POST['newmdp2']);
                   if($mdp1 == $mdp2)
                   {
                      $insertmdp = $bdd->prepare("UPDATE utilisateurs SET UtilisateursMotDePasse = ? WHERE UtilisateursID = ?");
                      $insertmdp->execute(array($mdp1, $_SESSION['id']));
                  }else
                   {
                      $msg = "Vos deux mdp ne correspondent pas !";
                   }
                }
            }

        }

    }
