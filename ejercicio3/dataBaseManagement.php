<?php

function creaConexion (){
    $servidor = "localhost";
    $baseDatos="ciudades";
    $usuario= "developer";
    $pass="developer";
    
    $conexion = new PDO("mysql:host=$servidor;dbname=$baseDatos",$usuario,$pass);
       return $conexion;
}

function obtenerCiudad ($poblacion){

    try {
        $conexion = creaConexion();

        $consulta =$conexion->prepare("SELECT Nombre, Poblacion FROM ciudades  WHERE Poblacion>=?"); 
        $consulta->bindParam(1,$poblacion);
        $consulta->execute();
        
        while($ciudad = $consulta->fetch(PDO::FETCH_ASSOC)){
            $resultado[]=$ciudad;
        };
        $conexion=null;
        return $resultado;

    } catch (PDOException $e) {
        echo ("Fallo");
        return false;
    }

}

?>