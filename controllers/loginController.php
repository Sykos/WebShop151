<?php

    class Controller extends mainController {

        public function __construct(){

            parent::__construct();

            $this->aContent['viewPath'] = './views/login.php';
            $this->aContent['pageTitle'] = 'Login';
            $this->aContent['css'][] = './public/vendor/css/testFormCSS.css';
        }

        public function render(){
            parent::render();
        }

        public function getForm(){
            $name = $_GET['name'];
            $password = $_GET['password'];

            return ($name);
            return ($password);
        }
    }
