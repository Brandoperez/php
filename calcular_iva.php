<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$iva = 21;
$precioConIva = 0;
$precioSinIva = 0;
$ivaCantidad = 0;

if($_POST){
    $iva = $_POST["lstIva"];
    $precioConIva = ($_POST["txtPrecioConIva"]) > 0? $_POST["txtPrecioConIva"] : 0;
    $precioSinIva = ($_POST["txtPrecioSinIva"]) > 0? $_POST["txtPrecioSinIva"] : 0;
    $ivaCantidad = $precioConIva - $precioSinIva;
        //Sin Iva
        if($precioSinIva > 0){
            $precioConIva = $precioSinIva * ($iva / 100 + 1);
        }
        //Con Iva
        if($precioConIva > 0){
            $precioSinIva = $precioConIva / ($iva / 100 + 1);
        }
        $ivaCantidad = $precioConIva - $precioSinIva;

}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular Iva</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Calculadora de Iva</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <form method="POST" action="">
                    <div class="my-3">
                        <label for="">Iva:
                            <select name="lstIva" id="lstIva" class="form-control">
                                <option value="10.5">10.5</option>
                                <option value="19">19</option>
                                <option value="21">21</option>
                                <option value="27">27</option>
                            </select>
                        </label>
                    </div>
                    <div class="my-3">
                        <label for="">Precio sin Iva:</label>
                        <input type="text" id="txtPrecioSinIva" name="txtPrecioSinIva" class="form-control">
                    </div>
                    <div class="my-3">
                        <label for="">Precio con Iva</label>
                        <input type="text" id="txtPrecioConIva" name="txtPrecioConIva" class="form-control">
                    </div>
                    <div class="my-3">
                        <button class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>

            <div class="col-6 my-3">
                <table class="table table-hover border">
                    <tr>
                        <th>Iva:</th>
                        <td><?php echo $iva; ?>%</td>
                    </tr>
                    <tr>
                        <th>Precio Sin Iva:</th>
                        <td><?php echo number_format($precioSinIva, 2, ",", "."); ?></td>
                    </tr>
                    <tr>
                        <th>Precio Con Iva:</th>
                        <td><?php echo number_format($precioConIva, 2, ",", "." ) ; ?></td>
                    </tr>
                    <tr>
                        <th>IVA Cantidad:</th>
                        <td><?php echo number_format($ivaCantidad, 2, ",", "."); ?></td>
                    </tr>
                </table>
            </div>
        </div>

    </div>

</body>

</html>