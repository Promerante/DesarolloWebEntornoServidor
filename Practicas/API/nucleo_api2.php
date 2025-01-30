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
        // controlPut($_conexion);
        break;
    case "Delete":
        // controlDelete($_conexion);
        break;
        default:
        echo json_encode(["metodo"=>"otro"]);
        break;
}
//Empecemos con las funciones!
function controlGet($_conexion){
    if(isset($_GET["ciudad"])&&$_GET["ciudad"]!=""){
        $consulta="SELECT * FROM desarrolladoras WHERE ciudad= :c";
        $stmt=$_conexion->prepare($consulta);
        $stmt->execute(["c"=>$_GET["ciudad"]]);
    }else{
        $consulta="SELECT * FROM desarrolladoras";
        $stmt=$_conexion->prepare($consulta);
        $stmt->execute();
    }
    $res=$stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($res);
}
function($_conexion,$entrada){
   $consulta="INSERT INTO desarrolladoras(id,nombre_desarrolladora,ciudad,anno_fundacion) VALUES (:i,:n,:c,:a)";
   $stmt=$_conexion->prepare($consulta);
   $stmt->execute([
    "i"=>$entrada["id"],
    "n"=>$entrada["nombre_desarrolladora"],
    "c"=>$entrada["ciudad"],
    "a"=>$entrada["anno_fundacion"],
    
   ]);
   if($stmt){
    echo json_encode(["mensaje"=>"Se ha insertado correctamente la fila"]);
   }else{
    echo json_encode(["mensaje"=>"La has liado loquete"]);
   }

    
}
?>
