<?php
session_start();
/*
    echo "Que sepas que el usuario que has enviado es ".$_POST['usuario']."<br>";
    echo "Que sepas que la contraseña que has enviado es ".$_POST['contrasena']."<br>";
*/
//Incluyo conexiondb 
include "conexiondb.php";

//Le pido algo a la base de datos
$peticion = "

SELECT * FROM usuarios
WHERE 
usuario = '".$_POST['usuario']."'
AND
contrasena = '".$_POST['contrasena']."'
LIMIT 1
    
";
$resultado = mysqli_query($enlace,$peticion);

$pasas = false;
$_SESSION['pasas'] = false;

//si existen resultados
if ($fila = $resultado->fetch_assoc()) {
    //pasas es igual a true y guardo los datos en variables de sesion
    $pasas = true;
    $_SESSION['usuario'] = $fila['usuario'];
    $_SESSION['idusuario'] = $fila['Identificador'];
}else{
    //Si no hay ningun usuario que cumpla esas caracteristicas, pasas es igual a false
    $pasas = false;
}

//Validamos
if($pasas){
    echo "Te voy a dar acceso a la aplicacion";
    $_SESSION['pasas'] = true;
    echo '<meta http-equiv="refresh"
   content="2; url=escritorio.php">';
    //si pasas redirecciona a escritorio.php
}else{
    echo "No te voy a dar acceso a la aplicacion";
    $_SESSION['pasas'] = false;
    echo '<meta http-equiv="refresh"
   content="2; url=index.html">';
}
    //si no pasas redirecciona a index.php

//Cierro los recursos que haya abierto  
mysqli_close($enlace);


?>