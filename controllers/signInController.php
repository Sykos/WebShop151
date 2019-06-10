<?php

    class Controller extends mainController
    {

        public function __construct()
        {

            parent::__construct();

            $this->aContent['viewPath'] = './views/signInView.php';
            $this->aContent['pageTitle'] = 'Inscription';

        }

        public function render()
        {
            parent::render();

        }

        public static function db()
        {
            // Include config file
            define('DB_SERVER', '127.0.0.1:49386');
            define('DB_USERNAME', 'azure');
            define('DB_PASSWORD', '6#vWHD_$');
            define('DB_NAME', 'raclettev2');

            // Attempt to connect to MySQL database
            $dbconnect = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

            if (mysqli_connect_errno())
            {
                die("Database connection failed: " . mysqli_connect_error());
            }

            if(isset($_POST['submit']))
            {
                // checkData();
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $user = $_POST['user'];

                $query = "INSERT INTO `utilisateurs` (`UtilisateursNomDeFamille`, `UtilisateursPrenom`, `UtilisateursEmail`, `UtilisateursMotDePasse`,`UtilisateursUser`) VALUES ('$nom', '$prenom', '$email', '$password','$user')";

                if ($dbconnect->query($query) === TRUE)
                {
                    echo "New record created successfully";
                }else
                {
          	        die($dbconnect->error);
                }
            }
        }

        public static function checkData()
        {
            //INITIALISATION DES VARIABLES
            //&& (preg_match($patternString, $_POST['prenom'])) && (preg_match($patternDate, $_POST['dateOfBirth']))
            $bCheckOk;
            $sSurname = getSurname();
            $sName = getName();
            $sDateOfBirth = $_POST['dateOfBirth'];
            $patternString = '^[a-zA-Z]+$';
            $patternDate = '\d{1,2}\.\d{1,2}\.\d{4}';

            return $sSurname;
            /*if(!preg_match($patternString, $sSurname))
            {
                $bCheckOk = false;
            }else
            {
                $bCheckOk = true;
            }
            //RETOUR DES VALEURS POUR UTILISATION
            return $bCheckOk;*/

        }

        ##########################################
        #                                        #
        # RÉCUPÉRATION DES ENTRÉES ET PROTECTION #
        # CONTRE L'INJECTION                     #
        #                                        #
        ##########################################
/*
        public function getSurname()
        {
            $sSurname = htmlspecialchars($_POST['nom']);
            return $sSurname;
        }
        public function getName()
        {
            $sName = htmlspecialchars($_POST['prenom']);
            return $sName;
        }
        public function getEmail()
        {
            $sEmail = htmlspecialchars($_POST['email']);
            return $sEmail;
        }
        public function getPassword()
        {
            $sPassword = htmlspecialchars($_POST['password']);
            return $sPassword;
        }
        public function getUsername()
        {
            $sUsername = htmlspecialchars($_POST['username']);
            return $sUsername;
        }*/
    }

############################
#                          #
# TRAITEMENT DES DONNÉES   #
#                          #
############################
$sErrorMessage = '';

//CHECK DES DONNÉES ET ENREGISTREMENT
if(isset($_POST['submit']))
{
    //Controller::db();

    /*if ($bError == false)
    {
        $sErrorMessage = 'Données invalides';
    }elseif ($bError == true)
    {
        Controller::db();
        echo 'Enregistrement ok';
    }
    if ($sErrorMessage != '')
    {
        echo $sErrorMessage;
    }*/

}
