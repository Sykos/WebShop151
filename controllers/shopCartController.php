<?php
    class Controller extends mainController
    {
        public function __construct()
        {
            parent::__construct();

            $this->aContent['viewPath'] = './views/shopCartView.php';
            $this->aContent['pageTitle'] = 'Panier';
        }

        public function render()
        {
            parent::render();
        }
    }
