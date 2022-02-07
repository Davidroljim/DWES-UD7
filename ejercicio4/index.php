<?php 
    define('CONTROLLERS_FOLDER',"controllers/");
    define('DEFAULT_CONTROLLER',"usuario");
    define('DEFAULT_ACTION',"validaLogin");
    //define('DEFAULT_ACTION',"mostrarJugador");

    $controller = DEFAULT_CONTROLLER;

    if(!empty($_GET['controller'])){
        $controller = $_GET['controller'];
    }

    $action = DEFAULT_ACTION;
    if(!empty ($_GET['action'])){
        $action = $_GET['action'];
    }

    $controller = CONTROLLERS_FOLDER . $controller . '_controller.php';

    try {
        if(is_file($controller)){
            require_once($controller);
        }
        else{
            throw new Exception("El controlador no existe - 404 not found", 1);
        }
        if(is_callable($action)){
            $action();
        }else{
            throw new Exception("La acción no existe - 404 not found", 1);
        }
    } catch (Exception $e) {
        echo 'Excepción capturada: ', $e->getMessage(),"\n";
    }
?>