<?php

    //Creamos una clase
    class Supercontrolador {
        
        //Creamos la funcion formulario
        //Tabla es una variable de la funcion que vamos a poder cambiar
        function formulario($tabla){
            //incluyo los datos para la conexion a la bbdd que estan en config.php
            include "config.php";
            
            //Formulario action en el mismo archivo, metodo POST
            echo '<form action="?" method = "POST">';
            //creo un campo oculto dentro del form cuyo valor es procesaformulario
            echo '<input type="hidden" name="clave" value="procesaformulario">';
            //creo otro campo oculto cuyo valor es la tabla
            echo '<input type="hidden" name="tabla" value="'.$tabla.'">';
            //establece la conexion a la base de datos 
            $mysqli = new mysqli($mydbserver, $mydbuser, $mydbpassword, $mydb);
            //luego quiero ver las columnas
            $consulta = "SHOW FULL COLUMNS FROM ".$tabla;
            $resultado = $mysqli->query($consulta);
            while($fila = $resultado->fetch_assoc()){
                //si la clave no es igual al NULL y el campo no es epoch
                if(json_decode($fila["Comment"])->visible == "true") {
                    preg_match('#\((.*?)\)#', $fila["Type"], $match);
                    //muestra estos datos en el formulario
                echo '
                    <div class="campo">
                            <h3>'.json_decode($fila["Comment"])->titulo.'</h3>
                            <p>'.json_decode($fila["Comment"])->descripcion.' - Caracteres mínimo: '.json_decode($fila["Comment"])->min.' máximo: '.$match[1].' </p>
                            ';
                            //si fila es NULL ponemos que el campo es requerido
                            if($fila["Null"] == "NO"){echo "<p>* Este campo es requerido</p>";}
                            //si el campo está deshabilitado ponemos que el campo no debe ser rellenado
                            if (json_decode($fila["Comment"])->deshabilitado == "true"){echo "<p>* Este campo lo rellena automáticamente el sistema</p>";}
                            //Campos del formulario
                            //el nombre de la fila sea el mismo que nombre del campo de la bbdd y el tipo de dato será el elemento tipodato del json en la bbdd
                            echo '
                            <div class="contienecampo">
                            <table><tr><td width="80%">
                                <input type="'.json_decode($fila["Comment"])->tipodato.'" name="'.$fila["Field"].'" id="'.$fila["Field"].'"
                                ';
                                
                                // Si el campo no es nulleable, debe ser requerido
                                if ($fila["Null"] == "NO") {
                                    echo " required ";}
                                // Si en el json el elemento deshabilitado es true en ese caso estará deshabilitado
                                if (json_decode($fila["Comment"])->deshabilitado == "true") {
                                    echo " readonly ";}
                                //para que los caracteres que se puedan poner en el formulario sean los mismos que los de la bbdd y el placeholder para el elemento placeholder del json en comentarios de la bbdd
                                preg_match('#\((.*?)\)#', $fila["Type"], $match);
                                echo '
                                maxlength = "'.$match[1].'"
                                minlength = "'.json_decode($fila["Comment"])->min.'"
                                placeholder = "'.json_decode($fila["Comment"])->placeholder.'"
                                ';
                    
                                //Desactivar temporalmente las advertencias
                                error_reporting(E_ERROR | E_PARSE);
                    
                                //en el caso de que exista en el json parametroget
                                if(isset(json_decode($fila["Comment"])->parametroget)){
                                    echo 'value = "'.$_GET[json_decode($fila["Comment"])->parametroget].'"';
                                }
                                //Volver a la configuración original de advertencias
                                error_reporting(E_ALL);
                    
                                echo'
                                >
                                </td><td width="20%">
                                <div class="tipocampo"><img src="bootstrap-icons-1.11.1/'.json_decode($fila["Comment"])->icono.'" class="icon">
                                </div>
                                </td></tr></table>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        ';
                }
            }
            echo '<br><input type="submit" class="enviar">';
            /* Cerrar la conexion */
            $mysqli->close();
        //Aquí se acaba la función formulario
        }
        
        //creo la funcion para procesar e insertar la información de los formularios dentro de la BBDD
        function procesaformulario(){
            //Analizo lo que viene por formulario antes de añadirlo para que si detecta un intento de ataque lo bloquee y podamos saber quien ha intentado hacer el ataque
            foreach($_REQUEST as $nombre_campo => $valor){
                //Para los nombres de los campos
                if(preg_match('~\b(delete|drop|truncate)\b~i',$nombre_campo)){
                    //vuelca los datos introducidos + la IP + el navegador
                    $volcado = implode(",", $_REQUEST).",".$_SERVER['REMOTE_ADDR'].",".$_SERVER['HTTP_USER_AGENT']."\n";
                    //creo el archivo en modo append
                    $myfile = fopen("volcado.txt", "a");
                    //escribo en el archivo $myfile el $volcado 
                    fwrite($myfile, $volcado);
                    //deten la ejecución
                    die("ejecución detenida");
                }
                //Para los valores
                if(preg_match('~\b(delete|drop|truncate)\b~i',$valor)){
                    //vuelca todos los datos
                    $volcado = implode(",", $_REQUEST).",".$_SERVER['REMOTE_ADDR'].",".$_SERVER['HTTP_USER_AGENT']."\n";
                    //creo el archivo en modo append
                    $myfile = fopen("volcado.txt", "a");
                    //escribo en el archivo $myfile el $volcado 
                    fwrite($myfile, $volcado);
                    //deten la ejecución
                    die("ejecución detenida");
                }
            }
            
            //incluyo los datos para la conexion a la bbdd que estan en config.php
            include "config.php";
            //creo cadenas vacías listado columnas y listado valores
            $listadocolumnas = "";
            $listadovalores = "";
            foreach($_POST as $nombre_campo => $valor){
                //echo "recibo el campo ".$nombre_campo." con el valor ".$valor."<br>";
                //si el nombre del campo no es la tabla ni es igual a clave
                if($nombre_campo != 'tabla' && $nombre_campo != 'clave'){
                    //meto los valores de los nombres de los campos y los valores dentro de las cadenas
                    $listadocolumnas .= ",".$nombre_campo."";
                    $listadovalores .= ",'".$valor."'";
                }
            }
            
            /////////////////////////////////////////////////////////////////////////////////
            //Para enviar email con la info de que el fomulario se ha entregado - NO FUNCIONA EN LOCALHOST
            /*
            $cabeceras .= 'From: noreply@jocarsa.com' . "\r\n" .
            'Reply-To: noreply@jocarsa.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
            $cabeceras .= 'MIME-Version: 1.0' . "\r\n";
            $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            
            $mensaje = "<h1>Has enviado un formulario al sistema de entregas</h1><br><p>A continuación te mostramos un comprobante de los campos que has enviado desde el formulario</p>";
            foreach($_POST as $nombre_campo => $valor){
                //echo "recibo el campo ".$nombre_campo." con el valor ".$valor."<br>";
                //si el nombre del campo no es la tabla ni es igual a clave
                if($nombre_campo != 'tabla' && $nombre_campo != 'clave'){
                    $mensaje .= "".ucfirst($nombre_campo).": <b>".$valor."</b><br>";  
                }
            }
            
            $mensaje .= "<br><p>Puedes consultar tus entregas realizadas haciendo click: ";
            $mensaje .= "<a href='localhost/supercrud/informe.php?clave=".codifica($_POST['email'])."'>AQUÍ</a></p>";
            $mensaje .= "<p style='color:red;'>IMPORTANTE: Este enlace contiene una clave con tu identificación, no compartas este correo electrónico con nadie</p><br>";
            
            mail(
                $_POST['email'],
                "Formulario enviado",
                $mensaje,
                $cabeceras
            );
            */
            //////////////////////////////////////////////////////////////////////////////////
            
            //establece la conexion a la base de datos 
            $mysqli = new mysqli($mydbserver, $mydbuser, $mydbpassword, $mydb);
            //Va meter un registro vacío en Identificador y el resto de valores y columnas los inserta normal en la bbdd
            $consulta = "INSERT INTO ".$_POST['tabla']." (Identificador".$listadocolumnas.") VALUES (NULL ".$listadovalores.")";
            //echo $consulta;
            //lanzo la consulta
            $mysqli->query($consulta);
            
            //quiero que registre quien ha mandado un formulario
            include "registro.php";
            
            //mensaje para que el usuario sepa que se ha enviado correctamente la info
            echo '<div class="notice">
                    <h1>Registro guardado correctamente</h1>
                        <p>Tu registro se ha guardado en la aplicación, redirigiendo en 5 segundos...</p>
                    </div>
            ';
            //Para redirigir en 5 segundos a la pagina anterior
            echo '<meta http-equiv="refresh" content="5; url=?" />';
            
        }
        
        //FUNCIÓN PARA LEER
        
        function leer($tabla){
            include "config.php";
            //echo  "A continuación pongo el contenido de la tabla: ".$tabla;
            $mysqli = new mysqli($mydbserver, $mydbuser, $mydbpassword, $mydb);
            $consulta = "SHOW FULL COLUMNS FROM ".$tabla;
            $resultado = $mysqli->query($consulta);
            echo '<table>';
            echo '<tr>';
            //Creo un contador de columnas
            $contadorcolumna = 0;
            
                while($fila = $resultado->fetch_assoc()){
                    echo '<th>'.json_decode($fila["Comment"])->titulo.'</th>';
                    //No es necesario declarar el array con anterioridad en PHP
                    $nombrecolumna[$contadorcolumna] = $fila["Field"];
                    $contadorcolumna++;
                    
                }
            echo '<th>Operaciones</th>';
            echo '</tr>';
            
            //CREAR EL BUSCADOR
            $consulta = "SHOW FULL COLUMNS FROM ".$tabla;
            $resultado = $mysqli->query($consulta);
            echo '<tr>';
            echo '<form action ="?tabla='.$tabla.'&buscar=si" method="POST">';
            $contadorcolumna = 0;
            
            while($fila = $resultado->fetch_assoc()){
                echo '<th><input type="text" name="'.$fila["Field"].'" class="campobuscador"><img src="../bootstrap-icons-1.11.1/search.svg" class="iconobusca"></th>';
                $comentarios[$contadorcolumna] = $fila["Comment"];
                $contadorcolumna++;
            }
            
            echo '<th><input type="submit" value="Busca"></th>';
            echo '</form>';
            echo '</tr>';
            $consulta = "
            SELECT * FROM ".$tabla." ";
            
            if(isset($_GET['buscar'])){
                $consulta .= "WHERE ";
                foreach($_POST as $clave=>$valor){
                    $consulta .= $clave." LIKE '%".$valor."%' AND ";
                }
                $consulta .= " true";
            }
            //Si no existe una busqueda elimina el limit y el offset
            if(!isset($_GET['buscar'])){
                $consulta .= " LIMIT ".$_SESSION['elementosporpagina']." ";
                $consulta .= " OFFSET ".($_SESSION['elementosporpagina']*$_SESSION['pagina'])." ";
            }
            //echo $consulta;
            $resultado = $mysqli->query($consulta);
            
            
            while($fila = $resultado->fetch_assoc()){
                $identificador = "";
                echo '<tr>';
                $contadorcolumna = 0;
                
                foreach($fila as $nombre_campo => $valor){
                if($nombrecolumna[$contadorcolumna] == "Identificador"){$identificador = $valor;}
                if(isset(json_decode($comentarios[$contadorcolumna])->FKtabla) && json_decode($comentarios[$contadorcolumna])->FKtabla != ""){
                    $consulta2 = "SELECT ".json_decode($comentarios[$contadorcolumna])->FKmostrar." AS campo FROM ".json_decode($comentarios[$contadorcolumna])->FKtabla." WHERE ".json_decode($comentarios[$contadorcolumna])->FKclave." = '".$valor."'";
                    //echo $consulta2;
                    $resultado2 = $mysqli->query($consulta2);
                    echo '<td externo="si" tabla="'.$tabla.'" claveexterna="'.json_decode($comentarios[$contadorcolumna])->FKclave.'" tablaexterna="'.json_decode($comentarios[$contadorcolumna])->FKtabla.'" columna="'.$nombrecolumna[$contadorcolumna].'" columnaexterna = "'.json_decode($comentarios[$contadorcolumna])->FKmostrar.'" identificador="'.$identificador.'">';
                    while ($fila2 = $resultado2->fetch_assoc()){
                        echo '<b>'.$valor."</b> - ".$fila2['campo'].'';
                    }
                    echo '</td>';
                        
                    }else{
                    
                        echo '<td externo="no" class ="'.$nombrecolumna[$contadorcolumna].'" columna ="'.$nombrecolumna[$contadorcolumna].'" tabla= "'.$tabla.'" identificador= "'.$identificador.'" ';
                        //si es una url, la clase será urlsi
                        if (filter_var($valor, FILTER_VALIDATE_URL)){echo "urlsi";}
                        echo '">';
                        //si el campo es una URL
                        if (filter_var($valor, FILTER_VALIDATE_URL)){
                            //el valor será un enlace
                            echo "<a href='".$valor."' target='blank'> ";

                        }
                        //si el campo es un email
                        if (filter_var($valor, FILTER_VALIDATE_EMAIL)){
                            //el valor será un enlace al email
                            echo "<a href='mailto:".$valor."' target='blank'> ";

                        }
                        echo $valor;
                        if (filter_var($valor, FILTER_VALIDATE_EMAIL)){
                            //cierro el <a>
                            echo "</a>";
                        }

                        //echo $valor;  
                        if (filter_var($valor, FILTER_VALIDATE_URL)){
                            //cierro el <a>
                            echo "</a>";
                        }
                        /*
                        if (filter_var($valor, FILTER_VALIDATE_URL)){
                            //el valor será un enlace al email
                            $url = $valor;
                            $parsed = parse_url($url);
                            //si el video es de youtube
                            if($parsed['host']=="www.youtube.com" || $parsed['host']=="youtu.be"){
                                $parts = parse_url($url);
                                parse_str($parts['query'],$query);
                                $miparte = $query['v'];
                                 echo '<iframe width="300" height="200" src="https://www.youtube.com/embed/'.$miparte.'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                            }
                        }
                         */  
                        echo '</td>';
                    }
                    $contadorcolumna++;
                }
                echo '<td>';
                echo '<a href="?tabla='.$_GET['tabla'].'&informe='.$fila['Identificador'].'"><img src="../bootstrap-icons-1.11.1/file-earmark-text.svg" class="icon"></a>';
                echo '<a href="?tabla='.$_GET['tabla'].'&update='.$fila['Identificador'].'"><img src="../bootstrap-icons-1.11.1/pencil-square.svg" class="icon"></a>';
                echo '<a href="?tabla='.$_GET['tabla'].'&delete='.$fila['Identificador'].'"><img src="../bootstrap-icons-1.11.1/trash3.svg" class="icon"></a>';
                echo '</td>';
                echo '</tr>';
                
            }
            
            echo '</table>';
            echo '<a href="?create='.$_GET['tabla'].'" id="create"><img src="../bootstrap-icons-1.11.1/plus-circle.svg" class="icon"></a>';
            //iconos para la paginacion
            echo '<div class = "paginacion">
                <a href="?tabla='.$_GET['tabla'].'&pagina=primera"><img src = "../bootstrap-icons-1.11.1/skip-backward-fill.svg" class="icon"></a>
            
                <a href="?tabla='.$_GET['tabla'].'&pagina=anterior"><img src = "../bootstrap-icons-1.11.1/arrow-left-circle-fill.svg" class="icon"></a>
                <a href="?tabla='.$_GET['tabla'].'&pagina=siguiente"><img src = "../bootstrap-icons-1.11.1/arrow-right-circle-fill.svg" class="icon"></a>
                
                <a href="?tabla='.$_GET['tabla'].'&pagina=ultima"><img src = "../bootstrap-icons-1.11.1/skip-forward-fill.svg" class="icon"></a>
            </div>';
        }
        
    //Aquí se acaba la función leer
        
        //FUNCION PARA VER LOS INFORMES
        function informe($tabla, $identificador){
            echo "<h1>Informe</h1>";
            include "config.php";

            $mysqli = new mysqli($mydbserver, $mydbuser, $mydbpassword, $mydb);
            $consulta = "SELECT * FROM ".$tabla." WHERE Identificador = ".$identificador." ";

            $resultado = $mysqli->query($consulta);
            echo '<table>';

            while ($fila = $resultado->fetch_assoc()) {
                echo '';
                foreach ($fila as $indice => $valor) {
                    echo '<tr><td>'.$indice.'</td><td>'.$valor.'</td></tr>';
                } 
                echo '';
            }
            echo '</table>';
            
            echo '<table>';
            
            $consulta = "SELECT * FROM informes WHERE tabla = '".$tabla."' ";
            $resultado = $mysqli->query($consulta);
            while($fila = $resultado->fetch_assoc()){
                echo "La petición que voy a hacer es: ".str_replace('[X]',$identificador,$fila['consulta']);
                $consulta2 = str_replace('[X]',$identificador,$fila['consulta']);
                $resultado2 = $mysqli->query($consulta2);
                while($fila2 = $resultado2->fetch_assoc()){
                    echo '<tr>';
                    foreach($fila2 as $clave=>$valor){
                        echo '<td>'.$valor.'</td>';
                    }
                    echo '</tr>';
                }
            }
            
            echo '</table>';
        }
        //FUNCIÓN PARA INSERTAR
       function insertar($tabla){
            
            include "config.php";
            //cuando se envíe el formulario nos vuelva a la tabla principal
            echo '<form action="?tabla='.$tabla.'" method = "POST">';
            echo '<input type="hidden" name="clave" value="procesainsertar">';
            echo '<input type="hidden" name="tabla" value="'.$tabla.'">';
            
            $mysqli = new mysqli($mydbserver, $mydbuser, $mydbpassword, $mydb);
            $consulta = "SHOW FULL COLUMNS FROM ".$tabla;
            $resultado = $mysqli->query($consulta);
            while($fila = $resultado->fetch_assoc()){
                if(json_decode($fila["Comment"])->visible == "true") {
                    preg_match('#\((.*?)\)#', $fila["Type"], $match);
                echo '
                    <div class="campo">
                            <h3>'.json_decode($fila["Comment"])->titulo.'</h3>
                            <p>'.json_decode($fila["Comment"])->descripcion.' - Caracteres mínimo: '.json_decode($fila["Comment"])->min.' máximo: '.$match[1].' </p>
                            ';
                            //si fila es NULL ponemos que el campo es requerido
                            if($fila["Null"] == "NO"){echo "<p>* Este campo es requerido</p>";}
                            //si el campo está deshabilitado ponemos que el campo no debe ser rellenado
                            if (json_decode($fila["Comment"])->deshabilitado == "true"){echo "<p>* Este campo lo rellena automáticamente el sistema</p>";}
                            //Campos del formulario
                            //el nombre de la fila sea el mismo que nombre del campo de la bbdd y el tipo de dato será el elemento tipodato del json en la bbdd
                            echo '
                            <div class="contienecampo">
                            <table><tr><td width="80%">
                                <input type="'.json_decode($fila["Comment"])->tipodato.'" name="'.$fila["Field"].'" id="'.$fila["Field"].'"
                                ';
                                
                                // Si el campo no es nulleable, debe ser requerido
                                if ($fila["Null"] == "NO") {
                                    echo " required ";}
                                // Si en el json el elemento deshabilitado es true en ese caso estará deshabilitado
                                if (json_decode($fila["Comment"])->deshabilitado == "true") {
                                    echo " readonly ";}
                                //para que los caracteres que se puedan poner en el formulario sean los mismos que los de la bbdd y el placeholder para el elemento placeholder del json en comentarios de la bbdd
                                preg_match('#\((.*?)\)#', $fila["Type"], $match);
                                echo '
                                maxlength = "'.$match[1].'"
                                minlength = "'.json_decode($fila["Comment"])->min.'"
                                placeholder = "'.json_decode($fila["Comment"])->placeholder.'"
                                ';
                    
                                //Desactivar temporalmente las advertencias
                                error_reporting(E_ERROR | E_PARSE);
                    
                                //en el caso de que exista en el json parametroget
                                if(isset(json_decode($fila["Comment"])->parametroget)){
                                    echo 'value = "'.$_GET[json_decode($fila["Comment"])->parametroget].'"';
                                }
                                //Volver a la configuración original de advertencias
                                error_reporting(E_ALL);
                    
                                echo'
                                >
                                </td><td width="20%">
                                <div class="tipocampo"><img src="../bootstrap-icons-1.11.1/'.json_decode($fila["Comment"])->icono.'" class="icon">
                                </div>
                                </td></tr></table>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        ';
                }
            }
            echo '<br><input type="submit" class="enviar">';
            /* Cerrar la conexion */
            $mysqli->close();
        } 
        //Aquí se acaba la función insertar
        
        //FUNCION PARA EL PROCESO DE INSERTAR
        function procesainsertar(){
            //atrapamos los request y los pasamos por expresiones regulares para intentar evitar las inyecciones de sql
            foreach($_REQUEST as $nombre_campo =>$valor){
                if(preg_match("~\b(drop|delete|truncate)\b~i",$nombre_campo)){
                    $volcado=implode(",",$_REQUEST).",".$_SERVER['REMOTE_ADDR'].",".$_SERVER['HTTP_USER_AGENT']."\n";//atrapamos tambien la ip y el browser
                    $myfile = fopen("volcado.txt", "a");
                    fwrite($myfile, $volcado);
                    die("Ejecución detenida");

                }
                if(preg_match("~\b(drop|delete|truncate)\b~i",$valor)){
                    $volcado=implode(",",$_REQUEST).",".$_SERVER['REMOTE_ADDR'].",".$_SERVER['HTTP_USER_AGENT']."\n";
                    $myfile = fopen("volcado.txt", "a");
                    fwrite($myfile, $volcado);
                    die("Ejecución detenida");

                }
            }
            include "config.php";
            $listadocolumnas ="";
            $listadovalores ="";
            foreach($_POST as $nombre_campo=>$valor){

                if($nombre_campo != 'tabla' && $nombre_campo != 'clave'){
                    $listadocolumnas.=",".$nombre_campo."";
                    $listadovalores.=",'".$valor."'";

                }
            }
            $mysqli = new mysqli($mydbserver, $mydbuser, $mydbpassword, $mydb);
            $query = "INSERT INTO ".$_POST['tabla']."(identificador".$listadocolumnas.") VALUES(NULL".$listadovalores.")";
            
            $resultado = $mysqli->query($query);
            include "registro.php";

        }
        //Aquí se acaba la función procesainsertar
        
        //FUNCION DELETE
        function delete($tabla,$identificador){
            
            include "config.php";

            $mysqli = new mysqli($mydbserver, $mydbuser, $mydbpassword, $mydb);
            $consulta = "DELETE FROM ".$tabla." WHERE Identificador=" .$identificador." ";

            $mysqli->query($consulta);
            include "registro.php";

        }
        //Aqui termina la funcion delete
        
        //FUNCIÓN PARA UPDATE
        function update($tabla,$identificador){
            include "config.php";
            echo '<form action="?tabla='.$tabla.'" method="POST">';
            echo '<input type="hidden" name="clave" value="procesaupdate">';
            echo '<input type="hidden" name="tabla" value="'.$tabla.'">';
            //meto aquí el valor de identificador
            echo '<input type="hidden" name="identificador" value="'.$identificador.'">';
            
            $mysqli = new mysqli($mydbserver, $mydbuser, $mydbpassword, $mydb);

            $consulta = "SHOW FULL COLUMNS FROM ".$tabla; //SHOW FULL COLUMNS FROM muestra nombres de las columnas y los metadatos (como el tipo y longitud de los datos)
            $resultado = $mysqli->query($consulta);
            
            while($fila = $resultado->fetch_assoc()){
                
                //usamos json decode para poder extraer los datos del json de cada uno de los comentarios
                if(json_decode($fila["Comment"]) != NULL && json_decode($fila["Comment"])->visible=="true"){ //&& 
                preg_match('#\((.*?)\)#',$fila["Type"],$match);
                echo '
                <div class="campo">
                    <h3>'.json_decode($fila["Comment"])->titulo.'</h3>
                    <p>'.json_decode($fila["Comment"])->descripcion.'-Caracteres: min='.json_decode($fila["Comment"])->min.' max='.$match[1].'</p>
                    ';
                    if($fila["Null"]=="NO"){echo " <p> *Este campo es requerido</p> ";}
                    if(json_decode($fila["Comment"])->deshabilitado=="true"){echo " <p> *Este campo esta deshabilitado</p> ";}
                    //creamos una tabla para estilizar el contenido
                    echo '
                    <div class="contienecampo">
                    <table><tr><td width="80%">
                    <input type="'.json_decode($fila["Comment"])->tipodato.'" name="'.$fila['Field'].'" id"'.$fila['Field'].'"';

                    if($fila["Null"]=="NO"){echo " required ";}
                    preg_match('#\((.*?)\)#',$fila["Type"],$match); //extraemos el valor de la longitud de datos que se encuentran entre () dentro de Type   
                    echo '
                    maxlength="'.$match[1].'"
                    minlenght="'.json_decode($fila["Comment"])->min.'"
                    placeholder="'.json_decode($fila["Comment"])->placeholder.'"
                    ';
                    
                    //Me conecto a la base de datos y busco el valor
                    $consulta2 = "SELECT * FROM ".$tabla." WHERE Identificador=".$identificador."";
                    $resultado2 = $mysqli->query($consulta2);
                    while($fila2 = $resultado2->fetch_assoc()){
                        echo 'value='.$fila2[$fila["Field"]].'';
                        
                    }
                    
                    echo '
                    >
                    </td><td width="20%">
                    <div class="tipocampo"><i class="'.json_decode($fila["Comment"])->icono.'"></i></div>
                    </td></tr></table>
                    </div>
                    <div class="clearfix"></div>
                </div>
                ';
                } 
            }


    $mysqli->close();
                echo '<input type="submit" value="Enviar"></form>';
                }
     //Aquí acaba la funcion de upadte  
    
        
    //FUNCION PARA PROCESAR EL UPDATE
    function procesaupdate($tabla,$identificador){
            //atrapamos los request y los pasamos por expresiones regulares para intentar evitar las inyecciones de sql
            foreach($_REQUEST as $nombre_campo =>$valor){
                if(preg_match("~\b(drop|delete|truncate)\b~i",$nombre_campo)){
                    $volcado=implode(",",$_REQUEST).",".$_SERVER['REMOTE_ADDR'].",".$_SERVER['HTTP_USER_AGENT']."\n";//atrapamos tambien la ip y el browser
                    $myfile = fopen("volcado.txt", "a");
                    fwrite($myfile, $volcado);
                    die("Ejecución detenida");

                }
                if(preg_match("~\b(drop|delete|truncate)\b~i",$valor)){
                    $volcado=implode(",",$_REQUEST).",".$_SERVER['REMOTE_ADDR'].",".$_SERVER['HTTP_USER_AGENT']."\n";
                    $myfile = fopen("volcado.txt", "a");
                    fwrite($myfile, $volcado);
                    die("Ejecución detenida");

                }
            }
            include "config.php";
            $cadena ="";
            foreach($_POST as $nombre_campo=>$valor){

                if($nombre_campo != 'tabla' && $nombre_campo != 'clave'){
                    $cadena .= $nombre_campo."='".$valor."',";

                }
            }
            //para quitar el ultimo caracter del string
            $cadena = substr($cadena,0,-1);
            $mysqli = new mysqli($mydbserver, $mydbuser, $mydbpassword, $mydb); 
            $query ="UPDATE ".$tabla." SET ".$cadena." WHERE Identificador=".$identificador."";
            $resultado = $mysqli->query($query);
            include "registro.php";

        }

    }
?>
</form>