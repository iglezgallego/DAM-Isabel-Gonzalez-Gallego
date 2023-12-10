
<?php 
session_start();
include "../config.php";
include "../controlador.php";
//establece la conexion a la base de datos 
$mysqli = new mysqli($mydbserver, $mydbuser, $mydbpassword, $mydb);
$miformulario = new Supercontrolador();
?>

<html>
    <head>
        <style>
            /* ESTILOS GENERALES */
            body,html{
                padding:0px;
                margin:0px;
                height:100%;
                font-family:sans-serif;
                background-image: url('../fondoformulario4.jpg');
                background-size:cover;
                background-position: center;
            }
            
            /* ESTILOS DEL FORMULARIO DE LOGIN */
            #formulariologin{
                width: 200px;
                height: 200px;
                background:white;
                margin:auto;
                padding:30px;
                box-shadow:0px 10px 20px rgba(0,0,0,0.5);
                border-radius:15px;
                text-align: center;
            }
            #formulariologin input{
                width: 100%;
                padding-top: 10px;
                padding-bottom: 10px;
                border:0px;
                margin-top: 10px;
                outline: none;
                background: rgb(240,240,240);
                border-radius: 5px;
            }
            #formulariologin input[type="text"],#formulariologin input[type="password"]{
                box-shadow: 0px 4px 8px rgba(0,0,0,0.3) inset;
            }
            #formulariologin input[type="submit"]{
                box-shadow: 0px 4px 8px rgba(0,0,0,0.3);
            }
            .notice{
                position:absolute;
                top:0px;
                width: 400px;
                background: red;
                color: white;
                height: 20px;
                left:50%;
                margin-left:-200px;
                text-align: center;
                border-radius: 20px;
                padding:8px;
            }
            
            /* ESTILOS DEL PANEL DE CONTROL */
            aside{
                width: 20%;
                float:left;
                height:100%;
                box-shadow: -20px 0px 20px rgba(0,0,0,0.3) inset;
            }
            section{
                width:80%;
                float:right;
                height:100%;
                
            }
            #contienemenu{
                padding:10px;
            }
            #contienemenu ul{
                list-style-type:none;
                padding:0px;
                margin:0px;
            }
            #contienemenu ul li{
                padding:10px;
                margin:0px;
                border-bottom: 1px solid grey;
            }
            #contienemenu ul li a{
                color:inherit;
                text-decoration: none;
            }
            #contienecontenido{
                padding:10px;
            }
            #contienecontenido table{
                width: 100%;
                text-align: left;
            }
            #contienecontenido table a{
                padding: 5px;
                color:inherit;
                text-decoration:none;
                font-size:20px;
            }
            #contienecontenido table a img{
                font-size:20px;
            }
            #create .icon{
                color:white;
                text-decoration:none;
                position:absolute;
                bottom:10px;
                right:10px;
                width: 5%;
                height: auto;
                
            }
            
             /* ESTILOS DEL FORMULARIO */
            
            #formulario{
                width: 50%;
                background:white;
                margin:auto;
                padding:20px;
                box-shadow:0px 10px 20px rgba(0,0,0,0.5);
                border-radius:15px;
                text-align: center;
                margin-top: 10px;
            }
            #formulario h1{
                color: #9587AD;
                font-size: 20px;
                padding: 0px;
                margin: 0px;
                margin-bottom:20px;
            }
            #formulario h3{
                text-align: left;
                color:#744D8C;
                margin:0px;
                padding:0px;
            }
            #formulario p{
                font-size: 10px;
                color: #584575;
                text-align: left;
            }
            
            .campo input{
                padding:5px;
                border:none;
                background: #FAF5EC;
                margin:0px;
                width: 80%;
                clear:both;
            }
            
            img.logo{
                width: 8%;
                height: 8%;
                margin-bottom:10px;
                
            }
            .campo{
                margin-bottom:20px;
            }
            .campo label{
                color: #584575;
                font-size: 2em;
                padding:0px;
                margin:0px;
                
            }
            .campo p{
                font-size:0.6em;
                padding:0px;
                margin:0px;
            }
            
            .enviar{
                padding: 10px 20px;
                margin-bottom: 20px;
                background-color: #584575;
                color: white; 
                border: none;
                border-radius: 5px;
                text-transform: uppercase;
            }
            input{
                transition: all 1s;
            }
            input:focus{
               outline:none;
                background:white;
            }
            .contienecampo input{
                width:98%;
                float:left;
                margin-right:0px;
                height:20px;
                border-radius:5px 0px 0px 5px;
                box-shadow: 0px 4px 8px rgba(0,0,0,0.1) inset;
            }
            .contienecampo .tipocampo{
                float:right;
                width: 100%;
                background:#EAE4C5;
                line-height: 30px;
                margin-top:0px;
                border-radius:0px 5px 5px 0px;
                
            }
            img.icon{
                width: 15px;
                height: 15px;
                
            }
            .clearfix{
                clear:both;
            }
            .contienecampo table{
               width:100%; 
            }
            
            
        </style>
    </head>
    
    <body>
         <?php
            //verifica si alguien ha puesto un usuario en el formulario
            if(isset($_POST['usuario'])){
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
                            //Lee y muestra los datos de la tabla seleccionada
                            if(isset($_GET['tabla'])){$miformulario->leer($_GET['tabla']);}
                            //Crea un formulario para insertar datos en una tabla
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
    
    </body>


</html>