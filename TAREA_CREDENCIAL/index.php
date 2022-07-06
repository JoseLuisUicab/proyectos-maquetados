<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilos.css">
  <script src="https://kit.fontawesome.com/59df0bc859.js" crossorigin="anonymous"></script>

  <title>Datos Personales</title>

</head>

<body>
  <?php 
    include("cabeza.php");
  ?>
  <br>
  <form class="ancho" id="form1" name="form1" action="recibir.php" enctype="multipart/form-data" method="post">

    <h2 id="dat">Ingrese sus datos</h2>
    <div id="ver">
      <a href="mostrar.php">Ver Credenciales <i class="fas fa-arrow-circle-right"></i></a>
    </div>


    <br><br>
    <div class="caja">
      <div class="texto">
        <script src="https://kit.fontawesome.com/59df0bc859.js" crossorigin="anonymous"></script>
        <p>Nombre</p>
        <p>Curp</p>
        <p>Carrera</p>
        <p>Ciudad</p>
      </div>
      <div class="meterd">
        <input type="text" required name="nombre">
        <input type="text" required name="curp">
        <select name="carera" id="">
          <option value="ING.Gestion Empresarial">ING.Gestion Empresarial</option>
          <option class="te" value="ING.Ambiental">ING.Ambiental</option>
          <option class="te" value="ING.Bioquimica">ING.Bioquimica</option>
          <option class="te" value="NG Biomedica">ING Biomedica</option>
          <option class="te" value="ING Electrica">ING Electrica</option>
          <option class="te" value="ING Sistemas Computacionales">ING Sistemas Computacionales</option>
          <option class="te" value="ING Mecanica">ING Mecanica</option>
          <option class="te" value="ING Civil">ING Civil</option>
          <option class="te" value="ING Industrial">ING Industrial</option>

        </select>
        <input type="text" name="ciudad" required>
      </div>
      <p id="archi">Subir tu Foto: <input type="file" name="imagen"> </p>
      <br>
      <div id="bot">
        <input type="submit" name="guardarfoto" id="guardarfoto" value="Guadar Datos">
      </div>
    </div>


  </form>

</body>

</html>