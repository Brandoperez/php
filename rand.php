<?php 
ini_set ('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$valor = rand(1, 5);

/*if($valor == 1 || $valor == 3 || $valor == 5){
    echo "El numero $valor es impar";
}else{
    echo "el numero es par";
}*/
if($valor %2 == 0){
    echo "El numero $valor es par";
}else{
    echo "el numeron $valor es impar";
}



?>