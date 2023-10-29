<table cellpadding= 0 colspacing = 0>

<?php
    
    // Conexión a la base de datos utilizando MySQLi
    $mysqli = new mysqli("localhost","registros","registros","registros");
    // Consulta SQL para traer la peticion guardada en la variable sql
    $sql = $_GET['sql']." LIMIT 1";
    // Ejecución de la consulta y obtención de los resultados
    $result = $mysqli -> query($sql); 
    // Recorre los resultados y mientras haya registros
    while ($row = $result -> fetch_assoc()) {
        // Imprime una fila de encabezados de tabla ('th') con los nombres de las columnas
        echo '<tr>';
        foreach($row as $campo=>$valor){
            echo '<th>'.$campo.'</th>';
        }
        echo '</tr>';
    }
    
    // Conexión a la base de datos utilizando MySQLi
    $mysqli = new mysqli("localhost","registros","registros","registros");
    // Consulta SQL para traer la peticion guardada en la variable sql
    $sql = $_GET['sql'];
    // Ejecución de la consulta y obtención de los resultados
    $result = $mysqli -> query($sql); 
    // Recorre los resultados y mientras haya registros
    while ($row = $result -> fetch_assoc()) {
        // Imprime una fila de datos ('td') con los valores de las columnas
        echo '<tr>';
        foreach($row as $campo=>$valor){
            echo '<td>'.$valor.'</td>';
        }
        echo '</tr>';
    }
?>
    
</table>