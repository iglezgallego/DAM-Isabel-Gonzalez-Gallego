<?php
session_start();
// Abro la conexión con la base de datos
include "conexiondb.php";
?>

<!DOCTYPE html>
<html>
<head>
  <title>Tabla de datos</title>
  <!-- Estilos de Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
     <!--boton de atras -->   
    <nav class="navbar navbar-dark bg-dark">
      <div class="ml-auto">
        <button class="btn btn-secondary" onclick="window.location.href='escritorio.php'">Atrás</button>
      </div>
    </nav>
    
    <div class="container mt-3">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Columna</th>
            <th>Valor</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $peticion = "SHOW COLUMNS FROM ".$_GET['tabla'].";";
          $resultado = mysqli_query($enlace, $peticion);

          while ($fila = $resultado->fetch_assoc()) {
            $peticion2 = "SELECT ".$fila['Field']." AS columna FROM ".$_GET['tabla']." WHERE Identificador = ".$_GET['id'].";";
            $resultado2 = mysqli_query($enlace, $peticion2);
            $fila2 = $resultado2->fetch_assoc();

            echo '<tr>';
            echo '<td>'.$fila['Field'].'</td>';
            echo '<td>'.$fila2['columna'].'</td>';
            echo '</tr>';
          }
          ?>
        </tbody>
      </table>
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    </body>
</html>