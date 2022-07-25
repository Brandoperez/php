<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//Definición (El nombre del array de la función no tiene nada que ver con el de la ejecución debe ser un nombre genérico)
function promediar($aNumeros) {
   $suma = 0;
   foreach($aNumeros as $numero){
    $suma += $numero;
   }
    return $suma / count($aNumeros);
}


//uso 
$aNotas = array (8, 4, 5, 3, 9, 1);
echo "El promedio es " . promediar($aNotas) . "<br>";

?>