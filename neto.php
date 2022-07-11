<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function calcularNeto($bruto){
    $resultado = $bruto - ($bruto * 0.17);
    return $resultado;
}

echo "el sueldo neto es $: " .calcularNeto(80000);

?>