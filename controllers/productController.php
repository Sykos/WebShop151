<?php

  class Controller extends mainController {

    public $sProduct;
    //SE LANCE AUTOMATIQUEMENT ET CHARGE TOUT LE CONTENU
    public function __construct(){

      parent::__construct();

      $this->aContent['viewPath'] = './views/productView.php';
      $this->aContent['pageTitle'] = 'Produit';
      $this->aContent['css'][] = './public/vendor/css/productView.css';


      //$this->sProduct = $_GET['product'];
    }

    /*
    //Récupérer data d'un produit
    public function getProductData(){
      $oProductData = new cProductModel($this->sProduct);
    }*/

    public function render(){
      parent::render();
    }

  }
