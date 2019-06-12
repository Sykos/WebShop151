<?php

    class Controller extends mainController
    {

        public function __construct()
        {

            parent::__construct();

            $this->aContent['viewPath'] = './views/signInView.php';
            $this->aContent['pageTitle'] = 'Inscription';
            $this->aContent['css'][] = './public/vendor/css/signInCSS.css';

        }

        public function render()
        {
            parent::render();

        }

        public static function db()
        {
            $dbhost = '127.0.0.1:49386';
                 $dbuser = 'azure';
                 $dbpass = '6#vWHD_$';

                 $conn = mysql_connect($dbhost, $dbuser, $dbpass);

                 if(! $conn ) {
                    die('Could not connect: ' . mysql_error());
                 }

            if(isset($_POST['submit']))
            {
                // checkData();
                $sNom = self::getSurname();
                $sPrenom = self::getName();
                $sEmail = self::getEmail();
                $sPassword = self::getPassword();
                $sUsername = self::getUsername();
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $user = $_POST['user'];

                $query = "INSERT INTO `utilisateurs` (`UtilisateursNomDeFamille`, `UtilisateursPrenom`, `UtilisateursEmail`, `UtilisateursMotDePasse`,`UtilisateursUser`) VALUES ('$sNom', '$sPrenom', '$sEmail', '$sPassword','$sUsername')";

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
            $salt = 'i;151-120#';//Pour l'ajouter au mot de passe avant l'enregistrement dans la db
            //INITIALISATION DES VARIABLES
            $sNom = self::getSurname();
            $sPrenom = self::getName();
            $sDateOfBirth = self::getDateOfBirth();
            $sEmail = self::getEmail();
            $sUsername = self::getUsername();
            $sPassword = self::getPassword();
            $patternString = '/^[a-zA-Z]+$/'; //ONLY ALPHA
            $patternDate = '/\d{1,2}\.\d{1,2}\.\d{4}/';//DD.MM.YYYY
            $patternEmail = '/\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,6}/';//SOMETHING@SOMETHING.SOMETHING
            $patternEmail = '/\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,6}/';//SOMETHING@SOMETHING.SOMETHING
            $patternPswd = '/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15}/';//8 to 15 character string with at least one upper case letter, one lower case letter, and one digit
            $patterUsername = '/^[a-zA-Z0-9]+([_ -]?[a-zA-Z0-9])*$/';//alpha numeric with some and characters like _-

            if((preg_match($patternString, $sNom) != 1) && (preg_match($patternString, $sPrenom) != 1) && (preg_match($patternDate, $sDateOfBirth) !=1) && (preg_match($patternEmail, $sEmail) != 1) && (preg_match($patternString, $sUsername) != 1) && (preg_match($patternPswd, $sPassword) != 1)){

                echo 'Ton truc fonctionne pas gros';
            if((preg_match($patternString, $sNom) != 1) && (preg_match($patternString, $sPrenom) != 1) && (preg_match($patternDate, $sDateOfBirth) != 1) && (preg_match($patternEmail, $sEmail) != 1) && (preg_match($patternUsername,$sUsername) != 1) &&
            (preg_match($patternPswd, $sPassword) != 1))
            {
                echo 'Données invalides ! Le nom et le prénom ne doivent contenir que des lettres ! <br>
                     La date de naissance doit respecter la forme jj.mm.aaaa ! <br>
                     L\'adresse mail doit respecter la forme d\'une adresse mail ! <br>
                     Le nom d\'utilisateur n\'accepte comme caractères spéciaux que "-" et "_" ! <br>
                     Le mot de passe doit contenir entre 8 et 15 caractères, au moins une majuscule, une minuscule et un chiffre !';
            }
            else
            {
                //self::db();
                $sPassword = sha1($salt.$sPassword);
                self::db();
                echo 'Enregistrement ok';
            }
            /*//INTIALISATION DES VARIABLES
            $aErrorMessage = array();
            $sNom = self::getSurname();
            $sPrenom = self::getName();
            $sDateOfBirth = self::getDateOfBirth();
            $sEmail = self::getEmail();
            $sUsername = self::getUsername();
            $sPassword = self::getPassword();
            $sConfirmPassword = self::getConfirmPassword();
            $patternString = '/^[a-zA-Z]+$/'; //ONLY ALPHA
            $patternDate = '/\d{1,2}\.\d{1,2}\.\d{4}/';//DD.MM.YYYY
            $patternEmail = '/\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,6}/';//SOMETHING@SOMETHING.SOMETHING
            $patternPswd = '/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15}/';//8 to 15 character string with at least one upper case letter, one lower case letter, and one digit
            $patterUsername = '/^[a-zA-Z0-9]+([_ -]?[a-zA-Z0-9])*$/';//alpha numeric with some and characters like _-

            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                //VÉRIFICATION DES CHAMPS
                if($sPassword != $sConfirmPassword)
                {
                    $aErrorMessage[] = 'Les mots de passe ne sont pas identiques';
                }
                if(!preg_match($patternString, $sNom))
                {
                    $aErrorMessage[] = 'Le nom ne peut contenir que des lettres';
                }
                if(!preg_match($patternString, $sPrenom))
                {
                    $aErrorMessage[] = 'Le prénom ne peut contenir que des lettres';
                }
                if(!preg_match($patternDate, $sDateOfBirth))
                {
                    $aErrorMessage[] = 'La date de naissance est incorrecte';
                }
                if(!preg_match($patternEmail, $sEmail))
                {
                    $aErrorMessage[] = 'L\'addresse e-mail est invalide';
                }
                if(!preg_match($patternUsername, $sUsername))
                {
                    $aErrorMessage[] = 'Le nom d\'utilisateur est invalide'
                }
                if(!preg_match($patternPswd, $sPassword))
                {
                    $aErrorMessage[] = 'Le mot de passe ne respecte pas les conditions de sécurité';
                }

                //SI PAS D'ERREUR TRAITEMENT
                if(!empty($aErrorMessage))
                {

                }
            }
            $salt = 'i;151-120#';//Pour l'ajouter au mot de passe avant l'enregistrement dans la db
            //INITIALISATION DES VARIABLES
            $sNom = self::getSurname();
            $sPrenom = self::getName();
            $sDateOfBirth = self::getDateOfBirth();
            $sEmail = self::getEmail();
            $sUsername = self::getUsername();
            $sPassword = self::getPassword();
            $patternString = '/^[a-zA-Z]+$/'; //ONLY ALPHA
            $patternDate = '/\d{1,2}\.\d{1,2}\.\d{4}/';//DD.MM.YYYY
            $patternEmail = '/\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,6}/';//SOMETHING@SOMETHING.SOMETHING
            $patternPswd = '/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15}/';//8 to 15 character string with at least one upper case letter, one lower case letter, and one digit
            $patterUsername = '/^[a-zA-Z0-9]+([_ -]?[a-zA-Z0-9])*$/';//alpha numeric with some and characters like _-

            if((preg_match($patternString, $sNom) != 1) && (preg_match($patternString, $sPrenom) != 1) && (preg_match($patternDate, $sDateOfBirth) != 1) && (preg_match($patternEmail, $sEmail) != 1) && (preg_match($patternUsername,$sUsername) != 1) &&
            (preg_match($patternPswd, $sPassword) != 1))
            {
                echo 'Données invalides ! Le nom et le prénom ne doivent contenir que des lettres ! <br>
                     La date de naissance doit respecter la forme jj.mm.aaaa ! <br>
                     L\'adresse mail doit respecter la forme d\'une adresse mail ! <br>
                     Le nom d\'utilisateur n\'accepte comme caractères spéciaux que "-" et "_" ! <br>
                     Le mot de passe doit contenir entre 8 et 15 caractères, au moins une majuscule, une minuscule et un chiffre !';
            }
            else
            {
                $sPassword = sha1($salt.$sPassword);
                self::db();
                echo 'Enregistrement ok';
            }*/


        }

        ##########################################
        #                                        #
        # RÉCUPÉRATION DES ENTRÉES ET PROTECTION #
        # CONTRE L'INJECTION                     #
        #                                        #
        ##########################################
/*public static function getSurname()
        {
            $sSurname = htmlspecialchars(trim($_POST['nom']));
            return $sSurname;
        }
        public static function getName()
        {
            $sName = htmlspecialchars(trim($_POST['prenom']));
            return $sName;
        }
        public static function getEmail()
        {
            $sEmail = htmlspecialchars(trim($_POST['email']));
            return $sEmail;
        }
        public static function getPassword()
        {
            $sPassword = htmlspecialchars(trim($_POST['password']));
            return $sPassword;
        }
        public static function getUsername()
        {
            $sUsername = htmlspecialchars(trim($_POST['username']));
            return $sUsername;
        }
        public static function getDateOfBirth()
        {
            $sDateOfBirth = htmlspecialchars(trim($_POST['dateDeNaissance']));
            return $sDateOfBirth;
        }
        public static function getConfirmPassword()
        {
            $sConfirmPassword = htmlspecialchars(trim($_POST['confirmPassword']));
            return $sConfirmPassword;
        }*/
    }

############################
#                          #
# TRAITEMENT DES DONNÉES   #
#                          #
############################

//$sErrorMessage = '';

//CHECK DES DONNÉES ET ENREGISTREMENT
//if(isset($_POST['submit']))
//{
    //Controller::checkData();
//}




##########################
#                        #
# TESTS NON FONCTIONNELS #
#                        #
##########################

/*//FICHIER DE CONFIG DB
include('./views/config.php');

//DÉFINITION DES VARIABLES ET INIT
$username = $password = $confirm_password = '';
$usernameErr = $passwordErr = $confirm_password_err = '';
$patternString = '/^[a-zA-Z]+$/'; //ONLY ALPHA
$patternDate = '/\d{1,2}\.\d{1,2}\.\d{4}/';//DD.MM.YYYY
$patternEmail = '/\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,6}/';//SOMETHING@SOMETHING.SOMETHING
$patternPswd = '/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15}/';//8 to 15 character string with at least one upper case letter, one lower case letter, and one digit
$patterUsername = '/^[a-zA-Z0-9]+([_ -]?[a-zA-Z0-9])*$/';//alpha numeric with some and characters like _-

//PROCESSING DATA QUAND SUBMIT
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    //VALIDATION USERNAME
    if(empty(trim($_POST['username'])))
    {
        $usernameErr = 'Entrez un nom d\'utilisateur';
    }else
    {
        //PREPARATION REQUÊTE SQL
        $sql = 'SELECT UtilisateursID FROM utilisateurs WHERE UtilisateursUser = ?';

        if($stmt = mysqli_prepare($dbconnect, $sql))
        {
            //LIAISON DES VARIABLES À LA REQUÊTE
            mysqli_stmt_bind_param($stmt, 's', $param_username);

            //SET PARAM
            $param_username = trim($_POST['username']);

            //ESSAI D'EXECUTION DE LA REQUÊTE
            if(mysqli_stmt_execute($stmt))
            {
                //ENREGISTRE
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $usernameErr = 'Ce nom d\'utilisateur est déjà pris';
                }else
                {
                    $username = trim($_POST['username']);
                }
            }else
            {
                echo 'Oups ! ça c\'est mal passé ! Veuillez réessayer plus tard';
            }
        }

        //FERMETURE DE LA REQUÊTE
        mysqli_stmt_close($stmt);
    }

    //VALIDATION PASSWORD
    if(empty(trim($_POST['password'])))
    {
        $passwordErr = 'Entrez un mot de passe';
    }else
    {
        $password = trim($_POST['password']);
    }

    //VALIDATION CONFIRM PASSWORD
    if(empty(trim($_POST['confirmPassword'])))
    {
        $confirm_password_err = 'Veuillez confirmer le mot de passe';
    }else
    {
        $confirm_password = trim($_POST['confirmPassword']);
        if(empty($passwordErr) && ($password != $confirm_password))
        {
            $confirm_password_err = 'Les mots de passe ne correspondent pas';
        }
    }

    //VERIFICATION DES ENTRÉES AVANT L'ENREGISTREMENT DANS LA DB
    if(empty($usernameErr) && empty($passwordErr) && empty($confirm_password_err))
    {
        //PRÉPARATION DE LA REQUÊTE
        $sql = 'INSERT INTO utilisateurs (UtilisateursUser, UtilisateursMotDePasse) VALUES (?,?)';

        if($stmt = mysqli_prepare($dbconnect, $sql))
        {
            //LIAISON DES VARIABLES AVEC LA REQUÊTE
            mysqli_stmt_bind_param($stmt, 'ss', $param_username, $param_password);

            //SET PARAM
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);//CRÉE UN HASH

            //TENTATIVE D'EXÉCUTION DE LA REQUÊTE
            if(mysqli_stmt_execute($stmt))
            {
                //REDIRECTION VERS LA PAGE DE LOGIN
                header('location:?page=login');
            }else
            {
                echo 'Oups ! ça n\'a pas fonctionné ! Veuillez réessayer plus tard';
            }
        }

        //FERMETURE DE LA REQUÊTE
        mysqli_stmt_close($stmt);
    }

    //FERMETURE DE LA CONNEXION
    mysqli_close($dbconnect);
}*/
    }