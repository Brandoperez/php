<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aAlumnos = array();
$aAlumnos[] = array("nombre" => "Brando Perez","notas" => array(9.5, 9.8));
$aAlumnos[] = array("nombre" => "Andrés Urdaneta", "notas" => array(8.7, 10.0));
$aAlumnos[] = array("nombre" => "Karina Redondo", "notas" => array(5.3, 8.7));
$aAlumnos[] = array("nombre" => "Juana Bansadora", "notas" => array(7.6, 9.8));
$aAlumnos[] = array("nombre" => "Maikol Arrieta", "notas" => array(2.3, 5.6));

function promediar($aNumeros) {
    $suma = 0;
    foreach($aNumeros as $numero){
     $suma += $numero;
    }
     return $suma / count($aNumeros);
 }

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 py-5 text-center">
                <h1>Actas</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <table class="table table-hober border">
                    <thead>
                        <tr>
                            <th>Alumno</th>
                            <th>Nota 1</th>
                            <th>Nota 2</th>
                            <th>Promedio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php foreach($aAlumnos as $alumno) {  ?>

                            <td><?php echo $alumno["nombre"]; ?></td>
                            <td><?php echo $alumno["notas"]["0"]; ?></td>
                            <td><?php echo $alumno["notas"]["1"]; ?></td>
                            <td><?php echo promediar($alumno["notas"]); ?></td>
                        </tr>
                            <?php } ?>
                        
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-12">
                        <p>Promedio de la cursada:</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>