<?php
    class Controller extends mainController
    {
        public function __construct(){
            parent::__construct();

            $this->aContent['viewPath'] = './views/adminArticlesView.php';
            $this->aContent['pageTitle'] = 'Administration';
        }

        public function render()
        {
            parent::render();
        }
    }