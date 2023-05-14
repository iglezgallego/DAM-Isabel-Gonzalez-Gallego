<?php 
//cargo SESSION y la conexion a la base de datos
session_start();
include "../config.php"
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title></title>
    
    <!--icono de la pestaña-->
    <link rel="icon" href="../assets/brand/bootstrap-logo.ico">
      
     <!-- pongo aquí JQuery --> 
    <script src="..app/lib/jquery-3.6.1.min.js"></script>
    
    <!-- Pongo aqui fontawesome -->
    <script src="https://kit.fontawesome.com/dc05bdbd15.js" crossorigin="anonymous"></script>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">
    
    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        @font-face{
            font-family: gaston;
            src: url("../fuentes/gaston.otf")
        }
        
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    
        .botonanadir {
        float:right;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        background-color: #3498db;
        color: #fff;
        font-size: 13px;
      }

      .botonanadir i {
        margin-right: 5px;
      }
        
    </style>

    
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    <!-- Barra cabecera -->
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <div id="contenedorlogo" style="margin-left:50px;">
            <img src="../assets/brand/bootstrap-logo.png" alt="logo" style="height:50px;width:50px;margin-top:6px;">
            <h1 style="float:right; font-family:gaston;color:#DBD5DC; padding-left:10px; font-size:50px;">YourGoals</h1>  
        </div>
        <p style="color:#DBD5DC; padding-left:10px; font-size:20px;">Panel de control - Insertar nuevo tema</p>
        <!-- Botones de salir y atrás -->
        <div class="botonesbarra" style="display: inline-flex; align-items: center;">
            <a class="nav-link px-3" style="color:#D3D3D3;" href="panelcontrol.php?tabla=temas">Atrás</a>
            <a class="nav-link px-3" style="color:#D3D3D3;margin-right:50px;" href="../login.php">Salir</a>
        </div>
    </header>

<!-- Barra menu izquierda -->
<div class="container-fluid">
  <div class="row">
    
      
      <!-- Botones quitados en la cabecera -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    
     <!-- Pagina principal del panel de control -->
      <div class="table-responsive">
          <!-- formulario para el insert-->
        <form class="needs-validation" novalidate method="POST" action="insertar.php?tabla='.$_GET['tabla'].'">
          <!-- input para saber que tabla estamos pasando -->
            <?php
                $consulta = "SHOW COLUMNS FROM " . $_GET['tabla'] . ";";
                $resultado = $conexion->query($consulta);
                //No mostrar en el formulario los campos Identificador e idpadre
                while ($fila = $resultado->fetch_assoc()) {
                    if ($fila['Field'] == "Identificador" || $fila['Field'] == "idpadre") {
                        continue;
                    }
                    echo '<input type="hidden" class="form-control" id="address2" name="tabla" value="' . $_GET['tabla'] . '">';

                    echo '
                    <div class="mb-3">
                        <label for="address2" style="text-transform:capitalize;">' . $fila['Field'] . '</label>';

                    // Generar el campo de entrada según el tipo de dato que tengamos en la base de datos
                    if (strpos($fila['Type'], 'int') !== false || strpos($fila['Type'], 'float') !== false) {
                        echo '<input type="number" class="form-control" id="' . $fila['Field'] . '" name="' . $fila['Field'] . '" required>';
                    } elseif (strpos($fila['Type'], 'text') !== false || strpos($fila['Type'], 'char') !== false) {
                        echo '<input type="text" class="form-control" id="' . $fila['Field'] . '" name="' . $fila['Field'] . '" required>';
                    } elseif (strpos($fila['Type'], 'date') !== false) {
                        echo '<input type="date" class="form-control" id="' . $fila['Field'] . '" name="' . $fila['Field'] . '" required>';
                    }

                    echo '</div>';
                }
                ?>
            
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Insertar</button>
      </form>

      </div>
    </main>
  </div>
</div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
