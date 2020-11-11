<?php
session_start();

$controller = isset($_GET['controller']) ? $_GET['controller'] . 'Controller' : 'ProductController';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
require_once('controllers/UserController.php');
require_once ('controllers/DashboardController.php');
require_once ('controllers/PermissionController.php');
require_once ('controllers/ProductController.php');

$usercontroller = new $controller();
$usercontroller->$action();
