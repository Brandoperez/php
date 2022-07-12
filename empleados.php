<?php 
$aEmpleados = array();
$aEmpleados[] = array(
    "dni" => "95969895",
    "nombre" => "Brando Perez",
    "bruto" => 52400,
);
$aEmpleados[] = array(
    "dni" => "95908970",
    "nombre" => "Andrés Urdaneta",
    "bruto" => 55300,
);
$aEmpleados[] = array(
    "dni" => "25818340",
    "nombre" => "Ana Valle",
    "bruto" => 60800,
);
$aEmpleados[] =  array(
    "dni" => "12507705",
    "nombre" => "Jeronimo Perez",
    "bruto" => 150000,
);
$aEmpleados[] = array(
    "dni" => "27058000",
    "nombre" => "Emperatriz Perez",
    "bruto" => 250000,
);

function calcularNeto($bruto){
    $resultado = $bruto - ($bruto * 0.17);
    return $resultado;
}


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Empleados</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-5 text-center">
                <h1>Lista de Empleados</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Sueldo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($aEmpleados as $empleado) { ?>
                        <tr>
                            <td><?php echo $empleado["dni"];?></td>
                            <td><?php echo strtoupper($empleado["nombre"]);?></td>
                            <td><?php echo number_format(calcularNeto($empleado["bruto"], 2, ",","."));?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>