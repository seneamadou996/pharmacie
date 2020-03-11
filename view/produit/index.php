<?php
require_once '../../model/database.php';
$controller = 'produit';

// Test jouant le role d'un FrontController
if(!isset($_REQUEST['c']))
{
    require_once "../../controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->Index();    
}
else
{
    // Nous obtenons le controleur que nous voulons charger
    $controller = strtolower($_REQUEST['c']);
    $action = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
    
    // Nous instancions le contrôleur
    require_once "../../controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    
    //Appel de l'action
    call_user_func( array( $controller, $action ) );
}