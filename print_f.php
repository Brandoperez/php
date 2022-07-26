<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function print_f($variable){
    if(is_array($variable)){
        $archivo1 = fopen("datos.txt", "a+");
        
        foreach($variable as $item){
            fwrite($archivo1, $item);
        }
        fclose($archivo1);
    }else{
        file_put_contents("datos.txt", $variable);
    }
    echo "archivo generado";
}

$aNotas = array(8, 7, 5, 5, 3);
$smg = "Este es un mensaje";
?>