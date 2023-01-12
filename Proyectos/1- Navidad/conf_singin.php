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
$resultado = $conexion->query($consulta); //establezco la conexión

if($fila=$resultado->fetch_assoc()){
    //poner el mensaje de usuario o email existente
    header("Location:singin.php?error=si");
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
}

?>

