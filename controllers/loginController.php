<?php

class Controller extends mainController {

  public function __construct(){

    parent::__construct();

    $this->aContent['viewPath'] = './views/loginView.php';
    $this->aContent['pageTitle'] = 'Login';
    $this->aContent['css'][] = './public/vendor/css/loginCSS.css';
  }

  public function render(){
    parent::render();
  }

}
