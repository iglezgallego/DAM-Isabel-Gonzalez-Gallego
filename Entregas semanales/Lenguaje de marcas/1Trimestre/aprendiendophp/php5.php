<?php

//Estructuras de control condicional

$edad = 30;
if($edad<30){
    echo "Eres una persona joven<br>";
}else{
    echo "Ya no eres una persona joven<br>";
}

$dia = "martes";

switch($dia){
    case "lunes": echo "Hoy es el peor día de la semana";break;
    case "martes": echo "Hoy es el segundo peor día de la semana";break;
    case "miercoles": echo "Ya queda menos para el fin de semana";break;
    case "jueves": echo "Ya casi es viernes";break;
    case "viernes": echo "Por fin es viernes";break;
    case "sabado": echo "Hoy es el mejor dia de semana";break;
    case "domingo": echo "Que horrible que mañana sea lunes";break;
    default: echo "Lo que has escrito no es un dia de la semana";
}



?>