<?php

define('CONTROLLERS_FOLDER', 'controllers/');
define('DEFAULT_CONTROLLER', 'ciudad');
define('DEFAULT_ACTION', 'procesar');

$controller = DEFAULT_CONTROLLER;
if (!empty($_GET['controller'])) {
    $controller = $_GET['controller'];
}

$action = DEFAULT_ACTION;
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}


$controller = CONTROLLERS_FOLDER . $controller . "Controller.php";

try {
    if (is_file($controller)) {
        require_once($controller);
    } else {
        throw new Exception("El controlador no existe, 404 Not Found");
    }

    if (is_callable($action)) {
        $action();  
    } else {
        throw new Exception("La accion no existe, 404 Not Found");
    }
} catch (Exception $e) {
    echo "Exception capturada: ". $e->getMessage(). "<br>";
}
?>