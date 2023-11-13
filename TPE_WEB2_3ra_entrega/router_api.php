<?php 

require_once 'libs/Router.php';
require_once 'app/api/ApiController.php';

// creo el router
$router = new Router();

// armo la tabla de ruteo
$router->addRoute('goleadores', 'GET', 'ApiController', 'getAll');
$router->addRoute('goleadores/:ID', 'GET', 'ApiController', 'getAll');
$router->addRoute('goleadores/:ID', 'DELETE', 'ApiController', 'delete');
$router->addRoute('goleadores', 'POST', 'ApiController', 'add');
// rutea
$router->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);



