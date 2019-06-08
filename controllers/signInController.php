<?php

  class Controller extends mainController {

    public function __construct(){

      parent::__construct();

      $this->aContent['viewPath'] = './views/signInView.php';
      $this->aContent['pageTitle'] = 'Inscription';
    }

    public function render(){
      parent::render();
    }

  }

