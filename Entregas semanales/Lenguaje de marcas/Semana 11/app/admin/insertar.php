<?php

include "conexiondb.php";

$peticion = "
INSERT INTO
usuarios
VALUES
(NULL,
'".$_POST['usuario']."',
'".$_POST['password']."',
'".$_POST['nombre']."',
'".$_POST['apellidos']."',
'',
'',
'');
";

$resultado = mysqli_query($enlace,$peticion);

echo '<meta http-equiv="refresh"
   content="1; url=paneldecontrol.php">';
?>