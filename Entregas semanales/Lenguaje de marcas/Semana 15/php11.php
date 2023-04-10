<?php
//Coge la cadena que se está codificando
function Cencode($sujeto){
    $construye = "";
    //Saca el codigo asci correspondiente a cada una de las letras +3 porque le sumo 3 caracteres del abecedario
    //Coge caracter a carecter y le sumo uno. a será b, b será c, etc
    for($i =0;$i < strlen($sujeto);$i++){$construye .=chr(ord($sujeto[$i])+3);}
    //Base64 7 veces combinado con lo anterior
    return base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($construye))))))));
    //return $construye;
}

function Cdecode($sujeto){
    $construye = "";
    $descomprimido = base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($sujeto))))))));
    for($i =0;$i < strlen($descomprimido);$i++){
        $construye .=chr(ord($descomprimido[$i])-3);
    }
    return $construye;
}


$variable = "Isabel";
echo "El nombre es: ".$variable."<br>";
$codificado = Cencode($variable);
echo "El codificado es: ".$codificado."<br>";

?>