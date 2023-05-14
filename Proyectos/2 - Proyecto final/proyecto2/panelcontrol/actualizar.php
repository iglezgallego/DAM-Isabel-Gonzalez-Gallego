<?php 
//incluyo la conexion a la base de datos
include "../config.php";

$contador = 0;
//Los dos primeros campos no son utiles (tabla y id), entonces usamos contador >= 2
//Con foreach cojo todos los valores que existen en el array y hago tantas peticiones de actualizacion como campos existan
foreach ($_POST as $clave => $valor){
    if($contador >=2){
        //Voy a actualizar el valor del campo ".$clave." con el valor ".$valor."
        $peticion = "
        UPDATE ".$_POST['tabla']."
        SET ".$clave." = '".$valor."'
        WHERE
        Identificador = '".$_POST['id']."'
        ";
        $conexion->query($peticion);
        }
    $contador++;
}
//una vez insertado redirige a la tabla con la que estoy operando
header("Location: panelcontrol.php?tabla=".$_POST['tabla']);
exit;

?>
