
<?php
session_start();
include "../config.php";
//Control de SESSION para no poder colarse a app.php sin pasar por login
if(!isset($_SESSION['pasas']) || $_SESSION['pasas'] == false){
    //echo "Te has intentado colar a la aplicación sin permiso";
    header("Location:../index.html");
}
//control de las fechas
$fechaActual = date('Y-m-d');
//echo $_GET['idpadre'];
    $consulta2 = "SELECT * FROM registros WHERE idusuario = '".$_SESSION['idtablausuario']."'";
    $resultado2 = $conexion->query($consulta2);
        //si existe el usuario en la tabla de registros actualizo la fecha de la ultima conexion
        if($fila2=$resultado2->fetch_assoc()){
            $consulta3 = 'UPDATE registros SET ultimaconexion="'.$fechaActual.'" WHERE idusuario="'.$_SESSION['idtablausuario'].'"';
            $resultado3 = $conexion->query($consulta3);
        //si no existe el usuario en la tabla de registros, creo un nuevo registro donde guardo todos los valores
        }else{
            $consulta4 = 'INSERT INTO registros VALUES(NULL,"'.$_SESSION['idtablausuario'].'","'.$_GET['idpadre'].'","'.$fechaActual.'","'.$fechaActual.'")';
            $resultado4 = $conexion->query($consulta4);
        }
    $consulta6 = 'SELECT * FROM temas WHERE idpadre="'.$_GET["idpadre"].'" ';
    $resultado6 = $conexion->query($consulta6);
    $fila6=$resultado6->fetch_assoc();
    $nombreCalendario = $fila6['tema'];
    
?>

<!-- AQUI VA EL HTML -->

<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>Abre tus nuevos retos</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sticky-footer-navbar/">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--icono de la pestaña-->
    <link rel="icon" href="../assets/brand/bootstrap-logo.ico">
      
    <!-- JAVA SCRIPT -->
    
    <script src="lib/jquery-3.6.1.min.js"></script>
    <script src="script_temas.js"></script>
     <script> 
    //El botón terminar calendario llama a la función advertencia que lanza un mensaje con el método confirm
      function advertencia(){
          if(confirm("Tu progreso en el calendario actual se perderá. ¿Quieres continuar?")){
            //console.log("Redireccion a temas")
              window.location.href = "temas.php?borrar=si"; 
          }else{
              //console.log("No redireccion");
          }
      }
      </script> 
<!-- ESTILO CSS -->
    <style>
        
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
        body{
            background: rgb(205,178,205);
            background: linear-gradient(90deg, rgba(205,178,205,1) 46%, rgba(161,78,149,1) 100%);
            }
            
        @font-face{
            font-family: gaston;
            src: url("../fuentes/gaston.otf")
        }
        .descripcion{
            display: none;
        }
        #contenedorlogo{
            display:flex;
        }
        
        .cabeceradia{
            display:flex;
        }
        .nuevoreto{
            display: none;
        }
        .comenzar{
            width:150px;
            height:100px;
            border: 0px;
            margin-left:35px;
            background:#44035D;
            color:#D0CBD2;
            border-radius:15px 15px 15px 15px;
            font-size:20px;
        }
        button[disabled]{
            background:#D0CBD2;
            color:#44035D;
        }
            
    </style>

    <!-- CABECERA PÁGINA -->
    <link href="sticky-footer-navbar.css" rel="stylesheet">
  </head>
<body class="d-flex flex-column h-100">
    <header>
      <!-- Barra de navegacion -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" style="color:#DBD5DC; margin-left:20px;"><?php echo $_SESSION['usuario']; ?>, es hora de superar tus retos</a>
            <div id="contenedorlogo">
                <img src="../assets/brand/bootstrap-logo.png" alt="logo" style="height:50px;width:50px;">
                <h1 style="font-family:gaston;color:#DBD5DC; padding-left:10px; font-size:50px;">YourGoals</h1>  
            </div>
            <div class="contenedorbotones">
                <button style="margin-right:10px;border-radius: 5px 5px 5px 5px; background:#D0CBD2;color:#44035D;" onclick="advertencia()">Terminar calendario</button>
                <a href="logout.php"><button style="border-radius: 5px 5px 5px 5px; background:#D0CBD2;color:#44035D;">Cerrar sesión</button></a>
            </div>
        </div>
      </nav>
    </header>

