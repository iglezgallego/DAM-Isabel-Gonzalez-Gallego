<?php 
//incluyo la conexion a la base de datos
include "../config.php";

//Obtengo el valor de idpadre por POST y lo guardo en la variable
$idpadre = $_POST['idpadre'];

//Verificar si ya hay 12 retos asociados a este tema
$peticion_contador = "SELECT COUNT(*) AS num_retos FROM retos WHERE idhijo = ".$idpadre;
$resultado_contador = $conexion->query($peticion_contador);
$fila_contador = $resultado_contador->fetch_assoc();
$num_retos = $fila_contador['num_retos'];

if ($num_retos >= 12) {
  //Si hay mas de 12 retos, mostrar mensaje de alerta
    header("Location: panelcontrol.php?tabla=temas&temacompleto=completo");
} else {
  //Insertar el nuevo reto
  $peticion = " INSERT INTO
    retos
    VALUES
    (NULL,
    '".$idpadre."',
    '".$_POST['reto']."',
    '".$_POST['logo']."')";
    
  $conexion->query($peticion);

  //una vez insertado redirige a la tabla con la que estoy operando
  header("Location: panelcontrol.php?tabla=retos");
  exit;
}

?>
