<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_POST){
    
    $usuario = $_REQUEST ["txtUsuario"];
    $clave = $_REQUEST ["txtClave"];

        if($usuario != "" && $clave !=""){
            header("Location: acceso_confirmado.php");
        }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-3 py-3">
                <h1>Formulario</h1>
            </div>
        </div>
        <div class="row">
            <?php if(isset($mensaje)) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $mensaje; ?>
                </div>
                <?php endif; ?>
            <div class="col-12">
                <form method="POST" action="">
                    <div class="my-2 ">
                        <label for="">Usuario:
                            <input type="text" id="txtUsuario" name="txtUsuario" class="form-control">
                        </label>
                    </div>
                    <div class="my-2">
                        <label for="">Clave:
                            <input type="password" id="txtClave" name="txtClave" class="form-control">
                        </label>
                    </div>
                    <div class="my-2">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>