<?php 
//incluyo la conexion a la base de datos
include "../config.php";
    
//para coger el último valor de idpadre e incrementarlo en 1
$consulta = "SELECT MAX(idpadre) FROM temas;";
$resultado = $conexion->query($consulta);
$ultimoIdPadre = $resultado->fetch_row()[0];
$nuevoIdPadre = $ultimoIdPadre + 1;
$valores['idpadre'] = $nuevoIdPadre;

//hacer el insert correspondiente   
$peticion = " INSERT INTO
    temas
    VALUES
    (NULL,
    '".$_POST['tema']."',
    '".$_POST['descripcion']."',
    '".$_POST['foto']."',
    '".$valores['idpadre']."')";
    
    $conexion->query($peticion);

//una vez insertado redirige a la tabla con la que estoy operando
header("Location: panelcontrol.php?tabla=".$_POST['tabla']);
exit;

?>
