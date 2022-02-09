<?php

function procesar(){
    
    $error = "";
    $resultado = "";
    $dni = "";
    
    // Iniciamos el cliente SOAP
    // Escribimos la dirección donde se encuentra el servicio
    $url = "http://localhost/php/DWES-UD7/ejercicio4/eje4cliente/index.php?action=procesar";
    $uri = "http://localhost/php/DWES-UD7/ejercicio4/eje4servidor/";
    $cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));
    
    // Ejecutamos las siguientes líneas al enviar el formulario
    if (count($_POST) > 0) {
        // Establecemos los parámetros de envío
        if (!empty($_POST['num'])) {
            $num = $_POST['num'];
            // Si los parámetros son correctos, llamamos a la función letra de calcularLetra.php
            $ciudades =$cliente->getCiudades($num);
            echo "<h1>Ciudades</h1>";
            for ($i=0; $i < count($ciudades) ; $i++) { 
                echo " Nombre: " . $ciudades[$i]["nombre"] . " Poblacion: ". $ciudades[$i]["poblacion"]  ."<br>";
            }
        } else {
            $error = "<strong>Error:</strong> Debes introducir un DNI correcto<br/><br/>Ej: 45678987";
        }
    }else{
        include_once "./view/ciudadView.php";
    }
}

?>
