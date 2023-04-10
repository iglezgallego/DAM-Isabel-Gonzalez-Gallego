<?php

$variable = "Isabel";
$codificado = base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($variable))))));
$descodificado = base64_decode($codificado);

//codifica esa variable
echo "La variable es: ".$variable;
echo "<br>";
echo "El codificado es: ".$codificado;
echo "<br>";
echo "El descodificado es: ".$descodificado;

?>