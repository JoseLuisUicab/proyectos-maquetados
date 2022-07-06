<?php
include "conexion.php";

$nombre = $_POST['nombre'];
$curp = $_POST['curp'];
$carera = $_POST['carera'];
$ciudad = $_POST['ciudad'];
$rutaTemporal   = $_FILES['imagen']['tmp_name']; /* recibir la imagen tmp guarda el archivo*/
$rutaEnServidor = 'imagen'; /* nombre de mi carpeta */
$nombreImagen   = $_FILES['imagen']['name']; /* guardar el nombre de la imagen */
$pesofoto    = $_FILES['imagen']['size']; /*nos traemos el peso de la imagen*/
$tipoFoto    = $_FILES['imagen']['type']; /*nos traemos el tipo de imagen png,jpg,gif,svg*/

date_default_timezone_set('UTC'); /* obtenemos la zona */
$nombreimagenUnico = date('Y-m-d-h-i-s') . "-" . $nombreImagen; /* guardar la fecha y hora imagen */

$rutaDestino = $rutaEnServidor . '/' . $nombreimagenUnico;

if ($pesofoto > 900000) {
echo'
<script>
alert("la imagen rebasa los 9MB");
window.history.go(-1);
</script>
';
exit;
}
if ($tipoFoto=="image/jpeg" || $tipoFoto=="image/png" || $tipoFoto=="image/gif" || $tipoFoto=="image/jpg" || $tipoFoto=="image/svg+xml") {
  move_uploaded_file($rutaTemporal, $rutaDestino);
}else{
  echo '<script>
      alert("no es una IMAGEN!!!");
window.history.gol(-1);
</script>';
exit;
}


//INSERTAMOS los datos en la TABLA DE LA BD
$insertar = "INSERT INTO datos (nombre,curp,carera,ciudad,imagen) VALUES ('$nombre','$curp','$carera','$ciudad','$rutaDestino')";

//validar usuarios si se encunetra registrado ne la BD
$verificar_usuario = mysqli_query($conectar , "SELECT * FROM datos WHERE curp='$curp' ");
if(mysqli_num_rows($verificar_usuario) > 0 ){
  echo ' <script>
          alert ("El USUARIO ya se encuentra registrado");
          location.href="index.php";
          </script>';

   exit; 
}


$query = mysqli_query($conectar, $insertar);
if ($query){
  echo '<script>
        alert ("El USUARIO ha sido guardado");
        location.href="index.php"; 
        </script>';
}else{
  echo '<script>
        alert ("ERROR AL GUARDAR LOS DATOS");
        window.history.go(-1);
        </script>';
}

?>