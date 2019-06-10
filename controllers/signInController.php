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
                $sNom = self::getSurname();
                $sPrenom = self::getName();
                $sEmail = self::getEmail();
                $sPassword = self::getPassword();
                $sUsername = self::getUsername();
                /*$nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $user = $_POST['user'];*/

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
            $sNom = self::getSurname();
            $sPrenom = self::getName();
            $sDateOfBirth = self::getDateOfBirth();
            $sUsername = self::getUsername();
            $sPassword = self::getPassword();
            $patternString = '/^[a-zA-Z]+$/'; //ONLY ALPHA
            $patternDate = '/\d{1,2}\.\d{1,2}\.\d{4}/';//DD.MM.YYYY
            $patternEmail = '/\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,6}/'//SOMETHING@SOMETHING.SOMETHING
            $patternPswd = '/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15}/';//8 to 15 character string with at least one upper case letter, one lower case letter, and one digit

            if((preg_match($patternString, $sNom) != 1)){

                echo 'Ton truc fonctionne pas gros';
            }
            else
            {
                //self::db();
                echo 'Enregistrement ok';
            }


        }

        ##########################################
        #                                        #
        # RÉCUPÉRATION DES ENTRÉES ET PROTECTION #
        # CONTRE L'INJECTION                     #
        #                                        #
        ##########################################

        public static function getSurname()
        {
            $sSurname = htmlspecialchars($_POST['nom']);
            return $sSurname;
        }
        public static function getName()
        {
            $sName = htmlspecialchars($_POST['prenom']);
            return $sName;
        }
        public static function getEmail()
        {
            $sEmail = htmlspecialchars($_POST['email']);
            return $sEmail;
        }
        public static function getPassword()
        {
            $sPassword = htmlspecialchars($_POST['password']);
            return $sPassword;
        }
        public static function getUsername()
        {
            $sUsername = htmlspecialchars($_POST['username']);
            return $sUsername;
        }
        public static function getDateOfBirth()
        {
            $sDateOfBirth = htmlspecialchars($_POST['dateOfBirth']);
            return $sDateOfBirth;
        }
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
    Controller::checkData();
}
