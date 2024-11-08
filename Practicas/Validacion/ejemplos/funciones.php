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

?>