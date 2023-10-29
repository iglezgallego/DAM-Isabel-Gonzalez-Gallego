<?php

    // Conexión a la base de datos utilizando MySQLi
    $mysqli = new mysqli("localhost","registros","registros","registros");
    // Consulta SQL para mostrar las tablas de la base de datos
    // El nombre de la tabla se obtiene a través del parámetro 'tabla' pasado por GET
    $sql = "SHOW COLUMNS FROM ".$_GET['tabla'];
    // Ejecución de la consulta y obtención de los resultados
    $result = $mysqli -> query($sql); 
    // Recorre los resultados y devuelvelo como un array
    while ($row = $result -> fetch_array()) {
        //Imprime un checkbox con el nombre de la columna como etiqueta
        echo '<input
        type="checkbox"
        value="'.$row[0].'" 
        name="seleccionacampos">'.$row[0].'<br>';
        
    }

?>