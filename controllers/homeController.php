<?php

    class Controller extends mainController
    {

        //SE LANCE AUTOMATIQUEMENT ET CHARGE TOUT LE CONTENU
        public function __construct()
        {

            parent::__construct();

            $this->aContent['viewPath'] = './views/homeView.php';
            $this->aContent['pageTitle'] = 'Home';
            $this->aContent['css'][] = './public/vendor/css/homeCSS.css';

        }
        
        public function render()
        {
            parent::render();
        }
    }
