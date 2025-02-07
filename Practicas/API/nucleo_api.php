<?php

error_reporting(E_ALL);
ini_set("display errors", 1);
header("Content-type: application/json");
require "conexion_pdo.php";
$metodo = $_SERVER["REQUEST_METHOD"];
$entrada = file_get_contents("php://input");
var_dump($entrada);
$entrada = json_decode($entrada, true);

switch ($metodo) {
    case "GET":
        controlGet($_conexion);
        break;
    case "POST":
        // controlPost($_conexion);
        break;
    case "PUT":
        controlPut($_conexion,$entrada);
        break;
    case "Delete":
        controlDelete($_conexion,$entrada);
        break;
        default:
        echo json_encode(["metodo"=>"otro"]);
        break;
}

//Empecemos con las funciones!
function controlGet($_conexion){
    if(isset($_GET["nombre_desarrolladora"])&&!empty($_GET["nombre_desarrolladora"])){
        $consulta="SELECT * FROM desarrolladoras WHERE nombre_desarrolladora= :c";
        $stmt=$_conexion->prepare($consulta);
        $stmt->execute(["c"=>$_GET["nombre_desarrolladora"]]);
    }else{
        $consulta="SELECT * FROM desarrolladoras";
        $stmt=$_conexion->prepare($consulta);
        $stmt->execute();
    }
    $res=$stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($res);
}
function controlPut($_conexion,$entrada){
    $consulta="UPDATE desarrolladoras SET ciudad=:c, anno_fundacion=:a WHERE nombre_desarrolladora=:n";
    $stmt=$_conexion->prepare($consulta);
    $stmt->execute([
        "c"=>$entrada["ciudad"],
        "a"=>$entrada["anno_fundacion"],
        "n"=>$entrada["nombre_desarrolladora"]
    ]);
    if($stmt){
        echo json_encode(["mensaje"=>"La desarrolladora se ha modificado correctamente"]);

    }else{
        echo json_encode(["mensaje"=>"No se ha ejecutado correctamente el cambio"]);    
    }
}

function controlDelete($_conexion,$entrada){
    $consulta="DELETE FROM desarrolladoras WHERE nombre_desarrolladora=:n";
    $stmt=$_conexion->prepare($consulta);
    $stmt->execute([
        "n"=>$entrada["nombre_desarrolladora"]
    ]);
    if($stmt){
        echo json_encode(["mensaje"=>"La desarrolladora se ha borrado correctamente"]);

    }else{
        echo json_encode(["mensaje"=>"No se ha ejecutado correctamente el delete"]);    
    }
}   



?>