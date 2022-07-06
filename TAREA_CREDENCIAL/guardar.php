<?php
require "conexion.php"; // con esto hacemos llamar al archivo conecion para que luego se conecte a la base de datos
$nombre  = $_POST['nombre']; // guardamos los datos que escriben los usuario a una variables que establecesmos
$curp    = $_POST['curp']; // utliando el NAME de los cada input,select, radio, chechbox que establecimos em el formulario
$carrera = $_POST['carera'];
// ESTRUCTURA PARA RECIBIR LAS img
$rutatemporal = $_FILES['img']['tmp_name'];
$rutaservidor = 'imagenes';
$nombreimg    = $_FILES['imgagen']['name']; // EL img es el NAME que le tengo puesto en el input file
$pesofoto     = $_FILES['imagen']['size'];
$tipofoto     = $_FILES['imagen']['type'];

date_default_timezone_set('UTC');
$nombreimgunico = date('Y-m-d-h:i:s') . "-" . $nombreimg;

$rutadestino = $rutaservidor . '/' . $nombreimgunico;
//validamos que la img no pese mas de una mega
if ($pesofoto > 900000) {
        echo ' <script>
          alert ("La imagen supera el peso de 1MB");
          window.history.go(-1);
          </script>';
        exit;
}

//movemos la imagne selecinada  auna carpeta que le asignemos si tiene alguno de de estos formatos
if ($tipofoto == "image/jpeg" || $tipofoto == "image/png" || $tipofoto == "image/gif" || $tipofoto == "image/jpg" || $tipofoto == "image/svg+xml") {
        move_uploaded_file($rutatemporal, $rutadestino);
} else {
        echo ' <script>
          alert ("El archivo que instenta subir NO es una IMAGEN");
          window.history.go(-1);
          </script>';
}

//INSERTAMOS los datos en la TABLA DE LA BD
$insertar = "INSERT INTO usuarios (nombre,curp,carrera,foto_ruta) VALUES ('$nombre','$curp','$carrera','$rutadestino')"; // en el primer parecntesis se escribe los nobres qque le pusiste a las columas de la tabla de la BD, y en el segundo parentesis colocalas las variables en donde se guardan los datos  que escribe el usuario

//validar usuarios si se encunetra registrado ne la BD
$verificar_usuario = mysqli_query($conectar, "SELECT * FROM usuarios WHERE curp='$curp' ");
if (mysqli_num_rows($verificar_usuario) > 0) {
        echo ' <script>
          alert ("El USUARIO ya se encuentra registrado");
          location.href="index.php";
          </script>';

        exit; // si el usuario ya esta registardo sale de la pagina y no guarda ningun dato
}

$query = mysqli_query($conectar, $insertar);
if ($query) {
        echo '<script>
        alert ("El USUARIO ha sido guardado");
        location.href="mostrar_credenciales.php";
        </script>';
} else {
        echo '<script>
        alert ("ERROR AL GUARDAR LOS DATOS");
        window.history.go(-1);
        </script>';
}
// location.href="index.php";