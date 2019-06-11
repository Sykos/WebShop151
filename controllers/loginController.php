<?php

    class Controller extends mainController
    {

        public function __construct()
        {

            parent::__construct();

            $this->aContent['viewPath'] = './views/loginView.php';
            $this->aContent['pageTitle'] = 'Login';
            $this->aContent['css'][] = './public/vendor/css/loginCSS.css';
        }

        public function render()
        {
            parent::render();
        }



    }
    ##########################
    #                        #
    # TRAITEMENT DES DONNÉES #
    #                        #
    ##########################
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);


    session_start();
    //SI L'UTILISATEUR EST CONNECTÉ REDIRECTION VERS LA HOMEPAGE
    if(isset($_SESSION['loggedin']) && $_SESSION === true){
        header('location:?page=home');
        exit;
    }

    //FICHIER DE CONFIG DE LA DB
    include('../views/config.php');

    //DÉFINITONS DES VARIABLES ET INIT VIDE
    $username = $password = '';
    $usernameErr = $passwordErr = '';

    //PROCESSING DES DATA QUAND SUBMIT
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        //SI USERNAME VIDE
        if(empty(trim($_POST['username'])))
        {
            $usernameErr = 'Entrez votre nom d\'utilisateur';
        }else
        {
            $username = trim($_POST['username']);
        }

        //SI MDP VIDE
        if(empty(trim($_POST['password'])))
        {
            $passwordErr = 'Entrez votre mot de passe';
        }else
        {
            $password = trim($_POST['password']);
        }

        //VALIDATION CREDENTIALS
        if(empty($usernameErr) && empty($passwordErr))
        {
            $sql = 'SELECT UtilisateursID, UtilisateursUser, UtilisateursMotDePasse FROM utilisateurs WHERE UtilisateursUser = ?';

            if($stmt = mysqli_prepare($dbconnect, $sql))
            {
                //LIAISON DES VARIABLES AVEC LA REQUÊTE COMME PARAMÈTRE
                mysqli_stmt_bind_param($stmt, 's', $param_username);

                //SET DU PARAMÈTRE
                $param_username =  $username;

                //ESSAI D'EXÉCUTION DE LA REQUÊTE
                if(mysqli_stmt_execute($stmt))
                {
                    //ENREGISTRE LE RESULTAT
                    mysqli_stmt_store_result($stmt);

                    //VÉRIFIE SI LE USERNAME EXISTE, SI OUI -> CHECK MOT DE PASSE
                    if(mysqli_stmt_num_rows($stmt) == 1)
                    {
                        //LIAISON DES VARIABLES RENVOYÉES
                        mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);

                        if(mysqli_stmt_fetch($stmt))
                        {
                            if(password_verify($password, $hashed_password))
                            {
                                //MDP OK DONC NOUVELLE SESSION
                                session_start();

                                //ENREGISTREMENT DES DATAS DANS LES VARIABLES SESSION
                                $_SESSION['loggedin'] = true;
                                $_SESSION['id'] = $id;
                                $_SESSION['username'] = $username;

                                //REDIRECTION VERS LA HOMEPAGE
                                header('location:?page=home');
                            }else
                            {
                                //MESSAGE D'ERREUR SI MDP FAUX
                                $passwordErr = 'Le mot de passe n\'est pas valide';
                            }
                        }
                    }else
                    {
                        $usernameErr = 'Le nom d\'utilisateur est incorrect';
                    }
                }else
                {
                    echo 'Oups ! ça n\'a pas fonctionné ! Veuillez réessayer plus tard';
                }
            }

            //FIN DE LA REQUÊTE
            mysqli_stmt_close($stmt);
        }

        //FIN DE LA CONNEXION
        mysqli_close($dbconnect);
    }


























    /*if(isset($_POST['submit']))
    {

        // username and password sent from form
        $thisUsername = mysqli_real_escape_string($_POST['username']);
        $thisPassword = mysqli_real_escape_string($_POST['password']);
        $dbUsername;
        $dbPassword;


        $myusername = mysqli_real_escape_string($db,$_POST['UtilisateursUser']);
        $mypassword = mysqli_real_escape_string($db,$_POST['UtilisateursMotDePasse']);


        $sql = "SELECT UtilisateursUser, UtilisateursMotDePasse FROM utilisateurs WHERE UtilisateursUser =".$dbUsername." AND UtilisateursMotDePasse = ".$dbPassword."";
        $result = mysqli_query($sql);

        $testResult = mysql_fetch_assoc($result);

        var_dump($testResult);
        while($row = mysql_fetch_assoc($result))
        {
            $check_username = $row[''];
        }

        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $active = $row['active'];


        $count = mysqli_num_rows($result);

        // If result matched $myusername and $mypassword, table row must be 1 row

        if($count == 1)
        {
            session_register("myusername");
            $_SESSION['login_user'] = $myusername;

            header("location: welcome.php");
        }else
        {
            $error = "Your Login Name or Password is invalid";
        }
        echo 'Test validé';
    }*/
