<!-- Crear nucleo de Api para trabaja con la tabla Videojuegos
 Esta api tendra para GET,POST,DELETE
 Get: en el caso de que no se especifique un vd,se muestran todos,
 en el caso de que meta el nombre de uno que haya,muestra todas las claves primarias de la tabla
 
 Post: se inserta los datos del videojuego SI Y SOLO SI se han rellenado los campos
 DELETE: en el caso de que se especifique un vd, se eliminara la fila de dicho juego, en caso 
 de que no se especifique nada, no se eliminara nada. Pero en el caso de que se introduzca la
 palabra ADMIN, se eliminara los datos de la tabla entera
  -->
<?php
//Config pa la conexion con la bd
    $_host="localhost";
    $_bd="videojuegos_bd";
    $_usuario="root";
    $_contrasenia=""; 

    //Crear la conexion usando PD(PHP Data Object)
    try{
        //CREAMOS EL OBJETO PDO pq este incluye la info para interactuar con la bd y realizar consultas
        $_conexion=new PDO("mysql:host=$_host;dbname=$_bd;charset=utf8",$_usuario,$_contrasenia);
        //Configurar PDO  para lanzar excepciones en caso de haber un error:
        $_conexion-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    }catch(PDOException $e){
        die("Error: No se puede conectar al BBDD->".$e->getMessage());
    }

?>