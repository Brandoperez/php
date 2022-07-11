<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function calcularareaRect($base,$altura){
    $resultado = $base * $altura;
    return $resultado;
}
echo "el área es " .calcularareaRect(100,0.60). "<br>";
echo "el área es " .calcularareaRect(800,300);


?>