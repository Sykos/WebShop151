<?php

  class Controller extends mainController {

    public function __construct(){
      parent::__construct();

      $this ->aContent['viewPath'] = './views/productDetailView.php';
      $this->aContent['pageTitle'] = 'Produit';
    }

    public function render(){
      parent::render();
    }
  }
