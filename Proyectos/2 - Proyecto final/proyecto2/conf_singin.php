<?php
//incluyo session y config para la conexion
session_start();
include "config.php";
//realizo la consulta
$consulta = "SELECT * FROM usuarios
WHERE
usuario = '".$_POST['usuario']."'
OR
email = '".$_POST['email']."'
";
//comprueba con una consulta de tipo select en la tabla usuario los post usuario y email, ya que no pueden existir dos iguales en la base de datos
$resultado = $conexion->query($consulta); //lanzo la consulta y guardo el resultado en una variable resultado

if($fila=$resultado->fetch_assoc()){
    header("Location:singin.php?error=si");
    //si coincide, es decir, hay dos iguales creo la varible "error" dentro del enlace
}else{
    //si no coincide hago un INSERT en la tabla usuarios
    $privilegioinicial = 1;
    $peticion = " INSERT INTO
    usuarios
    VALUES
    (NULL,
    '".$_POST['usuario']."',
    '".$_POST['contrasena']."',
    '".$_POST['email']."',
    '".$privilegioinicial."')";
    
    $conexion->query($peticion);
    header("Location:home.php?registro=si");
    //creo el parámetro "registro" en la url y le paso un valor
}

?>

