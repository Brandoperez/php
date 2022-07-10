<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aProductos = array();
$aProductos[] = array(
    "nombre" => "Smart TV 55\" 4k UHD",
    "marca" => "Hitachi",
    "modelo" => "65254lk",
    "stock" => 25,
    "precio" => 69000,
);
$aProductos[] =  array(
    "nombre" => "Lavadora Wirpool",
    "marca" => "Wirpooll",
    "modelo" => "JB652",
    "stock" => 12,
    "precio" => 70000,
);
$aProductos[] = array(
    "nombre" => "Tablet Sansumg lite",
    "marca" => "Sansumg",
    "modelo" => "Lite",
    "stock" => 2,
    "precio" => 25000,
);
$aProductos[] = array(
    "nombre" => "licuadora Oster",
    "marca" => "Oster",
    "modelo" => "NU320",
    "stock" => 0,
    "precio" => 6300,
);
$aProductos[] = array(
    "nombre" => "Heladera Ejecutiva Bancho",
    "marca" => "Bancho",
    "modelo" => "6523mlk",
    "stock" => 16,
    "precio" => 36000,
);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suma con for</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Listado de Productos con for</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Stock</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $resultado = 0;
                        for($contador = 0; $contador < count($aProductos); $contador++) {
                            $resultado += $aProductos[$contador]["precio"];
                        ?>

                        <tr>
                            <td><?php echo $aProductos[$contador]["nombre"];?></td>
                            <td><?php echo $aProductos[$contador]["marca"]; ?></td>
                            <td><?php echo $aProductos[$contador]["modelo"]; ?></td>
                            <td><?php echo $aProductos[$contador]["stock"] >= 10? "Hay Stock" : ($aProductos[$contador]["stock"] <= 10 && $aProductos[$contador]["stock"] == 0? "Hay poco Stock" : "No hay stock"); ?></td>
                            <td><?php echo $aProductos[$contador]["precio"]; ?></td>
                            <td><button class="btn btn-primary">Comprar</button></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-12">
                        <p>La sumatorio de los productos es: <?php echo $resultado; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>