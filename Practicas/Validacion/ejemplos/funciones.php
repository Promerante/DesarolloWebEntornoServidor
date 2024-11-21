<?php
    error_reporting(E_ALL);
    ini_set("display_errors",1);
function calcularDescuento(float $precio,int $descuento) : float{
  
  return $precio-$precio*$descuento/100;  
}
function calcularIVA($precio,$impuesto){
  $precio=match ($impuesto){
    "general"=> $precio*1.21, 
    "reducido"=> $precio*1.1,
    "superReducido"=>$precio*1.04,
  };
  return $precio;
}

function sanear(string $nombre): string{
  $nombre=htmlspecialchars(($nombre));//Hace que no lo interprete como codigo html
  $nombre=trim($nombre);//Quita los espacios en blanco del incio y el final de la string dada
  $nombre=preg_replace("/\s+/"," ",$nombre);
  return $nombre;
}
function validar( $edad) {
  if($edad==""){
    return false;
  }else if($edad<0){
    return "Tiene una edad negativa";
  }else if(!filter_var($edad,FILTER_VALIDATE_INT)){
    return "No has introducido un numero entero";
  }
  else{
    return $edad;
  }
  return 1;
}

?>