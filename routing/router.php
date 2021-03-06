<?php

    //RÉCUPÈRE LES ROUTES
    require_once('routes.php');





    $controllerToLoad = 'home';
    $sPageToLoad = 'home';


    //RÉCUPÈRE	LE NOM DE LA PAGE À AFFICHER

    if(isset($_GET['page']))
    {
        $sPageToLoad = $_GET['page'];
    }





    //REDIRECTION VERS LE BON CONTROLLER

    switch($sPageToLoad)
    {
        default:
        case 'home':
            $controllerToLoad = 'home';
            break;
        case 'product':
            $controllerToLoad = 'product';
            break;
        case 'productDetail':
            $controllerToLoad = 'productDetail';
            break;
        case 'testForm':
            $controllerToLoad = 'testForm';
            break;
        case 'login':
            $controllerToLoad = 'login';
            break;
        case 'signIn':
            $controllerToLoad = 'signIn';
            break;
        case 'admin':
            $controllerToLoad = 'admin';
            break;
        case 'member':
            $controllerToLoad = 'member';
            break;
        case 'changeEmail':
            $controllerToLoad = 'changeEmail';
            break;
        case 'changePassword':
            $controllerToLoad = 'changePassword';
            break;
        case 'viewOrder':
            $controllerToLoad = 'viewOrder';
            break;
        case 'adminArticles':
            $controllerToLoad = 'adminArticles';
            break;
        case 'adminCommandes':
            $controllerToLoad = 'adminCommandes';
            break;
        case 'adminClients':
            $controllerToLoad = 'adminClients';
            break;
    }

    //APPEL DU MAINCONTROLLER ET DU CONTROLLER AD HOC
    require_once('./controllers/mainController.php');
    require_once('./controllers/'.$controlersList[$controllerToLoad]);
    $oController = new Controller();
    $oController->render();
