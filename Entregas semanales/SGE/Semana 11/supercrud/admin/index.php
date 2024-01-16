<?php 
session_start();
//incluyo los siguientes archivos de código
include "../config.php";
include "../controlador.php";
include "inc/condicionesdeinicio.php";

//establece la conexion a la base de datos 
$mysqli = new mysqli($mydbserver, $mydbuser, $mydbpassword, $mydb);
$miformulario = new Supercontrolador();
?>

<html>
    <head>
        <!-- link al estilo.css -->
        <link rel="stylesheet" href="css/estilo.css">
        <!-- link a la libreria jquery -->
        <script src = "lib/jquery-3.7.1.min.js"></script>
        <script src = "js/codigo.js"></script>
        <style> </style>
        <!-- CDN de la libreria select2 -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        
    </head>
    
    <body>
         <?php
        //Control de paginación, sube o baja de pagina
            if(isset($_GET['pagina'])){
                switch($_GET['pagina']){
                    case "anterior":
                        if($_SESSION['pagina']>0){
                            $_SESSION['pagina']--;
                        }
                        break;
                    case "siguiente":
                        $_SESSION['pagina']++;
                        break;
                    case "primera":
                        $_SESSION['pagina']=0;
                        break;

                }
            }
            //verifica si alguien ha puesto un usuario en el formulario
            if(isset($_POST['usuario']) && !isset($_SESSION['usuario'])){
                //Consulta para buscar usuario y contraseña en la base de datos
                $consulta = "SELECT * FROM usuarios WHERE usuario = '".$_POST['usuario']."' AND contrasena = '".$_POST['contrasena']."'";
                //Ejecuta la consulta
                $resultado = $mysqli->query($consulta);
                //Esteblezco la variable de control para saber si se pasa o no
                $pasas = "no";
                //Recorre los resultados de la consulta
                while($fila = $resultado->fetch_assoc()){
                    //Si encuentra resultados, establece la sesión con el usuario
                    $pasas = "si";
                    $_SESSION['usuario'] = $fila['usuario'];
                }
                //si la autentificación no es válida muestra un mensaje de acceso denegado
                if($pasas == "si"){}else{
                    echo '<div class="notice">Intento de acceso denegado</div>';
                }
            }
        ?>
        
        <?php
        //verifica si existe la variable de sesion llamada usuario
            if(isset($_SESSION['usuario'])){
                echo '
                    <!-- Muestra el menú izquierdo si hay una sesión activa -->
                    <aside>
                        <div id="contienemenu"><ul>';
                            //Muestra las tablas disponibles en la base de datos
                            $consulta = "SHOW TABLES";
                            $resultado = $mysqli->query($consulta);
                
                            while($fila = $resultado->fetch_array()){
                                echo '<li><a href="?tabla='.$fila[0].'">'.$fila[0].'</a></li>';
                            }
                        echo '</ul>
                        </div>
                    </aside>
                    
                    <!-- Muestra el menú derecho si hay una sesión activa -->
                    <section>
                        <div id="contienecontenido">
                        ';
                            //Si existe delete, llamo a la funcion delete con los valores de la tabla y del delete
                            if(isset($_GET['delete'])){$miformulario->delete($_GET['tabla'],$_GET['delete']);}
                            //Si existe update llamo a la función update con el formulario y valor de la tabla
                            if(isset($_GET['update'])){echo '<div id="formulario">';$miformulario->update($_GET['tabla'],$_GET['update']);echo '</div>';}
                            //Si existe clave y es igual a procesainsertar en ese caso
                            if(isset($_POST['clave']) && $_POST['clave']== "procesainsertar"){$miformulario->procesainsertar($_GET['tabla']);}
                            //Si clave es igual a procesaupdate en ese caso llamo a la función update
                            if(isset($_POST['clave']) && $_POST['clave']== "procesaupdate"){$miformulario->procesaupdate($_POST['tabla'],$_POST['identificador']);}
                            //Si existe tabla, en ese caso llamo a la función leer y muestra los datos de la tabla seleccionada
                            if(isset($_GET['tabla'])){$miformulario->leer($_GET['tabla']);}
                            //Si existe create, en ese caso llama a la función create para crear un nuevo registro
                            if(isset($_GET['create'])){echo '<div id = "formulario">';$miformulario->insertar($_GET['create']);echo '</div>';}
                    
                        echo '
                       
                        </div>
                        
                    </section>

                    ';
            }else{
                //Si no hay sesión de usuario, muestra un formulario de login
                echo '
                    <form action="?" method="POST" id="formulariologin"> 
                        <img src="../forma-abstracta.png" class="logo" style="width:50px; height:50px">
                        <input type="text" name="usuario" placeholder="usuario">
                        <input type="password" name="contrasena" placeholder="contraseña">
                        <input type="submit">
                    </form>
                ';
            }
        ?>
    
    <div id="ajax"></div>
    <script src="js/codigo.js"></script>
    </body>


</html>