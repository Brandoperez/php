<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aAlumnos = array();
$aAlumnos[] = array("Brando Perez", "Notas" => array(9.5, 9.8));
$aAlumnos[] = array("Andrés Urdaneta", "Notas" => array(10.0, 7.3));
$aAlumnos[] = array("Linda Gonzalez", "Notas" => array(8.3, 9.6));
$aAlumnos[] = array("Maikol Chirinos", "notas" => array(7.5, 4.3));

function promediar($aNumeros){
    $suma = 0;
    foreach($aNumeros as $numero){
        $suma += $numero;
    }return $suma / count($aNumeros);
}

?>