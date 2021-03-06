<?php
    //CONTIENT LES FONCTIONS GLOBALES À TOUS LES CONTROLLERS ENFANTS
    class mainController
    {

        public $aContent;
        public $aNavLinks;

        public function __construct()
        {
            
            $this->aContent['css'][] = '../public/vendor/css/bootstrap.css';
            $this->aContent['css'][] = '../public/vendor/css/headerCSS.css';
            $this->aContent['css'][] = '../public/vendor/css/navCSS.css';
            $this->aContent['css'][] = 'https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css';
            $this->aContent['css'][] = '../public/vendor/css/footerCSS.css';
            $this->aContent['js'][] = 'https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js';
            $this->aContent['js'][] = '//code.jquery.com/jquery-1.11.0.min.js';
            $this->aContent['js'][] = '../public/vendor/js/nav.js';


        }

        //BUT : RÉCUPÉRER LE CONTENU À AFFICHER DEPUIS LE CONTROLLER ENFANT
        public function render()
        {

            require_once($this->aContent['viewPath']);
        }


    }
