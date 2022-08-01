<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//preguntar si existe
if(file_exists("archivo.txt")){
    //leerlo y almacenar el contenido en jsonClientes
    $jsonClientes  = file_get_contents("archivo.txt");

    //convertir el json en un array llamado aClientes
    $aClientes = json_decode($jsonClientes, true);
}else{
    //sino existe
    //Creamos un aClientes inicializado con un array vacio
    $aClientes = array();
}

if($_POST){
    $documento = trim($_POST["txtDni"]);
    $nombre = trim($_POST["txtNombre"]);
    $telefono = trim($_POST["txtTelefono"]);
    $correo = trim($_POST["txtCorreo"]);

    $aClientes[] = array("documento" => $documento,
                         "nombre" => $nombre,
                         "telefono" => $telefono,
                         "correo" => $correo);

                         //convertir el array de clientes a json
                         $jsonClientes = json_encode($aClientes);

                         //convertir el string jsonClientes en el archivo.txt
                         file_put_contents("archivo.txt", $jsonClientes);
}



?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Clientes</title>
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
                        <label for="txtDni">DNI:*</label>
                        <input type="text" id="txtDni" name="txtDni" class="form-control">
                    </div>
                    <div class="my-2">
                        <label for="txtNombre">Nombre:*</label>
                        <input type="text" id="txtNombre" name="txtNombre" class="form-control">
                    </div>
                    <div class="my-2">
                        <label for="txtTelefono">Teléfono:</label>
                        <input type="text" id="txtTelefono" name="txtTelefono" class="form-control">
                    </div>
                    <div class="my-2">
                        <label for="txtCorreo">Correo:*</label>
                        <input type="text" id="txtCorreo" name="txtCorreo" class="form-control">
                    </div>
                    <div class="my-2">
                        <label for="">Archivo adjunto:</label>
                        <input type="file" name="archivo" id="archivo" accept=".jpg, .jpeg, .png" >
                        <small class="d-block">Archivos permitidos: .jpg .jpeg .png</small>
                    </div>
                    <div class="my-2">
                        <button type="submit" name="btnGuardar" class="btn btn-primary">Guardar</button>
                        <button type="submit" name="btnNuevo" class="btn btn-danger">Nuevo</button>
                    </div>
                </form>
            </div>
            
            <div class="col-5 py-4">
                <table class="table table-hover shadow border">
                    <thead>
                        <tr>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <?php foreach($aClientes as $cliente): ?>
                        <tr>
                            <td></td>
                            <td><?php echo $cliente["documento"]; ?></td>
                            <td><?php echo $cliente["nombre"]; ?></td>
                            <td><?php echo $cliente["correo"];?></td>
                            <td>
                             <a href=""><i class="bi bi-trash"></i></a>
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