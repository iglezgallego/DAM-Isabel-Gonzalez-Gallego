<?php
//Incluyo la conexión a la base de datos en config.php
include "config.php";
// Consulta SQL para traer la peticion guardada en la variable sql
$sql = $_GET['sql']."";
// Ejecución de la consulta y obtención de los resultados
$result = $mysqli -> query($sql);
//Mientras haya registros metelos en un array asociativo dentro de row
$row = $result -> fetch_assoc();
//Creo una variable contador
$contador = 0;
//mientras haya resultados
while ($row = $result -> fetch_assoc()) {
    //aumenta el contador
  $contador++;  
}
//nos dice por pantalla los resultados que ha obtenido
echo '<p> La busqueda ha devuelto '.$contador.' resultados </p>';
?>

<table colpadding = 0 colspacing = 0 cellpading = 0 cellspacing = 0 width=100%>

<?php
    
    
    // Consulta SQL para traer la peticion guardada en la variable sql
    $sql = $_GET['sql']."";
    // Ejecución de la consulta y obtención de los resultados
    $result = $mysqli -> query($sql); 
    // Recorre los resultados y mientras haya registros
    if ($row = $result -> fetch_assoc()) {
        // Imprime una fila de encabezados de tabla ('th') con los nombres de las columnas
        echo '<tr>';
        foreach($row as $campo=>$valor){
            echo '<th>'.$campo.'</th>';
        }
        echo '</tr>';
    }
    
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