<?php
    
    include "conexiondb.php";

    $peticion = "DELETE FROM usuarios WHERE Identificador = ".$_GET['id']."";
    mysqli_query($enlace,$peticion);
    echo '<meta http-equiv="refresh"
   content="1; url=paneldecontrol.php">';
    
    ?>