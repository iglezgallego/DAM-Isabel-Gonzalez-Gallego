<?php
    //Guarda en formato json que es el elemento y los datos que contiene
    $datos = [
        'elemento' => $_GET['patron'],
        'datos' => $_GET['datos']
    ];

    $json = json_encode($datos,JSON_PRETTY_PRINT);
    $archivo = "datos/prueba.json";
    
    file_put_contents($archivo,$json);

?>