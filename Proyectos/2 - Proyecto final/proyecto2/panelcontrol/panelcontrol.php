<?php 
//cargo SESSION y la conexion a la base de datos
session_start();
include "../config.php";
//si existe el parámetro temacompleto al insertar un nuevo reto, muestrame este mensaje
if(isset($_GET['temacompleto'])){
    echo '<script>alert("Solo se permiten 12 retos por tema");</script>';
    }
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
      th {
        white-space: nowrap;
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
    <p style="color:#DBD5DC; padding-left:10px; font-size:20px;">Panel de control</p>  
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <a class="nav-link px-3" href="../home.php">Salir</a>
        </div>
  </div>
</header>

<!-- Barra menu izquierda -->
<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column" style="margin-top:15px;text-transform:capitalize;">
            <!-- Menu donde pone panel de control
          <li class="nav-item">  
            <a class="nav-link" aria-current="page" href="#">
              <span  class="align-text-bottom" data-feather="home"></span>
              Panel de control
            </a>
          </li>
            Menu donde pone panel de control -->
            
            <!-- Para que nos coja las tablas de la bbdd -->
            <?php
            
                $consulta = "SHOW TABLES";
                $resultado = $conexion->query($consulta);

                while ($fila = $resultado->fetch_assoc()) {
                    $nombretabla = $fila['Tables_in_calendarioadviento'];
                    
                    if ($nombretabla == "temas" || $nombretabla == "retos"){  
                        $consulta2 = "SHOW TABLE STATUS WHERE Name='".$nombretabla."' ";
                        $resultado2 = $conexion->query($consulta2);
                        //para recuperar los iconos del json de la base de datos
                         if($fila2 = $resultado2->fetch_array()){
                            $iconojson = json_decode($fila2['Comment'])->logomenu;
                         }
                        
    
                        echo '<li class="nav-item" style="margin-top:10px;margin-left:10px;">
                    <a class="nav-link" href="?tabla='.$fila['Tables_in_calendarioadviento'].'">
                      <img src="img/'.$iconojson.'" width=25 height=25>
                      '.$fila['Tables_in_calendarioadviento'].'
                    </a>
                  </li>
                    ';
                    }
                }
            ?>
        </ul>
      </div>
    </nav>
      
      <!-- Botones quitados en la cabecera -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    
     <!-- Tabla del panel de control -->
       <?php
        echo "<h2 style='text-transform:capitalize';>".$_GET['tabla']."</h2>"; 
        //boton para añadir nuevo registro
        if ($_GET['tabla'] == 'temas'){
            echo '<div class="container">
                      <div class="row">
                        <div class="col-md-12">
                                <a href="anadirform.php?tabla='.$_GET['tabla'].'">
                                  <button class="btn btn-primary botonanadir">
                                    <i class="fa-solid fa-circle-plus"></i>
                                        Añadir tema
                                  </button>
                                </a>
                          <table class="table">
                            <!-- Contenido de la tabla -->
                          </table>
                        </div>
                      </div>
                    </div>';
            }
       ?>         
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
              <tr>
                <!-- Para que se aplique todas las columnas que tenga cada una de las tablas -->
                <?php

                    $consulta = "SHOW COLUMNS FROM ".$_GET['tabla'].";"; 
                    $resultado = $conexion->query($consulta);
                        $contador = 0;
                        $cabeceras;

                    while ($fila = $resultado->fetch_assoc()) {
                        $cabeceras[$contador] = $fila['Field'];
                        echo '<th>'.$fila['Field'].'</th>
                        ';
                        $contador++;
                    }
                ?>
            <!-- Columnas con las acciones de ver, actualizar y eliminar -->
            <th>Modificar</th>
            <th>Eliminar</th>
            <?php
                if ($_GET['tabla'] == 'temas'){
                echo '<th>Nuevo reto</th>';
                }
            ?>
            </tr>
          </thead>
            
          <tbody>
            <tr>
              <!-- Para aplicar ver, actualizar y eliminar en cada uno de los registros que tengamos en cada tabla -->
            
              <?php
                
                $consulta = "SELECT * FROM 
                ".$_GET['tabla'].";";
                $resultado = $conexion->query($consulta);
                //Escribo fetch_array en lugar de assoc que es un array asociativo. el array es un array numerico 
                while ($fila = $resultado->fetch_array()) {
                    echo '<tr>'; //Arranca la fila
                    $contador = 0;
                    for ($i = 0;$i<count($fila)/2;$i++){
                        echo '<td cabecera = "'.$cabeceras[$contador].'" identificador='.$fila[0].'>'.$fila[$i].'</td>'; //Dame las columnas de la fila
                        $contador++;
                        }
                    
                    echo '
                    <td><a href="actualizaform.php?tabla='.$_GET['tabla'].'&id='.$fila[0].'"><i class="fa-solid fa-pen-to-square"></i></a></td>
                    <td><a href="eliminar.php?tabla='.$_GET['tabla'].'&id='.$fila[0].'"><i class="fa-solid fa-trash"></i></a></td>';
                    if ($_GET['tabla'] == 'temas'){
                    echo '<td><a href="retoform.php?tabla='.$_GET['tabla'].'&id='.$fila[0].'&idpadre='.$fila[4].'"><i class="fa-solid fa-square-plus"></i></a></td>';
                    }
                    echo '</tr>'; //Cierra la fila
                    }
                ?>
            </tr>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
