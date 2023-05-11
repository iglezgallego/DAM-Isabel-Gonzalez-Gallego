<?php 
    //Este archivo actualiza UN SOLO DATO en la base de datos
    
    include "conexiondb.php";
    
        $peticion = "UPDATE ".$_GET['tabla']." SET ".$_GET['columna']." = '".$_GET['valor']."' WHERE Identificador = ".$_GET['identificador']."";
    mysqli_query($enlace,$peticion);
   
?>