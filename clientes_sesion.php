<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (isset($_SESSION["listadoClientes"])) {
    //si existe la variable de sesion LISTADOCLIENTES asigno su contenido a aClientes
    $aClientes = $_SESSION["listadoClientes"];
} else {
    $aclientes = array();
}


//Asignamos en variables los datos que vienen del formulario
if ($_POST) {
    if (isset($_POST["btnEnviar"])) {
        $nombre = $_POST["txtNombre"];
        $dni = $_POST["txtDni"];
        $telefono = $_POST["txtTelefono"];
        $edad = $_POST["txtEdad"];

        //Creamos un array que contendra el listado de clientes
        $aClientes[] = array(
            "nombre" => $nombre,
            "dni" => $dni,
            "telefono" => $telefono,
            "edad" => $edad
        );
        //ACUALIZA EL CONTENIDO DE LA VARIABLE SESSION
        $_SESSION["listadoClientes"] = $aClientes;
    }
    //si hace click en eliminar
    if (isset($_POST["btnEliminar"])) {
        session_destroy();
        $aClientes = array();
    }
}

if (isset($_GET["pos"])) {
    //recupero el dato que viene por la query
    $pos = $_GET["pos"];
    //elimina la posicion
    unset($aClientes[$pos]);
    //Actualizo l avariable de session con el array actualizado
    $_SESSION["listadoClientes"] = $aClientes;
    header("Location: clientes_session.php");
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Clientes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Listado de Clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-4 py-3">
                <form action="" method="POST">
                    <div class="my-2">
                        <label for="">Nombre:
                            <input type="text" id="txtNombre" name="txtNombre" class="form-control">
                        </label>
                    </div>
                    <div class="my-2">
                        <label for="">DNI:
                            <input type="text" id="txtDni" name="txtDni" class="form-control">
                        </label>
                    </div>
                    <div class="my-2">
                        <label for="">Teléfono:
                            <input type="text" id="txtTelefono" name="txtTelefono" class="form-control">
                        </label>
                    </div>
                    <div class="my-2">
                        <label for="">Edad:
                            <input type="text" id="txtEdad" name="txtEdad" class="form-control">
                        </label>
                    </div>
                    <div class="my-2 py-2">
                        <button type="submit" class="btn btn-primary px-1" name="btnEnviar">Enviar</button>
                        <button type="submit" class="btn btn-danger" name="btnEliminar">Eliminar</button>
                    </div>
                </form>
            </div>
            <div class="col-6">
                <table class="table table-hover shadow border">
                    <thead>
                        <tr>
                            <th>Nombre:</th>
                            <th>DNI:</th>
                            <th>Telefono:</th>
                            <th>Edad:</th>
                            <th>Acciones:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($aClientes as $pos => $cliente) {  ?>
                            <tr>
                                <td><?php echo $cliente["nombre"]; ?></td>
                                <td><?php echo $cliente["dni"]; ?></td>
                                <td><?php echo $cliente["telefono"]; ?></td>
                                <td><?php echo $cliente["edad"]; ?></td>
                                <td><a href="clientes_session.php?pos=<?php echo $pos; ?>"><i class="bi bi-trash"></i></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</body>

</html>