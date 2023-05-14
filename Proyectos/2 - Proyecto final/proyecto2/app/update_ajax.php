<?php 
session_start();
include "../config.php";

$checkid = $_POST['checkid'];
$status = $_POST['status'];
//consulta para recuperar la info de registros del usuario
$consulta = "SELECT * FROM registros WHERE idusuario = '".$_SESSION['idtablausuario']."'";
$resultado = $conexion->query($consulta);
//obtengo el valor del string del controlcheck
if($fila = $resultado->fetch_assoc()){
    $controlcheck = $fila['controlcheck'];
    //convierto el string en un array
    $arraycheck = explode(',',$controlcheck);
}

//checkid es el indice de la matriz que identifica un reto
if($status == 1){
    $arraycheck[$checkid] = 1;
    //si el botón está marcado, el valor de este índice será 1
} else {
    $arraycheck[$checkid] = 0;
    //si no está marcado el valor del índice sera 0
}

$stringcheck = implode(',',$arraycheck);
//vuelvo a convertir el array en un string para actualizar los valores en la base de datos
$consulta2 = 'UPDATE registros SET controlcheck="'.$stringcheck.'" WHERE idusuario="'.$_SESSION['idtablausuario'].'"';
$resultado2 = $conexion->query($consulta2);
?>
