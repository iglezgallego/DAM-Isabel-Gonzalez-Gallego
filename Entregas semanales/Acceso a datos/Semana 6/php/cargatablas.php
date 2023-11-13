<option>Selecciona una tabla</option>

<?php

    //Incluyo la conexión a la base de datos en config.php
    include "config.php";
    // Consulta SQL para mostrar las tablas de la base de datos
    $sql = "SHOW TABLES";
    // Ejecución de la consulta y obtención de los resultados
    $result = $mysqli -> query($sql); 
    // Recorre los resultados y devuelvelo como un array
    while ($row = $result -> fetch_array()) {
        // Muestra los valores de los nombre de la tabla
        echo '<option value="'.$row[0].'">'.$row[0].'</option>';
        
    }

?>