<style>
    body{
        font-family:sans-serif;
    }
    .campo{
        margin-bottom:20;
        border-bottom: 1px solid black;
    }
    .campo label{
        font-size: 2em;
        padding:0px;
        margin:0px;
    }
    .campo p{
        font-size:1em;
        padding:0px;
        margin:0px;
    }
</style>

<!-- Formulario action el mismo archivo metodo POST -->
<form action="?" method = "POST">

<?php
    //establece la conexion a la base de datos 
    $mysqli = new mysqli("localhost", "supercrud", "supercrud", "supercrud");
    /* verificar la informacion */
    if($mysqli->connect_errno){
        printf("Conexión fallida: %s\n", $mysqli->connect_error);
        exit();
    }
    //creo la variable tabla
    $tabla = "entregas";
    
    //luego quiero ver las columnas
    $consulta = "SHOW FULL COLUMNS FROM ".$tabla;
    $resultado = $mysqli->query($consulta);
    while($fila = $resultado->fetch_assoc()){
        /*
        //dame toda la info de la fila
        echo "La columna se llama: ".$fila["Field"]."<br>";
        echo "Comentario de la columna: ".$fila["Comment"]."<br>";
        echo "El tipo de dato es : ".$fila["Type"]."<br>";
        echo "Vamos a ver si la columna es una clave : ".$fila["Key"]."<br>";
        echo "La columna es nuleable : ".$fila["Null"]."<br>";
        echo "<br>";
        //var_dump($fila);*/
        if($fila["Key"] == NULL){
        echo '
            <div class="campo">
                <label for="' . $fila["Field"] . '">' . $fila["Field"] . '</label>
                <p>' . $fila["Comment"] . '</p>
                <input type="';
            if (strpos($fila["Type"], "varchar") !== false) {
                echo "text";
            } else if (strpos($fila["Type"], "int") !== false) {
                echo "number";
            }
            echo '" name="'.$fila["Field"].'" id="'.$fila["Field"]. '"';

            // Si el campo no es nulleable, debe ser requerido
            if ($fila["Null"] == "NO") {
                echo " required ";}
            preg_match('#\((.*?)\)#', $fila["Type"], $match);
            echo '
            max = "'.$match[1].'"
            >
                </div>
            ';
        }
    }  
        
        
        
    /* Cerrar la conexion */
    $mysqli->close();
?>
<input type="submit">
</form>