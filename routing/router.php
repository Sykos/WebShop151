<?php

    //RÉCUPÈRE LES ROUTES
    require_once('routes.php');




    $controllerToLoad = 'home';
    $sPageToLoad;


    //RÉCUPÈRE	LE NOM DE LA PAGE À AFFICHER
  //*
    if(isset($_GET['page'])){
      $sPageToLoad = $_GET['page'];
    }




    //REDIRECTION VERS LE BON CONTROLLER

      switch($sPageToLoad){
        default:
        case 'home':
          $controllerToLoad = 'home';
          break;
        case 'product':
          $controllerToLoad = 'product';
        break;
      }


    //APPEL DU MAINCONTROLLER ET DU CONTROLLER AD HOC
    require_once('./controllers/mainController.php');
    require_once('./controllers/'.$controlersList[$controllerToLoad]);
    $oController = new Controller();
    $oController->render();
