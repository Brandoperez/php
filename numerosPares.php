<?php
//CONTADOR
for ($i=0; $i <=100; $i++){
    echo $i . "<br>";
}
//CONTADOR DE 2 EN 2
for ($i=2; $i <= 100; $i+=2){
    echo $i . "<br>";
    if($i == 60){
        exit;
    }
}
//CONTADOR DE 3 EN 3
for ($i=3; $i <= 60; $i+=3){
    echo $i . "<br>";
}

?>