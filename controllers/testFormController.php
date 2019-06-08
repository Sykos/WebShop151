<?php

    class Controller extends mainController {

        public function __construct(){

            parent::__construct();

            $this->aContent['viewPath'] = './views/testFormView.php';
            $this->aContent['pageTitle'] = 'Test Formulaire';
            $this->aContent['css'][] = './public/vendor/css/testFormCSS.css';
        }

        public function render(){
            parent::render();
        }

        public function getForm(){
            $name = $_GET['name'];
            $surname = $_GET['surname'];
            $email = $_GET['email'];
            $password = $_GET['password'];

            return ($name);
            return ($surname);
            return ($email);
            return ($password);
        }

        public function testForm(){
            require_once("config.php");
            $sql = "INSERT INTO `utilisateurs`(`UtilisateursNomDeFamille`) VALUES ('.nom')";
            if ($link->query($sql) === TRUE) {
            echo "New record created successfully";
                }
            else {
            echo "Error: " . $sql . "<br>" . $link->error;
        }


        }
    }
