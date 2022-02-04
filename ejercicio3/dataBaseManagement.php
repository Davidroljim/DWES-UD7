<?php

function creaConexion (){
    $servidor = "localhost";
    $baseDatos="ciudades";
    $usuario= "developer";
    $pass="developer";
    
    $conexion = new PDO("mysql:host=$servidor;dbname=$baseDatos",$usuario,$pass);
       return $conexion;
}

function obtenerCiudad ($Poblacion){

    try {
        $conexion = creaConexion();

        $consulta =$conexion->prepare("SELECT Nombre FROM ciudades  WHERE Poblacion=?"); 
        $consulta->bindParam(1,$Poblacion);
        $consulta->execute();
        
        $retorno = $consulta->fetch(PDO::FETCH_ASSOC);
        $conexion=null;
        return $retorno;

    } catch (PDOException $e) {
        echo ("Fallo");
        return false;
    }

}

?>