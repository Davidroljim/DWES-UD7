<?php //IMPORTANTE: ELIMINA EL ESPACIO ANTES DE LA INTERROGACIÓN
// Vaciamos algunas variables
$error = "";
$resultado = "";
$poblacion = "";


// Iniciamos el cliente SOAP
// Escribimos la dirección donde se encuentra el servicio
$url = "http://localhost/php/DWES-UD7/ejercicio3/ciudadesServer.php";
$uri = "http://localhost/php/DWES-UD7/ejercicio3/";
$cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));

// Ejecutamos las siguientes líneas al enviar el formulario
if (isset($_POST['enviar'])) {
    // Establecemos los parámetros de envío
    if (!empty($_POST['poblacion'])) {
        $poblacion = $_POST['poblacion'];
        
        // Si los parámetros son correctos, llamamos a la función letra de calcularLetra.php
        $resultado = $cliente->buscarCiudad($poblacion);
        
    } else {
        $error = "<strong>Error:</strong> Debes introducir un número de población correcta<br/><br/>Ej: 1000";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Ciudades</title>
       
    </head>
<body>
    <h1>Obtener Ciudad</h1>
    
    <form action="ciudades.php" method="post">
    <?php //IMPORTANTE: ELIMINA EL ESPACIO ANTES DE LA INTERROGACIÓN
        print "<input type='number' name='poblacion' >";
        print "<input type='submit' name='enviar' value='Buscar Ciudad'>";
        
        
    ?>
    </form>
    <table>
        
        <?php
            if ($resultado=="") {
                
            }else{
                echo "<th>Nombre</th>";
                echo "<th>Poblacion</th>";
            foreach($resultado as $poblacion){
                
                echo "<tr>";
                echo "<td>".$poblacion["Nombre"]."</td>";
                echo "<td>".$poblacion["Poblacion"]."</td>";
                echo "</tr>";

            }
        }
        ?>
    </table>
</body>
</html>

