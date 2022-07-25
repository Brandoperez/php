<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_POST){
    $nombre = $_REQUEST ["txtNombre"];
    $dni = $_REQUEST ["txtDni"];
    $telefono = $_REQUEST ["txtTelefono"];
    $edad = $_REQUEST ["txtEdad"];

        if($nombre != "" && $dni != "" && $telefono != "" && $edad != ""){
            header("Location: resultado.php");
        } else {
            $mensaje = "Debe llenar todos los campos.";
        }
}


?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos Personales</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Formulario de Datos Personales</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form method="POST" action="resultado.php">
                    <div class="pb-3">
                        <label for="txtNombre">Nombre:</label>
                        <input type="text" id="txtNombre" name="txtNombre" class="form-control">
                    </div>
                    <div class="pb-3">
                        <label for="txtDni">DNI:</label>
                        <input type="text" id="txtDni" name="txtDni" class="form-control">
                    </div>
                    <div class="pb-3">
                        <label for="txtTelefono">Teléfono:</label>
                        <input type="text" name="txtTelefono" id="txtTelefono" class="form-control">
                    </div>
                    <div class="pb-3">
                        <label for="txtEdad">Edad:</label>
                        <input type="number" name="txtEdad" id="txtEdad" class="form-control">
                    </div>
                    <div class="pb-3">
                        <button class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>