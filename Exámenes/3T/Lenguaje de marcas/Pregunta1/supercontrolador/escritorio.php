<?php 
//cargo la conexion a la base de datos
include "conexiondb.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Tienda de electrodomésticos</title>
      
     <!-- pongo aquí JQuery --> 
    <script
      src="https://code.jquery.com/jquery-3.6.4.js"
      integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
      crossorigin="anonymous">
    </script>
      
      <!-- Pongo por aqui fontawesome -->
    <script src="https://kit.fontawesome.com/dc05bdbd15.js" crossorigin="anonymous"></script>
      
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">

    <!-- Bootstrap core CSS -->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
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
      <!-- Control de sesiones para no colarse en el escritorio -->
      <?php
    session_start();
    if(!isset($_SESSION['pasas']) || $_SESSION['pasas'] == false){
    echo "Te has intentado colar a la aplicación sin permiso";
        header("Location:index.html");
    }
    ?>
      
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Appempresarial</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="logout.php">Salir</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <span data-feather="home"></span>
              Panel de control <span class="sr-only">(current)</span>
            </a>
          </li>
            <!-- Para que nos coja las tablas de la bbdd -->
            <?php
            
                $peticion = "SHOW TABLES";
                $resultado = mysqli_query($enlace,$peticion);

                while ($fila = $resultado->fetch_assoc()) {
                    echo '<li class="nav-item">
                    <a class="nav-link" href="?tabla= '.$fila['Tables_in_appempresa'].'">
                      <span data-feather="file"></span>
                      '.$fila['Tables_in_appempresa'].'
                    </a>
                  </li>
                    ';
                }
            ?>
            
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Informes guardados</span>
          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
            <!-- Para que nos coja las vistas de la bbdd (poner php si lo descomento)  -->
            
           <?php
            
                $peticion = "SHOW FULL TABLES IN appempresa WHERE TABLE_TYPE LIKE 'VIEW'";
                $resultado = mysqli_query($enlace,$peticion);

                while ($fila = $resultado->fetch_assoc()) {
                    echo '<li class="nav-item">
                    <a class="nav-link" href="#">
                      <span data-feather="file"></span>
                      '.$fila['Tables_in_appempresa'].'
                    </a>
                  </li>
                    ';
                }
            
            ?>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      
<!--
      
        <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
-->
    <?php
        if(isset($_GET['tabla'])){
        echo "<h2 style='text-transform:capitalize';>".$_GET['tabla']."</h2>"; 
        //boton para añadir nuevo registro
            echo '<div class="container">
                      <div class="row">
                        <div class="col-md-12">
                                <a href="insertar.php?tabla='.$_GET['tabla'].'">
                                  <button class="btn btn-primary botonanadir" style="margin-bottom:10px;">
                                    <i class="fa-solid fa-circle-plus"></i>
                                        Insertar
                                  </button>
                                  </a>
                            </div>
                        </div>
                    </div>';
            }
       ?>         
        
      <div class="table-responsive">
          <style>.table-responsive{
              overflow-x: visible !important;}</style>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
            <!-- Para que aplique todas las columnas que tenga cada una de las tablas -->
            <?php
                if(isset($_GET['tabla'])){
                include "conexiondb.php";
                $peticion = "SHOW COLUMNS FROM ".$_GET['tabla'].";";
                
                $resultado = mysqli_query($enlace,$peticion);
                    $contador = 0;
                    $cabeceras;

                while ($fila = $resultado->fetch_assoc()) {
                    $cabeceras[$contador] = $fila['Field'];
                    echo '<th>'.$fila['Field'].'</th>
                    ';
                    $contador++;
                }
            }
            
            ?>
            <!-- Columnas con las acciones de ver, actualizar y eliminar -->
            <th>Ver</th>
            <th>Actualizar</th>
            <th>Eliminar</th>
             
            </tr>
          </thead>
          <tbody>
            <tr>
                <!-- Para aplicar ver, actualizar y eliminar en cada uno de los registros que tengamos en cada tabla -->
              <?php
                if(isset($_GET['tabla'])){
                $peticion = "SELECT * FROM 
                ".$_GET['tabla'].";";
                $resultado = mysqli_query($enlace,$peticion);
                //Escribo fetch_array en lugar de assoc que es un array asociativo. el array es un array numerico 
                while ($fila = $resultado->fetch_array()) {
                    echo '<tr>'; //Arranca la fila
                    $contador = 0;
                    for ($i = 0;$i<count($fila)/2;$i++){
                        echo '<td cabecera = "'.$cabeceras[$contador].'" identificador='.$fila[0].'>'.$fila[$i].'</td>'; //Dame las columnas de la fila
                        $contador++;
                    }
                    
                    echo '
                    <td><a href="ver.php?tabla='.$_GET['tabla'].'&id='.$fila[0].'"><i class="fa-solid fa-eye"></i></a></td>
                    <td><a href="actualizar.php?tabla='.$_GET['tabla'].'&id='.$fila[0].'"><i class="fa-solid fa-arrows-rotate"></i></a></td>
                    <td><a href="eliminar.php?tabla='.$_GET['tabla'].'&id='.$fila[0].'"><i class="fa-solid fa-trash"></i></a></td>
                    ';
                    echo '</tr>'; //Cierra la fila
                    }
                }
            ?>
            </tr>
          </tbody>
        </table>
      </div>
        <!-- AJAX -->
        <div id="ajax"></div>
        <!-- VENTANA MODAL bootstrap -->
        <div class="modal" tabindex="-1" id="myModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p>Modal body text goes here.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Fin ventana modal bootstrap -->
        
       
    </main>
  </div>
</div>
<!--
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
-->
      <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="dashboard.js"></script>
    
      <script>
          //Meto el nombre de la tabla en la variable
        var tabla = '<?php
        if(isset($_GET['tabla'])){
            echo $_GET['tabla'];
        }
        ?>'
        
          //Cuando haga doble click en td
        $("td").dblclick(function(){
            //la celda será editable
            $(this).attr("contenteditable","true");
        })
        //Cuando salga de la celda
        $("td").blur(function(){
            //la celda no será editable
            $(this).attr("contenteditable","false");
            console.log("ahora voy a meter esto en la base de datos")
            
            //Coge el nuevo valor de la celda
            var valor = $(this).text()
            console.log("el nuevo valor de la celda es: "+valor)
            //coge el identificador de esa celda
            var identificador = $(this).attr("identificador")
            console.log("el valor sobre el que voy a trabajar en la bbdd tiene el id: "+identificador)
            //coge la cabecera, el campo, de la celda
            var columna = $(this).attr("cabecera")
            console.log("la columna sobre la que voy a trabajar tiene el nombre de: "+columna)
            //coge el nombre de la tabla
            console.log("la tabla sobre la que voy a trabajar es: "+tabla)
            //Ajax
            cadena = "ajax.php?valor="+valor+"&identificador="+identificador+"&columna="+columna+"&tabla="+tabla;
            console.log("cadena es:"+cadena)
            $("#ajax").load(encodeURI(cadena))
            //console.log("ajax.php?valor="+valor+"&identificador="+identificador+"&columna="+columna+"&tabla="+tabla)
            alert("Tu actualización se ha introducido en la base de datos")
        })
        
      </script>
    </body>
</html>
