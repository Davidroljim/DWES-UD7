<?php
// Instanciamos un nuevo servidor SOAP
$uri="http://localhost/php/DWES-UD7/ejercicio3/";
$server = new SoapServer(null,array('uri'=>$uri));
$server->addFunction("buscarCiudad");
$server->handle();

// Función para obtener raíz cuadrada
function buscarCiudad($poblacion) {
    include_once "dataBaseManagement.php";
    $ciudad = obtenerCiudad($poblacion);
    return $ciudad;
}

?>
