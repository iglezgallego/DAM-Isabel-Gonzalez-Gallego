<?php

//Operaciones artiméticas

    $o1 = 4;
    $o2 = 3;
    $o3 = "3";

    echo "La suma de ".$o1." y de ".$o2." es: ".($o1+$o2)."<br>";
    echo "La resta de ".$o1." y de ".$o2." es: ".($o1-$o2)."<br>";
    echo "La multiplicación de ".$o1." y de ".$o2." es: ".($o1*$o2)."<br>";
    echo "La división de ".$o1." y de ".$o2." es: ".($o1/$o2)."<br>";
    echo "La resto entero de la divión de ".$o1." y de ".$o2." es: ".($o1%$o2)."<br>";

//Operaciones de comparación 

    echo "Es cierto que los dos operandos son iguales?" .($o2==$o3)."<br>";
    echo "Es cierto que los dos operandos son exactamente iguales?" .($o2===$o3)."<br>";
    echo "Es cierto que los dos operandos NO son iguales?" .($o1!=$o2)."<br>";

//Operaciones buleanas

$dia = "miercoles";
$mes = "agosto";

echo "Es cierto que las dos son ciertas?".($dia == "miercoles" && $mes == "agosto")."<br>";
echo "Es cierto que las dos son ciertas?".($dia == "miercoles" && $mes == "octubre")."<br>";
echo "Es cierto que alguna de las dos son ciertas?".($dia == "miercoles" || $mes == "octubre")."<br>";
echo "Es cierto que alguna de las dos son ciertas?".($dia == "lunes" || $mes == "octubre")."<br>";
    
?>