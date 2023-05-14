<?php
//incluyo session y config para la conexion
session_start();
include "../config.php";

//CONTROL DE SESSION para no colarse a temas.php sin pasar por el login

if(!isset($_SESSION['pasas']) || $_SESSION['pasas'] == false){
            //echo "Te has intentado colar a la aplicación sin permiso";
            header("Location:../home.php");
}
//En caso de que el numero de días para hacer el calendario haya expirado, se borra el registro correspondiente al usuario y se le pide al usuario escoger un nuevo calendario
//si existe la variable finalizado en la url y finalizado es = a si
if(isset($_GET['finalizado']) && $_GET['finalizado']=="si"){
    //borra el registro existente de la tabla registros para empezar de cero
    $consulta = "DELETE FROM registros WHERE idusuario ='".$_SESSION['idtablausuario']."'";
    $resultado = $conexion->query($consulta);
    echo '<script>alert("El tiempo del calendario ha expirado, vuelve a empezar o escoge uno nuevo");</script>';
}
//Al pulsar el botón de terminar calendario. Si existe el parámetro borrar y es igual a si
if(isset($_GET['borrar']) && $_GET['borrar']=="si"){
    //borra el registro existente de la tabla registros para empezar de cero
    $consulta = "DELETE FROM registros WHERE idusuario ='".$_SESSION['idtablausuario']."'";
    $resultado = $conexion->query($consulta);
    
}
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
    <title>Selecciona tu calendario</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sticky-footer-navbar/">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--icono de la pestaña-->
    <link rel="icon" href="../assets/brand/bootstrap-logo.ico">

    
    <script src="lib/jquery-3.6.1.min.js"></script>
    <script src="script_temas.js"></script>

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
        .contenedorentrar{
            margin-top:10px;
            display:flex;
            justify-content: center;
            align-items: center;
        }
        .botonentrar{
            width:160px;
            height:40px;
            margin:auto;
            border:0px;
            background:#7C4376;
            color:#D0CBD2;
            border-radius:20px 20px 20px 20px;
            font-size: 20px;
            font-weight:bold;
            margin-bottom:5px;
        }
        .botoninfo{
            border: 1px solid grey;
            border-radius:10px 10px 10px 10px;
            background:grey;
            color:white;
        }
        
    </style>

    <!-- Cabecera -->
    <link href="sticky-footer-navbar.css" rel="stylesheet">
  </head>
    <body class="d-flex flex-column h-100">
        <header>
          <!-- Barra de navegacion -->
          <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" style="color:#DBD5DC; margin-left:20px;">Bienvenid@, <?php echo $_SESSION['usuario']; ?></a>
                <div id="contenedorlogo">
                    <img src="../assets/brand/bootstrap-logo.png" alt="logo" style="height:50px;width:50px;">
                    <h1 style="font-family:gaston;color:#DBD5DC; padding-left:10px; font-size:50px;">YourGoals</h1>  
                </div>
                <div class="contenedorbotones">
                    <?php
                        $consulta2 = "SELECT * FROM usuarios WHERE '".$_SESSION['privilegio']."' > 1";
                        $resultado2 = $conexion->query($consulta2);
                        //si el privilegio es mayor que 1
                        if($resultado2->fetch_assoc()){
                            echo '<a href="../panelcontrol/panelcontrol.php?tabla=retos"><button style="margin-right:10px;border-radius: 5px 5px 5px 5px; background:#D0CBD2;color:#44035D;">Panel de control</button></a>';
                            }
                    ?>
                    <a href="logout.php"><button style="border-radius: 5px 5px 5px 5px; background:#D0CBD2;color:#44035D;">Cerrar sesión</button></a>
                </div>
            </div>
          </nav>
        </header>

<!-- Contenido de la página principal -->
        <main class="flex-shrink-0">
          <div class="container">

              <h1 class="mt-5">Calendario motivacional</h1>
              <h4>Selecciona la temática de tu calendario y comienza a cuidar tu salud mental</h4>
              <br><br>
              <div id="contendortemas" style="display:flex;flex-wrap:wrap;flex-direction:row;">
                  <?php
                    //MOSTRAR DATOS DE LOS TEMAS 
                    $consulta = "SELECT * FROM temas";
                    $resultado = $conexion->query($consulta);
                    while($fila=$resultado->fetch_assoc()) {
                        echo
                            //tarjetas con los temas, me crea tantos div como temas tenga en la base de datos
                            //extrae tema, foto, descripcion e id padre de la base de datos
                            '<div class="contenidotema" style="width:350px; height:100%;background:#F8F2FA ;border-radius:5px 10px 10px 10px; margin:20px;padding:15px;box-shadow:5px 0px 5px 0px #545454;">
                                <h2 style="text-align:center;">'.$fila['tema'].'</h2> 
                                <img src="img/'.$fila['foto'].'" style="width:100%; border-radius:10px 10px 10px 10px;">
                                <div class="contenedorentrar">
                                    <a href="app.php?idpadre='.$fila['idpadre'].'"><button class="botonentrar">ENTRAR</button></a>
                                </div>
                                <span id="masinfo'.$fila['idpadre'].'">
                                    <button class="botoninfo">+ Info</button>
                                    <p class="descripcion" style="padding-top:20px;">'.$fila['descripcion'].'</p>
                                </span>
                            </div>';
                    }
                    ?>
                </div>
          </div>
        </main>
<!-- Pie de página -->
        <footer class="footer mt-auto py-3 bg-light">
          <div class="container">
            <span class="text-muted">&copy; Isabel González-Gallego 2022</span>
          </div>
        </footer>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>

