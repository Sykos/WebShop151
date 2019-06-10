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
    include("config.php");
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // username and password sent from form

        $myusername = mysqli_real_escape_string($db,$_POST['UtilisateursNomDeFamille']);
        $mypassword = mysqli_real_escape_string($db,$_POST['UtilisateursMotDePasse']);

        $sql = "SELECT id FROM utilisateurs WHERE UtilisateursNomDeFamille = '$myusername' and UtilisateursMotDePasse = '$mypassword'";
        $result = mysqli_query($db,$sql);
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
    }
