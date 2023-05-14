<?php
//cargo SESSION y la conexion a la base de datos
session_start();
include "../config.php";

//SI QUIERO BORRAR EN LA TABLA TEMAS
if($_GET['tabla'] == 'temas'){
//Obtener el idpadre del tema que quiero borrar
$consulta = "SELECT idpadre FROM temas WHERE Identificador = ".$_GET['id'];
$resultado = $conexion->query($consulta);
$fila = $resultado->fetch_assoc();
$idpadre = $fila['idpadre'];

//Eliminar los retos relacionados con ese tema
$consulta3 = "DELETE FROM retos WHERE idhijo = $idpadre";
$conexion->query($consulta3);

//Borrar el valor de temas seleccionado
$consulta2 = "DELETE FROM ".$_GET['tabla']." WHERE Identificador = ".$_GET['id'];
$conexion->query($consulta2);
    
//SI QUIERO BORRAR EN LA TABLA RETOS
}else{
//Borrar el valor de retos seleccionado
$consulta2 = "DELETE FROM ".$_GET['tabla']." WHERE Identificador = ".$_GET['id'];
$conexion->query($consulta2);  
}
//una vez eliminado redirige a la tabla con la que estoy operando
header("Location: panelcontrol.php?tabla=".$_GET['tabla']);
exit;
?>