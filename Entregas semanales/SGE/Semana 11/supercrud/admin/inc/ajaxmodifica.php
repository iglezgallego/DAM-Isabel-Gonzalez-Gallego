<?php 
    //incluyo config
    include "../../config.php";
    //conecto con la base de datos
    $mysqli = new mysqli($mydbserver, $mydbuser, $mydbpassword, $mydb);
        //Creo la consulta pasando los parámetros necesarios   
        $query = "UPDATE ".$_GET['tabla']." SET ".$_GET['columna']."= '".$_GET['valor']."' WHERE Identificador=".$_GET['identificador']."";
        //lanzo la consulta
        $resultado = $mysqli->query($query);
?>