<!-- CONTENIDO PÁGINA -->
    <main class="flex-shrink-0">
      <div class="container" style="margin-bottom:20px;">
          <h1 class="mt-5">Calendario de <?php echo $nombreCalendario; ?></h1>
          <h4>Descubre tu nuevo reto</h4>
          <br>
          <div id="contendortemas" style="display:flex;flex-wrap:wrap;flex-direction:row;">
              <?php
                //CÁLCULO DE DIFERENCIA DE DIAS
                $consulta5 = "SELECT * FROM registros WHERE idusuario = '".$_SESSION['idtablausuario']."'"; //Sacame de la tabla registros donde el idusuario coincida con el valor de la varible SESSION idtablasusuarios que corresponde con el Identificador de la tabla usuarios
                $resultado5 = $conexion->query($consulta5); //Lanzo la petición
                if($fila5=$resultado5->fetch_assoc()){
                    //con el metodo strtotime damos formato de fecha a la variable fecha guardada como un string en la base de datos
                    $inicio = strtotime($fila5['fechainicio']);
                    $ultimafecha = strtotime($fila5['ultimaconexion']);
                    $diferenciadias = ceil(abs($ultimafecha - $inicio) / 86400);
                    //echo "<p>".$diferenciadias."</p>"; para probar que realiza el cálculo
                    //en caso de que la diferencia de dias sea mayor a 12 redirigimos al usuario a la pantalla de temas con una variable en url de finalizacion
                    if($diferenciadias>12){
                        
                        header("Location:temas.php?finalizado=si");
                    }
                }
                //ESTRUCTURA CALENDARIO
                $contador = 0;
                $diascabecera = 0;
                $consulta = "SELECT * FROM retos WHERE idhijo = '".$_GET['idpadre']."' "; //Sacame de la tabla de retos el valor de idhijo que coincida con idpadre de usuarios
                $resultado = $conexion->query($consulta); //lanzo peticion
                //PREPARO FECHA PARA LOS DIVS
                $primerafecha = ""; 
                $consulta2 = "SELECT * FROM registros WHERE idusuario = '".$_SESSION['idtablausuario']."'";
                $resultado2 = $conexion->query($consulta2);
                if($fila2=$resultado2->fetch_assoc()){
                    $primerafecha = $fila2['fechainicio'];
                }
                
                while($fila=$resultado->fetch_assoc()) { //Mientras coincida guardalo en un matriz asociativa
                    $diascabecera++; //incremento de la variable 
                    $fechaparrafo = strtotime($primerafecha.'+'.$contador.' days');
                    echo
                        '<div class="calendario" style="width:250px; height:100%;background:#F8F2FA ;border-radius:5px 10px 10px 10px; margin:20px;padding:15px;box-shadow:5px 0px 5px 0px #545454;">
                            <div class="cabeceradia" style="margin-bottom:10px;">
                                <img src="img/'.$fila['logo'].'" style="width:20%; margin-right:8px;"> 
                                <h2 style="text-align:center;">DÍA '.$diascabecera.'</h2>
                            </div>';
                            echo '<p style="text-align:center;color:grey;">'.date('d/m/Y', $fechaparrafo).'</p>';
                            echo '<span id="comenzar'.$fila['Identificador'].'">';
                                if($contador<=$diferenciadias || $contador==$diferenciadias){
                                    echo '<button class="comenzar">Comenzar</button>';
                                }else{
                                    echo '<button disabled class="comenzar">Comenzar</button>';
                                }
                                echo  '<p class="nuevoreto" style="padding-top:20px;">'.$fila['reto'].'</p>
                            </span>
                        </div>';
                    $contador++;
                }
                // hemos realizado un control de fechas para que se muestren solo los botones que correspondan según los días que llevas accediendo a la app. El dia de inicio se abre el primer reto y así hasta el último día que será el día 12
                ?>
            </div>
      </div>
    </main>
<!-- PIE DE PAGINA -->
    <footer class="footer mt-auto py-3 bg-light">
      <div class="container">
        <span class="text-muted">&copy; Isabel González-Gallego</span>
      </div>
    </footer>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>

