<?php

//Estructuras de control de bucle

for($i =1; $i<30; $i++){
    echo "Que sepas que hoy es el dia ".$i." del mes <br>";
}

sleep(5);
echo "<br>";

$dia = 1;
while($dia < 30){
    echo "Hoy es el dia ".$dia." del mes <br>";
    $dia++;
}

echo "<br>";

$dia1 = 44;
do{echo "Hola";}while($dia1<30);

?>