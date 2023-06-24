<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\LoginController;
use Controllers\inicioController;

$router = new Router();

$router->get('/',[LoginController::class, 'index']);
$router->get('/nosotros','funcion_nosotros');


$router->comprobarRutas();