<?php
//incluyo session y config para la conexion
session_start();
include "config.php";
//realizo la consulta, que coincida usuario y contraseña con el post introducido en el formulario
$consulta = "SELECT * FROM usuarios WHERE usuario = '".$_POST['usuario']."' AND contrasena = '".$_POST['contrasena']."'";
$resultado = $conexion->query($consulta);
//creo la variable de sesión pasas
$_SESSION['pasas'] = false;

if($fila = $resultado->fetch_assoc()){
    //creo las variables usuario, idtablausuario y privilegio que serán necesarias en app.php y en temas.php
    $_SESSION['usuario'] = $fila['usuario'];
    $_SESSION['idtablausuario']= $fila['Identificador'];
    $_SESSION['privilegio'] = $fila['privilegio'];
    //si existe un registro previo de un calendario empezado, se envia al usuario a dicho calendario y si no a temas.php
    $consulta2 = "SELECT * FROM registros WHERE idusuario = '".$fila['Identificador']."' ";
    $resultado2 = $conexion->query($consulta2);
    $_SESSION['pasas'] = true;
    if($fila2 = $resultado2->fetch_assoc()){
        //enviamos al usuario a app.php con el parametro idpadre del tema, necesario para identificar los retos del mismo en la tabla retos
        //tambien para identificar el tema que se tiene que mostrar al usuario
        header("Location:app/app.php?idpadre=".$fila2['idtema']);
    }else{
        //si no hay registro previo se le manda a temas.php
        header("Location:app/temas.php");
    }
    
}else{
    //en caso de que exista un error en el inicio de sesion se le devuelve a home.php
    header("Location:home.php?error=si"); 
    $_SESSION['pasas'] = false;
    }
?>