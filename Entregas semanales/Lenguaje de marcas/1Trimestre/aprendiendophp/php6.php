<?php
//ESTRUCTURA MINIMA PARA CONECTARSE A UNA BASE DE DATOS

//Abro la conexion con la base de datos 
$enlace = mysqli_connect("localhost", "cursoaplicacionesweb", "cursoaplicacionesweb", "cursoaplicacionesweb");
//Le pido algo a la base de datos
$resultado = mysqli_query($enlace, "SELECT * FROM usuarios");
//Devuelvo por pantalla los datos que me de
while ($fila = $resultado->fetch_assoc()) {
    echo $fila['nombre']." ".$fila['apellidos']."<br>";
}
//Cierro los recursos que haya abierto  
mysqli_close($enlace);

?>