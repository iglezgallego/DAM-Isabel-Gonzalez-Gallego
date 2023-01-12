<?php
session_start();
include "config.php";

$consulta = "SELECT * FROM usuarios WHERE usuario = '".$_POST['usuario']."' AND contrasena = '".$_POST['contrasena']."'";
$resultado = $conexion->query($consulta);
$_SESSION['pasas'] = false;

if($fila = $resultado->fetch_assoc()){
    $_SESSION['usuario'] = $fila['usuario'];
    $_SESSION['idtablausuario']= $fila['Identificador'];
    $consulta2 = "SELECT * FROM registros WHERE idusuario = '".$fila['Identificador']."' ";
    $resultado2 = $conexion->query($consulta2);
    $_SESSION['pasas'] = true;
    if($fila2 = $resultado2->fetch_assoc()){
        //PONER BIEN LA DIRECCION URL PARA QUE TE SALGA EL CALENDARIO QUE TIENE GUARDADO EN LA BASE DE DATOS
        header("Location:app/app.php?idpadre=".$fila2['idtema']);
    }else{
        header("Location:app/temas.php");
    }
    
}else{
    header("Location:index.php?error=si"); //header("Location:temas.php?finalizado=si");
    $_SESSION['pasas'] = false;
    }
?>