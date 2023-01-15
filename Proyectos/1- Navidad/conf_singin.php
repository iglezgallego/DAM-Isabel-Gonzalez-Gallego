<?php
session_start();
include "config.php";
//realizo la consulta
$consulta = "SELECT * FROM usuarios
WHERE
usuario = '".$_POST['usuario']."'
OR
email = '".$_POST['email']."'
";
//cogeme usuario y email, ya que no pueden existir dos iguales en la base de datos
$resultado = $conexion->query($consulta); //establezco la conexión

if($fila=$resultado->fetch_assoc()){
    header("Location:singin.php?error=si");
    //creo la varible "error" dentro del enlace
}else{
    $peticion = " INSERT INTO
    usuarios
    VALUES
    (NULL,
    '".$_POST['usuario']."',
    '".$_POST['contrasena']."',
    '".$_POST['email']."');
    ";
    $conexion->query($peticion);
    echo "Usuario registrado correctamente";
    header("Location:index.php?registro=si");
    //creo la varible "registro" dentro del enlace
}

?>

