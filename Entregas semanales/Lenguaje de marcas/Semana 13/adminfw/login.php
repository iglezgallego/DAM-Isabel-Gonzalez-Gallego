<?php
session_start();
/*
    echo "Que sepas que el usuario que has enviado es ".$_POST['usuario']."<br>";
    echo "Que sepas que la contraseña que has enviado es ".$_POST['contrasena']."<br>";
*/
//Abro la conexion con la base de datos 
$enlace = mysqli_connect("localhost", "cursoaplicacionesweb", "cursoaplicacionesweb", "cursoaplicacionesweb");

//Le pido algo a la base de datos
$peticion = "

SELECT * FROM usuarios
WHERE 
usuario = '".$_POST['usuario']."'
AND
password = '".$_POST['contrasena']."'
LIMIT 1
    
";
$resultado = mysqli_query($enlace,$peticion);

$pasas = false;
$_SESSION['pasas'] = false;

//Devuelvo por pantalla los datos que me de
if ($fila = $resultado->fetch_assoc()) {
    //echo $fila['nombre']." ".$fila['apellidos']."<br>";
    $pasas = true;
    $_SESSION['nombre'] = $fila['nombre'];
    $_SESSION['apellidos'] = $fila['apellidos'];
}else{
    //echo "No hay ningun usuario que cumpla esas caracteristicas";
    $pasas = false;
}

//Validamos
if($pasas){
    echo "Te voy a dar acceso a la aplicacion";
    $_SESSION['pasas'] = true;
    echo '<meta http-equiv="refresh"
   content="5; url=escritorio.php">';
    //si pasas redirecciona a escritorio.php
}else{
    echo "No te voy a dar acceso a la aplicacion";
    $_SESSION['pasas'] = false;
    echo '<meta http-equiv="refresh"
   content="5; url=index.html">';
}
    //si no pasas redirecciona a index.php

//Cierro los recursos que haya abierto  
mysqli_close($enlace);


?>