<?php
session_start();
require_once ('config/config.php');

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
header('Content-Type: application/json; charset=UTF-8');


$controller = isset($_GET['controller']) ? $_GET['controller'] . 'Controller' : 'ProductController';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
require_once('controllers/UserController.php');
require_once ('controllers/DashboardController.php');
require_once ('controllers/PermissionController.php');
require_once ('controllers/ProductController.php');

$usercontroller = new $controller();
$usercontroller->$action();

//require_once ('api.php');