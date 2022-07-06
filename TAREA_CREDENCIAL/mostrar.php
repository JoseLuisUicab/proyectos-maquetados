<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilos.css">
  <script src="https://kit.fontawesome.com/59df0bc859.js" crossorigin="anonymous"></script>
  <title>Registrados</title>
</head>

<body>
  <?php
  include("cabeza1.php");
  ?>
  <br>
  <br>
  <div id="c1">
    <div class=" regre">
      <a href="index.php"> <i class="fas fa-arrow-circle-left"></i> Regresar</a>
    </div>
    <br><br>
    <?php
      include "conexion.php";
      //haceemos la consulta de todos los usuarios
      $todos_usuarios = " SELECT * FROM datos ORDER BY id ASC";
      $resultado = mysqli_query($conectar, $todos_usuarios);
      while ($row = mysqli_fetch_assoc($resultado)) {
      ?>
    <!--se crea un contenedor para cada credecnial-->
    <div id="cre">
      <table>
        <tr>
          <!--fila 1-->
          <td rowspan="4"><img src="<?php echo $row['imagen']; ?>" alt="" id="fo"></td>
          <!--columna 1-->
          <td class="neg">Nombre: </td>
          <!--columna 2-->
          <td><?php echo $row['nombre']; ?></td>
          <!--columna 3-->
        </tr>
        <tr>
          <!--fila 2-->
          <td class="neg">Curp: </td>
          <!--columna 2-->
          <td><?php echo $row['curp']; ?></td>
          <!--columna 3-->
        </tr>
        <tr>
          <!--fila 3-->
          <td class="neg">Carrera: </td>
          <!--columna 2-->
          <td><?php echo $row['carera']; ?></td>
          <!--columna 3-->
        </tr>
        <tr>
          <!--fila 4-->
          <td class="neg">Ciudad: </td>
          <!--columna 2-->
          <td><?php echo $row['ciudad']; ?></td>
          <!--columna 3-->
        </tr>
      </table>
    </div>
    <?php
      }
      mysqli_free_result($resultado); // deja de buscar datos en la base de datos una ves mostrados todo de la tabla
      ?>
  </div>

  </div>


</body>

</html>