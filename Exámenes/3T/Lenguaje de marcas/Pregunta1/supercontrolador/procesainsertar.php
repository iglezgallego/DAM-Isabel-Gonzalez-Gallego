<?php
include "conexiondb.php";

// Eliminamos los dos primeros campos (tabla e id) del arreglo $_POST
$campos = array_slice($_POST, 2);

// Creamos los arrays de columnas y valores para la inserción
$columnas = array_keys($campos);
$valores = array_values($campos);

// Generamos los placeholders de los valores
$placeholders = array_fill(0, count($valores), '?');

// Preparamos la consulta de inserción
$peticion = "INSERT INTO " . $_POST['tabla'] . " (" . implode(",", $columnas) . ") VALUES (" . implode(",", $placeholders) . ")";

// Creamos una sentencia preparada
$stmt = mysqli_prepare($enlace, $peticion);

// Verificamos si la preparación de la consulta fue exitosa
if ($stmt) {
    // Asociamos los valores a los placeholders y ejecutamos la inserción
    mysqli_stmt_bind_param($stmt, str_repeat("s", count($valores)), ...$valores);
    mysqli_stmt_execute($stmt);

    // Redireccionar a la tabla que acabas de modificar
    header("Location: escritorio.php?tabla=" . $_POST['tabla']);
    exit;
} else {
    // Manejo de errores en caso de que la preparación de la consulta haya fallado
    echo "Error: " . mysqli_error($enlace);
}
?>
