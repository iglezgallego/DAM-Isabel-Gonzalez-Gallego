
<?php
    
    include "conexiondb.php";
    
    $peticion = "
    UPDATE usuarios
    SET usuario = '".$_POST['usuario']."',
    password = '".$_POST['password']."',
    nombre = '".$_POST['nombre']."',
    apellidos = '".$_POST['apellidos']."'
    WHERE
    Identificador = '".$_POST['Identificador']."'
    
    ";
    mysqli_query($enlace,$peticion);
    echo '<meta http-equiv="refresh"
   content="2; url=paneldecontrol.php">';
    
    ?>