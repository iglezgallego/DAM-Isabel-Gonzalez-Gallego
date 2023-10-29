
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
                if($fila["Key"] == NULL && $fila["Field"] != "epoch") {
                    //muestra estos datos en el formulario
                echo '
                    <div class="campo">
                        <label for="' . $fila["Field"] . '">' . $fila["Field"] . '</label><br>
                        ';
                        //si fila es NULL
                        if($fila["Null"] == "NO"){echo "<p>* Este campo es requerido</p>";}
                        echo '
                        <input type="';
                    if ($fila["Field"] == 'email') {
                        echo "email";
                    } 
                    //si es un varchar que sea tipo text
                    else if (strpos($fila["Type"], "varchar") !== false) {
                        echo "text";
                    } 
                    //si es un int que sea tipo number
                    else if (strpos($fila["Type"], "int") !== false) {
                        echo "number";
                    } 
                    //el nombre de la fila sea el mismo que nombre del campo de la bbdd
                    echo '" name="'.$fila["Field"].'" id="'.$fila["Field"]. '"';

                    // Si el campo no es nulleable, debe ser requerido
                    if ($fila["Null"] == "NO") {
                        echo " required ";}
                    // Si fila es igual a epoch esta desahabilitado
                    if ($fila["Field"] == "epoch") {
                        echo " disabled ";}
                    //para que los caracteres que se puedan poner en el formulario sean los mismos que los de la bbdd y el placeholder para los comentarios de la bbdd
                    preg_match('#\((.*?)\)#', $fila["Type"], $match);
                    echo '
                    maxlength = "'.$match[1].'"
                    
                    placeholder = "'.$fila["Comment"].'"
                    class="placeholder-extension"
                    >
                    <br><br>
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
            //echo "Si estas viendo esto es que vamos a procesar el formulario";
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
            
            //establece la conexion a la base de datos 
            $mysqli = new mysqli($mydbserver, $mydbuser, $mydbpassword, $mydb);
            //Va meter un registro vacío en Identificador y el resto de valores y columnas los inserta normal en la bbdd
            $consulta = "INSERT INTO ".$_POST['tabla']." (Identificador".$listadocolumnas.") VALUES (NULL ".$listadovalores.")";
            //echo $consulta;
            //lanzo la consulta
            $mysqli->query($consulta);
            //mensaje para que el usuario sepa que se ha enviado correctamente la info
            echo '<div class="notice">
                    <h1>Registro guardado correctamente</h1>
                        <p>Tu registro se ha guardado en la aplicación, redirigiendo en 5 segundos...</p>
                    </div>
            ';
            //Para redirigir en 5 segundos a la pagina anterior
            echo '<meta http-equiv="refresh" content="5; url=?" />';
        }
    //Aquí se acaba la clase    
    }
?>
</form>