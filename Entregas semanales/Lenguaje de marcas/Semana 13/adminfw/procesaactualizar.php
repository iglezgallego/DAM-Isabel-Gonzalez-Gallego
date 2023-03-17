
<?php
include "../admin/conexiondb.php";

$contador = 0;
//Los dos primeros campos no son utiles (tabla y id), entonces usamos contador >= 2
//Con foreach cojo todos los valores que existen en el array y hago tantas peticiones de actualizacion como campos existan
foreach ($_POST as $clave => $valor){
    if($contador >=2){
        echo "Voy a actualizar el valor del campo ".$clave." con el valor ".$valor."<br>";
        $peticion = "
        UPDATE ".$_POST['tabla']."
        SET ".$clave." = '".$valor."'
        WHERE
        Identificador = '".$_POST['id']."'

        ";
        mysqli_query($enlace,$peticion);
        }
    $contador++;
}
    //te redirige otra vez a la tabla que acabas de modificar
    echo '<meta http-equiv="refresh"
   content="2; url=escritorio.php?tabla='.$_POST['tabla'].'">';

    ?>