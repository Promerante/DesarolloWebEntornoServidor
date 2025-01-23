<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Videojuegos</title>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    require "../PruebasExamen/conexion.php";
    ?>
</head>

<body>
    <?php
    $_tabla = $conn->query("SELECT * FROM videojuegos");
    if ($_tabla->num_rows > 0) {
        echo "<table border='1' style='border-collapse: collapse;'> 
    <tr>
        <td>ID</td>
        <td>Titulo</td>
        <td>Desarroladora</td>
        <td>Año de lanzamiento</td>
        <td>Reseña</td>
        <td>Duración</td>
    </tr>";
        while ($fila = $_tabla->fetch_assoc()) {
           
            echo "<tr>";
            foreach ($fila as $campo => $valor) {
                    
                   
                    if($campo=="id"){
                        echo "<td>" . $valor . "</td>";
                        $idFila=$valor;
                    }
                   else if($campo=="duracion"){
                    echo "<td>" . $valor . "</td>";
                    echo "<td><a href='editar.php?id=$idFila'>Editar juego</a></td>";
                   }else{
                    echo "<td>" . $valor . "</td>";
                   }

            }

           
           
            echo "</tr>";
        }
        echo "<tr>
        
            </tr>"
        ;
        echo "</table>";
    } else {
        echo "No se han encontrado datos <br>";
    }

    $conn->close();
    ?>
    <br>
    <a href="insertar.php">Insertar juego</a>
    
    
</body>

</html>