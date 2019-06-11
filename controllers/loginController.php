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
    session_start();

    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true)
    {
        header('?page=home');
        exit;
    }
    require_once "config.php";
    //$_SERVER["REQUEST_METHOD"] == "POST"
    $username = $password = '';
    $usernameErr = $passwordErr = '';

    /*if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(empty(trim($_POST['username'])))
        {
            $usernameErr = 'Entrez votre nom d\'utilisateur';
        }else
        {
            $username = trim($_POST['username']);
        }

        if(empty(trim($_POST['password'])))
        {
            $passwordErr = 'Entrez votre mot de passe';
        }else
        {
            $password = trim($_POST['password']);
        }

        if(empty($usernameErr) && empty($passwordErr))
        {
            $sql = 'SELECT id, UtilisateursUser, UtilisateursMotDePasse FROM utilisateurs WHERE UtilisateursUser = ?';

            if($stmt = mysqli_prepare($link, $sql))
            {
                mysqli_stmt_bind_param($stmt, 's', $param_username);

                $param_username = $username;

                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);

                    if(mysqli_stmt_num_rows($stmt) == 1)
                    {
                        mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                        if(mysqli_stmt_fetch($stmt))
                        {
                            if(password_verify($password, $hashed_password))
                            {
                                session_start();

                                $_SESSION['loggedin'] = true;
                                $_SESSION['id'] = $id;
                                $_SESSION['username'] = $username;

                                header('?page=home');
                            }else
                            {
                                $passwordErr = 'Le mot de passe n\'est pas valide';
                            }
                        }
                    }else
                    {
                        $usernameErr = 'Aucun compte trouvé avec ce nom d\'utilisateur';
                    }
                }else
                {
                    echo 'OOPS ! ça n\'a pas l\'air de fonctionner !';
                }
            }

            mysqli_stmt_close($stmt);
        }
        mysqli_close($link);
    }*/

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
