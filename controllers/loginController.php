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

    if(isset($_SESSION['loggedin']) && $_SESSION === true){
        header('location:?page=home');
        exit;
    }

    require_once './config.php';




























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
