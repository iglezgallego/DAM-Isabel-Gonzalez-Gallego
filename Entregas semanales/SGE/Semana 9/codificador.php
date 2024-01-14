<?php
//para codificar el email en informe.php

    //funcion para subir un caracter de cada elemento de una cadena - codificar
    function subecaracter($cadena){
        for($i=0; $i < strlen($cadena); $i++){
        $cadena[$i] = chr(ord($cadena[$i])+1);
        }
        return $cadena;
    }
    ////funcion para bajar un caracter de cada elemento de una cadena - descodificar
    function bajacaracter($cadena){
        for($i=0; $i < strlen($cadena); $i++){
        $cadena[$i] = chr(ord($cadena[$i])-1);
        }
        return $cadena;
    }
    //FUNCION PARA CODIFICAR
    function codifica($cadena){
        //alterno el base 64 con el codificador de cadena para encriptar más
        $codificado = base64_encode(subecaracter(base64_encode(subecaracter(base64_encode(subecaracter(base64_encode($cadena)))))));
        return $codificado;

    }
    //FUNCION PARA DESCODIFICAR
    function descodifica($cadena){
        //alterno el base 64 con el codificador de cadena para encriptar más
        $descodificado = base64_decode(bajacaracter(base64_decode(bajacaracter(base64_decode(bajacaracter(base64_decode($cadena)))))));
        return $descodificado;

    }

    /*
    $original = "iglezgallego@gmail.com";
    echo "El original es: ".$original;
    echo "<br>";
    $codificado = codifica($original);
    echo "<br>";
    echo "El codificado es: ".$codificado;
    $descodificado = descodifica($codificado);
    echo "<br>";
    echo "El descodificado es: ".$descodificado;
    */
    
?>