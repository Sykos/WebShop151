<?php

    //RÉCUPÈRE LES ROUTES
    require_once('routes.php');

    $controllerToLoad = 'home';

    //RÉCUPÈRE	LE NOM DE LA PAGE À AFFICHER
    $sPageToLoad = $_GET['page'];

    //REDIRECTION VERS LE BON CONTROLLER
    if(!is_null($controllerToLoad)){
      switch($sPageToLoad){
        case 'home':
          $controllerToLoad = 'home';
        case 'product':
          $controllerToLoad = 'product';

        break;
      }
    }

    require_once('./controllers/mainController.php');
    require_once('./controllers/'.$controlersList[$controllerToLoad]);
    $oController = new Controller();
    $oController->render();
/*
    $sPageToLoad = $_GET['page'];

    $controllerToLoad = 'home';

    //REDIRECTION VERS LE BON CONTROLLER
    switch($sPageToLoad){
      case 'product':
        $controllerToLoad = $controlersList['product'];
      break;
    }

    require_once('./controllers/mainController.php');

    //MANQUE TRAITEMENT POUR ARRIVER JUSQU'AU $controllerToLoad

    require_once('./controllers/'.$controlersList[$controllerToLoad]);

    $oController = new Controller();
    $oController->render();*/
