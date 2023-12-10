
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
        
        //creo la funcion para INSERTAR información de los formularios dentro de la BBDD
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
        
        
        function leer($tabla){
            include "config.php";
            //echo  "A continuación pongo el contenido de la tabla: ".$tabla;
            $mysqli = new mysqli($mydbserver, $mydbuser, $mydbpassword, $mydb);
            $consulta = "SHOW FULL COLUMNS FROM ".$tabla;
            $resultado = $mysqli->query($consulta);
            echo '<table>';
            echo '<tr>';
                while($fila = $resultado->fetch_assoc()){
                    echo '<th>'.$fila["Field"].'</th>';
                    
                }
            echo '<th>Operaciones</th>';
            echo '</tr>';
            $consulta = "SELECT * FROM ".$tabla;
            $resultado = $mysqli->query($consulta);
            
            while($fila = $resultado->fetch_assoc()){
                echo '<tr>';
                foreach($fila as $nombre_campo => $valor){
                    echo '<td>'.$valor.'</td>';
                }
                echo '<td>';
                echo '<a href=""><img src="../bootstrap-icons-1.11.1/pencil-square.svg" class="icon"></a>';
                echo '<a href=""><img src="../bootstrap-icons-1.11.1/trash3.svg" class="icon"></a>';
                echo '</td>';
                echo '</tr>';
            }
            
            echo '</table>';
            echo '<a href="?create='.$_GET['tabla'].'" id="create"><img src="../bootstrap-icons-1.11.1/plus-circle.svg" class="icon"></a>';
        }
    //Aquí se acaba la función leer
        
       function insertar($tabla){
            
            include "config.php";
            echo '<form action="?" method = "POST">';
            echo '<input type="hidden" name="clave" value="procesaformulario">';
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
        //Aquí se acaba la función insertar
        } 
    }
?>
</form>