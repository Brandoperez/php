<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(file_exists("archivo1.txt")){
    $jsonClientes = file_get_contents("archivo1.txt");
    $aClientes = json_decode($jsonClientes, true);
}else{
    $aClientes = array();
}
if($_POST){
    $nombre = $_POST["txtNombre"];
    $dni = $_POST["txtDni"];
    $telefono = $_POST["txtTelefono"];
    $correo = $_POST["txtCorreo"];

    $aClientes[] = array("nombre" => $nombre,
                         "dni" => $dni,
                         "telefono" => $telefono,
                         "correo" => $correo
);

    $jsonClientes = json_encode($aClientes);
    file_put_contents("archivo1.txt", $jsonClientes);

if(isset($_GET["pos"])){
    $pos = $_GET["pos"];
    unset($aClientes[$pos]);
}


}



?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Clientes Practica</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body>
   <div class="container">
    <div class="row">
        <div class="col-12 text-center py-5">
            <h1>Registro de Clientes</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-5 py-3">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="my-2">
                    <label for="txtNombre">Nombre:* </label>
                    <input type="text" id="txtNombre" name="txtNombre"  class="form-control">
                </div>
                <div class="my-2">
                    <label for="txtDni">DNI:* </label>
                    <input type="text" id="txtDni" name="txtDni" class="form-control">
                </div>
                <div class="my-2">
                    <label for="txtTelefono">Teléfono:</label>
                    <input type="text" id="txtTelefono" name="txtTelefono" class="form-control">
                </div>
                <div class="my-2">
                    <label for="txtCorreo">Correo electrónico:* </label>
                    <input type="text" id="txtCorreo" name="txtCorreo" class="form-control">
                </div>
                <div class="my-2">
                    <label for="">Adjuntar Archivo</label>
                    <input type="file" id="archivo" accept=".jpg, .jpeg, .png">
                    <small class="d-block">Archivos permitidos: .jpg, .jpeg, .png </small>
                </div>
                <div class="my-2">
                    <button type="submit" class="btn btn-primary" name="btnEnviar">Enviar</button>
                    <button type="submit" class="btn btn-danger" name="btnNuevo">Nuevo</button>
                </div>
            </form>
        </div>
        <div class="col-5 offset-1 py-4">
            <table class="table table-hover border shadow">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>DNI</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($aClientes as $pos => $cliente): ?>
                    <tr>
                        
                        <td><?php echo $cliente["nombre"];?></td>
                        <td><?php echo $cliente["dni"]; ?></td>
                        <td><?php echo $cliente["correo"]; ?></td>
                        <td>
                        <a href="registro_clientes.php?=pos<?php echo $pos ?>"><i class="bi bi-trash"></i></a>
                        <a href=""><i class="bi bi-pencil"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
   </div>
</body>
</html>