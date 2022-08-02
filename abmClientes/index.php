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
$pos = isset($_GET["pos"]) && $_GET["pos"] >= 0 ? $_GET["pos"] : "";

if($_POST){
    $documento = trim($_POST["txtDni"]);
    $nombre = trim($_POST["txtNombre"]);
    $telefono = trim($_POST["txtTelefono"]);
    $correo = trim($_POST["txtCorreo"]);
    $nombreImagen = "";

    if($pos >=0){
        if($_FILES["archivo"]["error"] === UPLOAD_ERR_OK) { 
            $nombreAleatorio = date("Ymdhmsi");
            $archivo_tmp = $_FILES["archivo"]["tmp_name"];
            $extension = strtolower(pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION));
            if($extension == "jpg" || $extension == "jpeg" || $extension == "png"){
            $nombreImagen = "$nombreAleatorio.$extension";
            move_uploaded_file($archivo_tmp, "imagenes/$nombreImagen");
    }
         //eliminar la imagen
         if($aClientes[$pos]["imagen"] != "" && file_exists("imagenes/".$aClientes[$pos])){
         unlink("imagenes/".$aClientes[$pos]["imagenes"]);
        }
   else{
    //Mantener el nombre que teniamos antes
    $nombreImagen = $aClientes[$pos]["imagen"];
}
        //ACTUALIZAR
        $aClientes[$pos] = array("documento" => $documento,
        "nombre" => $nombre,
        "telefono" => $telefono,
        "correo" => $correo,
        "imagen" => $nombreImagen);
 }else{
    if($_FILES["archivo"]["error"] === UPLOAD_ERR_OK) { 
        $nombreAleatorio = date("Ymdhmsi");
        $archivo_tmp = $_FILES["archivo"]["tmp_name"];
        $extension = strtolower(pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION));
        if($extension == "jpg" || $extension == "jpeg" || $extension == "png"){
        $nombreImagen = "$nombreAleatorio.$extension";
        move_uploaded_file($archivo_tmp, "imagenes/$nombreImagen");
}
 }
        //INSERTAR
        $aClientes[] = array("documento" => $documento,
        "nombre" => $nombre,
        "telefono" => $telefono,
        "correo" => $correo,
        "imagen" => $nombreImagen);

    }
                         //convertir el array de clientes a json
                         $jsonClientes = json_encode($aClientes);

                         //convertir el string jsonClientes en el archivo.txt
                         file_put_contents("archivo.txt", $jsonClientes);
}

if(isset($_GET["do"]) && $_GET["do"] == "eliminar"){
    //Eliminar la posición
    unset($aClientes[$pos]);
    //actualizar
    //Convertir el array en json
    $jsonClientes = json_encode($aClientes);
    //almacenar el json en el archivo
    file_put_contents("archivo.txt", $jsonClientes);
    //header("Location: index.php");
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
                        <input type="text" id="txtDni" name="txtDni" class="form-control" value="<?php echo isset($aClientes[$pos])? $aClientes[$pos]["documento"]: ""; ?>">
                    </div>
                    <div class="my-2">
                        <label for="txtNombre">Nombre:*</label>
                        <input type="text" id="txtNombre" name="txtNombre" class="form-control" value="<?php echo isset($aClientes[$pos])? $aClientes[$pos]["nombre"]: ""; ?>">
                    </div>
                    <div class="my-2">
                        <label for="txtTelefono">Teléfono:</label>
                        <input type="text" id="txtTelefono" name="txtTelefono" class="form-control" value="<?php echo isset($aClientes[$pos])? $aClientes[$pos]["telefono"]: ""; ?>">
                    </div>
                    <div class="my-2">
                        <label for="txtCorreo">Correo:*</label>
                        <input type="text" id="txtCorreo" name="txtCorreo" class="form-control" value="<?php echo isset($aClientes[$pos])? $aClientes[$pos]["correo"]: ""; ?>">
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
                        <th>Imagen</th>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <?php foreach($aClientes as $pos => $cliente): ?>
                        <tr>
                            <td>
                                <?php if($cliente["imagen"] !="") : ?>
                                    <img src="imagenes/<?php echo $cliente["imagen"]; ?>" img-thumbnail alt="">
                                <?php endif ?>    
                            </td>
                            <td><?php echo $cliente["documento"]; ?></td>
                            <td><?php echo $cliente["nombre"]; ?></td>
                            <td><?php echo $cliente["correo"];?></td>
                            <td>
                            <a href="index.php?pos=<?php echo $pos; ?>&do=editar"><i class="bi bi-pencil-fill"></i></a>
                            <a href="index.php?pos=<?php echo $pos; ?>&do=eliminar"><i class="bi bi-trash"></i></a>
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