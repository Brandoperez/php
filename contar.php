<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


function contar($aArray){
    $contador = 0;
    foreach($aArray as $array){
        $contador++;
    } return $contador;
}

$aNotas = array(9,8,9.5,6,3,4);

$aPacientes = array();
$aPacientes[] = array(
    "dni" => "95969895",
    "nombre" => "Brando Perez",
    "edad" => 24,
    "peso" => 87.20
);
$aPacientes[] = array(
    "dni" => "95908970",
    "nombre" => "Andrés Urdaneta",
    "edad" => 28,
    "peso" => 80.00
);
$aPacientes[] = array(
    "dni" => "96005535",
    "nombre" => "Tady Urdaneta",
    "edad" => 31,
    "peso" => 61.00
);
$aProductos = array();
$aProductos[] = array(
    "dni" => "95969895",
    "nombre" => "Brando Perez",
    "edad" => 24,
    "peso" => 87.20
);
$aProductos[] = array(
    "dni" => "95908970",
    "nombre" => "Andrés Urdaneta",
    "edad" => 28,
    "peso" => 80.00
);

echo "<br>Cantidad de productos: " .contar($aProductos) . "<br>";
echo "Cantidad de pacientes: " .contar($aPacientes) . "<br>";
echo "Cantidad de notas: " .contar($aNotas);
?>