<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
$aPacientes[] = array(
    "dni" => "25818340",
    "nombre" => "Tahis Barboza",
    "edad" => 59,
    "peso" => 84.50
);
$aPacientes[] = array(
    "dni" => "23460294",
    "nombre" => "Valeria Urdaneta",
    "edad" => 6,
    "peso" => 22.30
);
$aPacientes[] = array(
    "dni" => "27058000",
    "nombre" => "Brayan Pérez",
    "edad" => 22,
    "peso" => 70
);
$aPacientes[] = array(
    "dni" => "12507705",
    "nombre" => "Odicry Inciarte",
    "edad" => 41,
    "peso" => 61.30
);
$aPacientes[] = array(
    "dni" => "12100116",
    "nombre" => "Victoria Torres",
    "edad" => 9,
    "peso" => 30.10
);
$aPacientes[] = array(
    "dni" => "23562145",
    "nombre" => "Deivis Perez",
    "edad" => 46,
    "peso" => 90.00
); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de pacientes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Listado de Pacientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th>Dni</th>
                            <th>Nombre y Apellido</th>
                            <th>Edad</th>
                            <th>Peso</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($aPacientes as $paciente) { 
                               /* print_r($paciente);
                                exit;*/
                                ?>
                            <tr>
                            <td><?php echo $paciente["dni"];?></td>
                            <td><?php echo $paciente["nombre"];?></td>
                            <td><?php echo $paciente["edad"];?></td>
                            <td><?php echo $paciente["peso"];?></td>
                        <?php } ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </main>    
</body>
</html>